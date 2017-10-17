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
                    <h2>{{$freeLancer->fname." ".$freeLancer->lname}}</h2>
                </div>
                <div class="row">
                    <!-- Left Inner -->
                    <div class="col-md-7">
                        <div class="left-inner">

                            <h3>First Name</h3>
                            <p class="text-right text-bold">{{$freeLancer->fname}}</p>
                            <hr>

                            <h3>Last Name</h3>
                            <p class="text-right text-bold">{{$freeLancer->lname}}</p>
                            <hr>

                            <h3>Country</h3>
                            @if($country)
                                <p class="text-right text-bold">{{$country->name}}</p>
                            @endif
                            <hr>

                            <h3>City</h3>
                            @if($city)
                                <p class="text-right text-bold">{{$city->name}}</p>
                            @endif
                            <hr>

                            <h3>Professional Title</h3>
                            @if($freeLancer->profile)
                                <p class="text-right text-bold">{{$freeLancer->profile->professional_title}}</p>
                            @endif
                            <hr>

                            <h3>Professional Overview</h3>
                            @if($freeLancer->profile)
                                <p class="text-right text-bold">{{$freeLancer->profile->professional_overview}}</p>
                            @endif
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
                            {{--<h3>Posted by</h3>--}}
                            @if($freeLancer->profile)
                <img id="image-profile" class="img-responsive md-margin-bottom-10 img img-thumbnail img-bordered profile-imge" @if(strlen($freeLancer->profile->img_path)>3)  src="{{asset('profile_img/'.$freeLancer->profile->img_path)}}" @else src="{{asset('assets/img/team/img32-md.jpg')}}" @endif alt="">
                            @else
                                <img id="image-profile" class="img-responsive md-margin-bottom-10 img img-thumbnail img-bordered profile-imge" src="{{asset('assets/img/team/img32-md.jpg')}}" alt="">
                            @endif
                            <div class="overflow-h text-center">
                                <span class="font-s text-center">{{$freeLancer->fname." ".$freeLancer->lname}}</span>
                                <p class="color-green text-center">Position: <span class="hex">{{$freeLancer->profile->professional_title}}</span></p>
                                
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