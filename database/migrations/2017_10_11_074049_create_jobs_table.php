<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     * The migration create by polash
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name');
            $table->integer('project_cost');
            $table->integer('project_time');
            $table->text('description');
            $table->integer('category_id');
            $table->boolean('status')->default(0);
            $table->boolean('verified')->default(0);
            $table->string('skill_needed');
            $table->string('job_attachment',500);
            $table->integer('type');
            $table->boolean('approved')->default(0);
            $table->integer('selected_for_job')->nullable();

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
        Schema::drop('jobs');
    }
}
