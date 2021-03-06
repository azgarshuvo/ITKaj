<?php
/**
 * Created by PhpStorm.
 * User: zakariya
 * Date: 24-Oct-17
 * Time: 4:05 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class PaypalPayment extends Model{

    protected $table = 'paypal_payment';

    protected $fillable = ['user_id', 'payment_id', 'state', 'transaction_state','cart', 'email', 'payer_id', 'total', 'currency', 'description'];
}