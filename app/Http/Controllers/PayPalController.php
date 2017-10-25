<?php
/**
 * Created by PhpStorm.
 * User: msi
 * Date: 22-Oct-17
 * Time: 2:21 PM
 */

namespace App\Http\Controllers;



use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
use App\PaypalPayment;
/** All Paypal Details class **/
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

use App\Milestone;

use App\Http\Controllers\Controller;

class PayPalController extends Controller{

    private $_api_context;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        parent::__construct();

        /** setup PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['sandbox_client_id'], $paypal_conf['sandbox_secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    /**
     * Show the application paywith paypalpage.
     *
     * @return \Illuminate\Http\Response
     */
    public function payWithPaypal()
    {
        return view('front.payWithPaypalDemo');
    }

    /**
     * Store a details of payment with paypal.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postPaymentWithpaypal(Request $request)
    {


        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();

        $item_1->setName('Payment') /** item name **/
        ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->get('amount')); /** unit price **/

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->get('amount'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Milestone Released Transaction');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('status')) /** Specify return URL **/
        ->setCancelUrl(URL::route('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error','Connection timeout');
                return Redirect::route('setupMilestone' , [$request->get('jobId')]);
                /** echo "Exception: " . $ex->getMessage() . PHP_EOL; **/
                /** $err_data = json_decode($ex->getData(), true); **/
                /** exit; **/
            } else {
                \Session::put('error','Some error occur, sorry for inconvenient');
                return Redirect::route('setupMilestone' , [$request->get('jobId')]);
                /** die('Some error occur, sorry for inconvenient'); **/
            }
        }

        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());

        /** add job ID to session **/
        Session::put('jobId', $request->get('jobId'));

        if(isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }

        \Session::put('error','Unknown error occurred');
        return Redirect::route('setupMilestone', [$request->get('jobId')]);
    }

    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');

        /** Get the payment ID before session clear **/
        $jobId = Session::get('jobId');
        /** clear the session payment ID **/
        Session::forget('jobId');


        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            \Session::put('error','Payment failed');

            $milestone = Milestone::find(intval(Session::get('milestoneId')));
            $milestone->status = 0;
            $milestone->update();
            
            return Redirect::route('setupMilestone', [$jobId]);
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        /** PaymentExecution object includes information necessary **/
        /** to execute a PayPal account payment. **/
        /** The payer_id is added to the request query parameters **/
        /** when the user is redirected from paypal back to your site **/
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        /** dd($result);exit; /** DEBUG RESULT, remove it later **/
        if ($result->getState() == 'approved') {

            $total = 0;
            $currency = '';
            $description = '';
            $transactionsState = '';
            foreach($result->getTransactions() as $transactions){
                $total = $transactions->amount->total;
                $currency = $transactions->amount->currency;
                $description = $transactions->description;
                foreach ($transactions->related_resources as $trReRe){
                    $transactionsState = $trReRe->sale->state;
                }
            }

            $paypalPayment = new PaypalPayment();

            $paypalPayment->user_id = Auth::User()->id;
            $paypalPayment->payment_id = $result->getId();
            $paypalPayment->state = $result->getState();
            $paypalPayment->transaction_state = $transactionsState;
            $paypalPayment->cart = $result->getCart();
            $paypalPayment->email = $result->getPayer()->getPayerInfo()->email;
            $paypalPayment->payer_id = $result->getPayer()->getPayerInfo()->payer_id;
            $paypalPayment->total = $total;
            $paypalPayment->currency = $currency;
            $paypalPayment->description = $description;

            $paypalPayment->save();

            /** it's all right **/
            /** Here Write your database logic like that insert record or value in database if you want **/

            \Session::put('success','Payment success');
            return Redirect::route('setupMilestone', [$jobId]);
        }
        \Session::put('error','Payment failed');

        return Redirect::route('setupMilestone', [$jobId]);
    }

}