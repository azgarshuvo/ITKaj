<?php
/**
 * Created by PhpStorm.
 * User: msi
 * Date: 22-Oct-17
 * Time: 4:59 PM
 */

namespace App\Http\Controllers;


//use Cartalyst\Stripe\Stripe;
use App\Milestone;
use App\StripePayment;
use Illuminate\Routing\Controller;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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


    public function postPaymentWithStripe($amount, $milestoneId, $milestoneJobId)
    {
//        dd($request);
//        $stripe = Stripe::make(env('STRIPE_SECRET'));
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

//        dd($id);
        // Get the credit card details submitted by the form
        $token = $_POST['stripeToken'];
        $email = $_POST['stripeEmail'];
        // Create the charge on Stripe's servers - this will charge the user's card
        try {
            $charge = \Stripe\Charge::create(array(
                "amount" => $amount."00",
                "currency" => "usd",
                "description" => "Milestone Release Charge",
                "source" => $token,
            ));

            $paymentid     = $charge->id;
            $payerid       = $charge->source->id;
            $status        = $charge->status;
            $total         = $amount;
            $currency      = $charge->currency;
            // if status="succeeded" do rest of the insert operation start
            if($status == 'succeeded') {
                /**
                 * Write Here Your Database insert logic.
                 */
                $stripePayment = new StripePayment();

                $stripePayment->payment_id = $paymentid;
                $stripePayment->payer_id = $payerid;
                $stripePayment->status = $status;
                $stripePayment->email = $email;
                $stripePayment->total = $total;
                $stripePayment->currency = $currency;
                $stripePayment->user_id = Auth::User()->id;
                if($stripePayment->save()){
                    $milestone = Milestone::find($milestoneId);
//                    dd($milestone);
                    if($milestone != null && $milestone!= ""){
                        $milestone->status = 1;
                        if($milestone->update()){
                            Session::put('success','Payment Success');
                            return redirect()->route('setupMilestone',[$milestoneJobId]);
                        }
                    }
                }
                Session::put('error','Payment Fail!!');
                return redirect()->route('setupMilestone',[$milestoneJobId]);

            } else {
                Session::put('error','Payment Fail!!');
                return redirect()->route('setupMilestone',[$milestoneJobId]);
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
    }
}