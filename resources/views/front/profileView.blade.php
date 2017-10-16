<?php
/**
 * Created by PhpStorm.
 * User: shuvo
 * Date: 14-Oct-17
 * Time: 04:00 PM
 */
?>
@extends('layouts.front.master')

@section('title', 'Profile View')

@section('content')

        <div class="breadcrumbs">
            <div class="container">
                <h1 class="pull-left">Profile View</h1>
                
            </div>
        </div>


            <!--=== Job Description ===-->
        <div class="job-description">
            <div class="container content">
                <div class="title-box-v2">
                    <h2>Your Profile</h2>
                </div>
                <div class="row">
                    <!-- Left Inner -->
                    <div class="col-md-7">
                        <div class="left-inner">

                            <h3>First Name</h3>
                            <p>Alex</p>
                            <hr>

                            <h3>Last Name</h3>
                            <p>John</p>
                            <hr>

                            <h3>Country</h3>
                            <p>America</p>
                            <hr>

                            <h3>City</h3>
                            <p>New York</p>
                            <hr>

                            <h3>Professional Title</h3>
                            <p>Web Developer</p>
                            <hr>

                            <h3>Professional Overview</h2>
                            <p>Work with laravel Framework</p>
                            <hr>

                            <h3>Skills</h3>                           
                            <ul class="list-unstyled">
                                <li><i class="fa fa-check color-green"></i> PHP</li>
                                <li><i class="fa fa-check color-green"></i> Javascript</li>
                                <li><i class="fa fa-check color-green"></i> Laravel</li>
                            </ul>
                            <hr>

                            <h3>Protfolio</h3>
                            <p>URL link</p>
                            <hr>

                        </div>
                    </div>
                    <!-- End Left Inner -->

                    <!-- Right Inner -->
                    <div class="col-md-2"></div>
                    <div class="col-md-3">
                        <div class="right-inner">
                            <h3>Posted by</h3>
                            <img src="{{asset('assets/img/testimonials/img1.jpg')}}" alt="">
                            <div class="overflow-h">
                                <span class="font-s">Steve Andersson</span>
                                <p class="color-green">Position: <span class="hex">Manager, Accounter</span></p>
                                
                            </div>
                        </div>
                    </div>
                    <!-- End Right Inner -->
                </div>
            </div>
        </div>
        <!--=== End Job Description ===-->
       
        <!--=== End Job Description ===-->
 @endsection       