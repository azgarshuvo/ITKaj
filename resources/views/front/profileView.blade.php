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


            <div class="container content">
                <div class="row">
                    <div class="profile-body margin-bottom-20">
                    <div class="tab-v1">
                    <div class="tab-content">
                    <div id="profile" class="profile-edit tab-pane fade in active">
                                    
                                    <dl class="dl-horizontal">
                                        <div class="picture">
                                        <img src="{{asset('assets/img/testimonials/img1.jpg')}}" alt="">
                                            <div class="overflow-h">
                                                <span class="font-s">Steve Andersson</span>
                                                <p class="color-green">Position: <span class="hex">Manager, Accounter</span></p>
                                                
                                            </div>
                                        </div>
                                        <dt><strong>Your name </strong></dt>
                                        <dd>
                                            Edward Rooster
                                        </dd>
                                        <hr>
                                        <dt><strong>Your ID </strong></dt>
                                        <dd>
                                            FKJ-032440
                                        </dd>
                                        <hr>
                                        <dt><strong>Company name </strong></dt>
                                        <dd>
                                            Htmlstream
                                        </dd>
                                            
                                        <hr>
                                        <dt><strong>Phone Number </strong></dt>
                                        <dd>
                                            (304) 33-2867-499
                                        </dd>
                                        <hr>

                                        <dt><strong>Country </strong></dt>
                                        <dd>
                                            Bangladseh
                                        </dd>
                                        <hr>

                                        <dt><strong>City </strong></dt>
                                        <dd>
                                            Dhaka
                                        </dd>
                                        <hr>

                                        <dt><strong>Address </strong></dt>
                                        <dd>
                                            Dhaka, Bangladesh
                                        </dd>
                                        <hr>
                                        <dt><strong>Company Web Address </strong></dt>
                                        <dd>
                                            www.example.com
                                        </dd>
                                        <hr>

                                        <dt><strong>Professional Title </strong></dt>
                                        <dd>
                                            Manager
                                        </dd>
                                        <hr>

                                        <dt><strong>Professional Overview </strong></dt>
                                        <dd>
                                            Something 
                                        </dd>
                                        <hr>

                                        <dt><strong>Skill </strong></dt>
                                        <dd>
                                            Programming Language
                                        </dd>
                                        <hr>

                                        <dt><strong>Hourly Rate </strong></dt>
                                        <dd>
                                            10$
                                        </dd>
                                        <hr>

                                        <dt><strong>Experience Level </strong></dt>
                                        <dd>
                                            Expert
                                        </dd>
                                        <hr>
                                    </dl>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       
        <!--=== End Job Description ===-->
 @endsection       