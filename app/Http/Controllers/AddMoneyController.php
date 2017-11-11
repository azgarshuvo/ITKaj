<?php
/**
 * Created by PhpStorm.
 * User: msi
 * Date: 22-Oct-17
 * Time: 4:59 PM
 */

namespace App\Http\Controllers;


//use Cartalyst\Stripe\Stripe;
use Illuminate\Routing\Controller;

use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\User;
use Stripe\Error\Card;
use Stripe\Stripe;

class AddMoneyController extends Controller{

    public function __construct()
    {
//        parent::__construct();
        $this->user = new User;
    }

    /**
     * Show the application paywith stripe.
     *
     * @return \Illuminate\Http\Response
     */

    public function payWithStripe()
    {
        return view('front.visaTestingDemo');
    }


    public function postPaymentWithStripe(Request $request)
    {
//        dd($request);
//        $stripe = Stripe::make(env('STRIPE_SECRET'));
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        // Get the credit card details submitted by the form
        $token = $_POST['stripeToken'];

        // Create the charge on Stripe's servers - this will charge the user's card
        try {
            $charge = \Stripe\Charge::create(array(
                "amount" => 1000,
                "currency" => "usd",
                "description" => "Example charge",
                "source" => $token,
            ));

            $paymentid     = $charge->id;
            $payerid       = $charge->source->id;
            $status        = $charge->status;
            // if status="succeeded" do rest of the insert operation start
            if($status == 'succeeded') {
                /**
                 * Write Here Your Database insert logic.
                 */
                Session::put('success','Money add successfully in wallet');
                return redirect()->route('addmoney.paywithstripe');
            } else {
                Session::put('error','Money not add in wallet!!');
                return redirect()->route('addmoney.paywithstripe');
            }
            // end

        } catch(Stripe_CardError $e) {
            $e_json = $e->getJsonBody();
            $error = $e_json['error'];
            // The card has been declined
            // redirect back to checkout page

            return Redirect::to('/')
                ->with_input()
                ->with('card_errors', $error);
		}




/*--------------------------------------------------*/
//        $validator = Validator::make($request->all(), [
//            'card_no' => 'required',
//            'ccExpiryMonth' => 'required',
//            'ccExpiryYear' => 'required',
//            'cvvNumber' => 'required',
//            'amount' => 'required',
//        ]);
//
//        $input = $request->all();
//        if ($validator->passes()) {
//            $input = array_except($input,array('_token'));
//            $stripe = Stripe::make(env('STRIPE_SECRET'));
//            try {
//                $token = $stripe->tokens()->create([
//                    'card' => [
//                        'number'    => $request->get('card_no'),
//                        'exp_month' => $request->get('ccExpiryMonth'),
//                        'exp_year'  => $request->get('ccExpiryYear'),
//                        'cvc'       => $request->get('cvvNumber'),
//                    ],
//                ]);
//
//                if (!isset($token['id'])) {
//                    Session::put('error','The Stripe Token was not generated correctly');
//                    return redirect()->route('addmoney.paywithstripe');
//                }
//
//                $charge = $stripe->charges()->create([
//                    'card' => $token['id'],
//                    'currency' => 'USD',
//                    'amount'   => $request->get('amount'),
//                    'description' => 'Add in wallet',
//                ]);
//
//                if($charge['status'] == 'succeeded') {
//                    /**
//                     * Write Here Your Database insert logic.
//                     */
//                    Session::put('success','Money add successfully in wallet');
//                    return redirect()->route('addmoney.paywithstripe');
//                } else {
//                    Session::put('error','Money not add in wallet!!');
//                    return redirect()->route('addmoney.paywithstripe');
//                }
//
//            } catch (Exception $e) {
//                Session::put('error',$e->getMessage());
//                return redirect()->route('addmoney.paywithstripe');
//            } catch(\Cartalyst\Stripe\Exception\CardErrorException $e) {
//                Session::put('error',$e->getMessage());
//                return redirect()->route('addmoney.paywithstripe');
//            } catch(\Cartalyst\Stripe\Exception\MissingParameterException $e) {
//                Session::put('error',$e->getMessage());
//                return redirect()->route('addmoney.paywithstripe');
//            }
//        }
//        Session::put('error','All fields are required!!');
//        return redirect()->route('addmoney.paywithstripe');
}
}