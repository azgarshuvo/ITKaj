<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PaypalPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payoal_payment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employer_id');
            $table->integer('payment_id');
            $table->string('state');
            $table->string('cart');
            $table->string('email');
            $table->string('payer_id');
            $table->integer('total');
            $table->string('currency');
            $table->string('description');
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
        Schema::drop('payoal_payment');
    }
}
