<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StripePayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stripe_payment', function (Blueprint $table) {
            $table->increments('id');
            $table->string('payment_id');
            $table->string('payer_id');
            $table->string('status');
            $table->string('email');
            $table->integer('total');
            $table->string('currency');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stripe_payment');
    }
}
