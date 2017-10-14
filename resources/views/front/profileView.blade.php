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

<div class="job-description">
            <div class="container content">
                <div class="title-box-v2">
                    <h2>Job Description</h2>
                    <p>Pellentesque et erat ac massa cursus porttitor eget sed magna.</p>
                </div>
                <div class="row">
                    <!-- Left Inner -->
                    <div class="col-md-10">
                        <div class="left-inner">
                            <img src="{{asset('assets/img/clients2/ea-canada.png')}}" alt="">
                            <h3>EA Canada, Inc</h3>
                            <a href="#"><i class="position-top fa fa-print"></i></a>
                            <div class="overflow-h">
                                <p class="hex">Worldwide, 16,329 Employees, Bentonville, Arkansas</p>
                                <div class="star-vote">
                                    <ul class="list-inline">
                                        <li><i class="color-green fa fa-star"></i></li>
                                        <li><i class="color-green fa fa-star"></i></li>
                                        <li><i class="color-green fa fa-star"></i></li>
                                        <li><i class="color-green fa fa-star-half-o"></i></li>
                                        <li><i class="color-green fa fa-star-o"></i></li>
                                    </ul>
                                </div>
                                <span><a href="#">34 reviews</a></span>
                            </div>

                            <hr>

                            <div class="progression">
                                <span>Revenue</span>
                                <div class="progress progress-u progress-xs">
                                    <div style="width: 88%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="88" role="progressbar" class="progress-bar progress-bar-u">
                                    </div>
                                </div>

                                <span>Staff Salaries</span>
                                <div class="progress progress-u progress-xs">
                                    <div style="width: 76%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="76" role="progressbar" class="progress-bar progress-bar-u">
                                    </div>
                                </div>

                                <span>Possibility of Dismissial</span>
                                <div class="progress progress-u progress-xs">
                                    <div style="width: 97%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="97" role="progressbar" class="progress-bar progress-bar-u">
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <h2>Job Description</h2>
                            <p>This job was a great job for the pay and benefits when compared to waiting table and working fast food. I also preferred working for the vs other stores like . The biggest problem was unreasonable expectations from management. Even as one of there top employees you feel taken advantage of and over worked. Dealing with the customers was the other issue.</p>

                            <hr>

                            <h2>Your Task</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis varius hendrerit nisl id condimentum. Sed bibendum ultricies erat a vulputate. Curabitur id ultricies eros, at ultricies dui.</p>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-check color-green"></i> Nullam laoreet est sit amet felis tristique laoreet</li>
                                <li><i class="fa fa-check color-green"></i> The biggest problem was unreasonable expectations from management</li>
                                <li><i class="fa fa-check color-green"></i> Dealing with the customers was the other issue</li>
                            </ul>

                            <hr>

                            <h2>Responsibility</h2>
                            <p>A Wal-Mart cashier is responsible for effectively executing and adhering to the “Basic Beliefs” of the founder, Sam Walton.</p>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-check color-green"></i> Nullam laoreet est sit amet felis tristique laoreet</li>
                                <li><i class="fa fa-check color-green"></i> The biggest problem was unreasonable expectations from management</li>
                                <li><i class="fa fa-check color-green"></i> Dealing with the customers was the other issue</li>
                            </ul>

                            <hr>

                            <h2>What We Offer</h2>
                            <p>Vestibulum justo est, pharetra fermentum justo in, tincidunt mollis turpis. Duis imperdiet non justo euismod semper. Nullam laoreet est sit amet felis tristique laoreet. Duis interdum laoreet enim, at adipiscing velit viverra id.</p>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-check color-green"></i> Nullam laoreet est sit amet felis tristique laoreet</li>
                                <li><i class="fa fa-check color-green"></i> The biggest problem was unreasonable expectations from management</li>
                                <li><i class="fa fa-check color-green"></i> Dealing with the customers was the other issue</li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Left Inner -->

                    
                </div>
            </div>
        </div>
        <!--=== End Job Description ===-->
 @endsection       