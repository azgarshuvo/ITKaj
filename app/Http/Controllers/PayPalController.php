<?php
/**
 * Created by PhpStorm.
 * User: msi
 * Date: 22-Oct-17
 * Time: 2:21 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Paypal;
use Illuminate\Support\Facades\Redirect;

class PayPalController extends Controller{

    private $_apiContext;

    public function __construct()
    {
        $this->_apiContext = Paypal::ApiContext(
            config('services.paypal.client_id'),
            config('services.paypal.secret'));

        $this->_apiContext->setConfig(array(
            'mode' => 'sandbox',
            'service.EndPoint' => 'https://api.sandbox.paypal.com',
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path('logs/paypal.log'),
            'log.LogLevel' => 'FINE'
        ));

    }

    public function getCheckout()
    {
        $payer = PayPal::Payer();
        $payer->setPaymentMethod('paypal');

        $amount = PayPal:: Amount();
        $amount->setCurrency('EUR');
        $amount->setTotal(42); // This is the simple way,
        // you can alternatively describe everything in the order separately;
        // Reference the PayPal PHP REST SDK for details.

        $transaction = PayPal::Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription('What are you selling?');

        $redirectUrls = PayPal:: RedirectUrls();
        $redirectUrls->setReturnUrl(action('PayPalController@getDone'));
        $redirectUrls->setCancelUrl(action('PayPalController@getCancel'));

        $payment = PayPal::Payment();
        $payment->setIntent('sale');
        $payment->setPayer($payer);
        $payment->setRedirectUrls($redirectUrls);
        $payment->setTransactions(array($transaction));

        $response = $payment->create($this->_apiContext);
        $redirectUrl = $response->links[1]->href;

        return Redirect::to( $redirectUrl );
    }

    public function getDone(Request $request)
    {
//        dd($request);

        $id = $request->get('paymentId');
        $token = $request->get('token');
        $payer_id = $request->get('PayerID');

        $payment = PayPal::getById($id, $this->_apiContext);

        $paymentExecution = PayPal::PaymentExecution();

        $paymentExecution->setPayerId($payer_id);
        $executePayment = $payment->execute($paymentExecution, $this->_apiContext);

//        dd($executePayment);

        // Clear the shopping cart, write to database, send notifications, etc.

        // Thank the user for the purchase
        return 'checkout.done';
    }

    public function getCancel()
    {
        // Curse and humiliate the user for cancelling this most sacred payment (yours)
        return 'checkout.cancel';
    }

    public function createWebProfile(){

        $flowConfig = PayPal::FlowConfig();
        $presentation = PayPal::Presentation();
        $inputFields = PayPal::InputFields();
        $webProfile = PayPal::WebProfile();
        $flowConfig->setLandingPageType("Billing"); //Set the page type

        $presentation->setLogoImage("https://www.example.com/images/logo.jpg")->setBrandName("Example ltd"); //NB: Paypal recommended to use https for the logo's address and the size set to 190x60.

        $inputFields->setAllowNote(true)->setNoShipping(1)->setAddressOverride(0);

        $webProfile->setName("Example " . uniqid())
            ->setFlowConfig($flowConfig)
            // Parameters for style and presentation.
            ->setPresentation($presentation)
            // Parameters for input field customization.
            ->setInputFields($inputFields);

        $createProfileResponse = $webProfile->create($this->_apiContext);

        return $createProfileResponse->getId(); //The new webprofile's id
    }
}