<?php
/**
 * Created by PhpStorm.
 * User: Zakariya Omar Naseef
 * Date: 13-Nov-17
 * Time: 12:16 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class StripePayment extends Model{

    protected $table = 'stripe_payment';

    protected $fillable = ['payment_id','payer_id', 'status', 'email', 'total', 'currency', 'user_id'];
}