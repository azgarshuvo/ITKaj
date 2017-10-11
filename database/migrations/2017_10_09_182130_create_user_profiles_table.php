<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('phone_number');
            $table->string('country');
            $table->string('city');
            $table->integer('postcode');
            $table->string('address');
            $table->string('img_path');
            $table->string('company_name');
            $table->string('company_website');
            $table->string('skills');
            $table->string('experience_lavel');
            $table->string('professional_title');
            $table->string('professional_overview');
            $table->string('hourly_rate');
            $table->string('available_for_each_week');
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
        Schema::drop('user_profiles');
    }
}
