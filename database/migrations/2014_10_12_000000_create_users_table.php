<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->enum('user_type', ['freelancer', 'employer', 'admin']);
            $table->integer('admin_user_type')->default(-1);
            $table->string('password', 60);
            $table->boolean('verified')->default(0);
            $table->boolean('is_complete')->default(0);
            $table->boolean('admin_approve')->default(0);
            $table->string('verification_token');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
