<?php
/**
 * Created by PhpStorm.
 * User: shuvo
 * Date: 07-Oct-17
 * Time: 12:54 PM
 */
?>
@extends('layouts.front.master')

@section('title', 'Registration')

@section('content')

        <div class="breadcrumbs">
            <div class="container">
                <h1 class="pull-left">Job Description</h1>
                
            </div>
        </div>

<!--=== Job Description ===-->
        <div class="job-description">
            <div class="container content">
                <div class="title-box-v2">
                    <h2>Job Description</h2>
                    <p>Pellentesque et erat ac massa cursus porttitor eget sed magna.</p>
                </div>
                <div class="row">
                    <!-- Left Inner -->
                    <div class="col-md-7">
                        <div class="left-inner">
                            <img src="{{asset('assets/img/clients2/ea-canada.pn')}}g" alt="">
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

                    <!-- Right Inner -->
                    <div class="col-md-5">
                        <div class="right-inner">
                            <h3>Posted by</h3>
                            <img src="{{asset('assets/img/testimonials/img1.jpg')}}" alt="">
                            <div class="overflow-h">
                                <span class="font-s">Steve Andersson</span>
                                <p class="color-green">Position: <span class="hex">Manager, Accounter</span></p>
                                <ul class="social-icons">
                                    <li><a class="social_facebook" data-original-title="Facebook" href="#"></a></li>
                                    <li><a class="social_googleplus" data-original-title="Google Plus" href="#"></a></li>
                                    <li><a class="social_tumblr" data-original-title="Tumblr" href="#"></a></li>
                                    <li><a class="social_twitter" data-original-title="Twitter" href="#"></a></li>
                                </ul>
                            </div>

                            <hr>

                            <ul class="list-unstyled save-job">
                                <li><i class="fa fa-download"></i> <a href="#">Save job</a></li>
                                <li><i class="fa fa-eye"></i> <a href="#">View saved jobs</a></li>
                                <li><i class="fa fa-plus"></i> <a href="#">Follow us</a></li>
                            </ul>

                            <hr>

                            <h3>Overview</h3>
                            <div class="row">
                                <!-- Begin Overview -->
                                <div class="col-sm-6">
                                    <div class="overview">
                                        <i class="fa fa-user"></i>
                                        <div class="overflow-h">
                                            <small>Followers</small>
                                            <small>2,1k</small>
                                            <div class="progress progress-u progress-xxs">
                                                <div style="width: 92%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="92" role="progressbar" class="progress-bar progress-bar-u">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Overview -->

                                <!-- Begin Overview -->
                                <div class="col-sm-6">
                                    <div class="overview">
                                        <i class="fa fa-share"></i>
                                        <div class="overflow-h">
                                            <small>VieSharews</small>
                                            <small>749k</small>
                                            <div class="progress progress-u progress-xxs">
                                                <div style="width: 77%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="77" role="progressbar" class="progress-bar progress-bar-u">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Overview -->
                            </div>

                            <div class="row margin-bottom-20">
                                <!-- Begin Overview -->
                                <div class="col-sm-6">
                                    <div class="overview">
                                        <i class="fa fa-eye"></i>
                                        <div class="overflow-h">
                                            <small>Views</small>
                                            <small>15,7k</small>
                                            <div class="progress progress-u progress-xxs">
                                                <div style="width: 88%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="88" role="progressbar" class="progress-bar progress-bar-u">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Overview -->

                                <!-- Begin Overview -->
                                <div class="col-sm-6">
                                    <div class="overview">
                                        <i class="fa fa-group"></i>
                                        <div class="overflow-h">
                                            <small>Opportunity Views</small>
                                            <small>202,8k</small>
                                            <div class="progress progress-u progress-xxs">
                                                <div style="width: 76%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="76" role="progressbar" class="progress-bar progress-bar-u">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Overview -->
                            </div>

                            <!-- Pie Chart Progress Bar -->
                            <div class="row margin-bottom-20">
                                <div class="p-chart col-sm-6 col-xs-6 sm-margin-bottom-10">
                                    <h3>Engagement Score</h3>
                                    <div class="circle" id="circle-4"></div>
                                    <ul class="list-unstyled overflow-h">
                                        <li><i> - </i><a href="#">Tips to Improve</a></li>
                                        <li><i> - </i><a href="#">Compare to Others</a></li>
                                        <li><i> - </i><a href="#">More Information</a></li>
                                    </ul>
                                </div>
                                <div class="p-chart col-sm-6 col-xs-6">
                                    <h3>Progfile Completness</h3>
                                    <div class="circle" id="circle-5"></div>
                                    <ul class="list-unstyled overflow-h">
                                        <li><i> - </i><a href="#">Steps to Completion</a></li>
                                        <li><i> - </i><a href="#">Compare to Others</a></li>
                                        <li><i> - </i><a href="#">More Information</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Pie Chart Progress Bar -->

                            <hr>

                            <h3>Latest Recommendations</h3>
                            <div class="people-say margin-bottom-20">
                                <img src="{{asset('assets/img/testimonials/img2.jpg')}}" alt="">
                                <div class="overflow-h">
                                    <span>Eva Maria Kl.</span>
                                    <small class="hex pull-right">5 - hours ago</small>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis varius hendrerit nisl id condimentum.</p>
                                </div>
                            </div>

                            <div class="people-say margin-bottom-20">
                                <img src="{{asset('assets/img/testimonials/user.jpg')}}" alt="">
                                <div class="overflow-h">
                                    <span>Christian Draxler</span>
                                    <small class="hex pull-right">2 - days ago</small>
                                    <p>Vestibulum justo est, pharetra fermentum justo in, tincidunt mollis turpis. Duis imperdiet non justo euismod semper.</p>
                                </div>
                            </div>

                            <div class="people-say">
                                <img src="{{asset('assets/img/testimonials/img3.jpg')}}" alt="">
                                <div class="overflow-h">
                                    <span>Alex Taylor</span>
                                    <small class="hex pull-right">3 - days ago</small>
                                    <p>A Wal-Mart cashier is responsible for effectively executing and adhering to the “Basic Beliefs” of the founder.</p>
                                </div>
                            </div>

                            <hr>

                            <button type="button" class="btn-u btn-block"> Apply with Resume</button>
                        </div>
                    </div>
                    <!-- End Right Inner -->
                </div>
            </div>
        </div>
        <!--=== End Job Description ===-->    

@endsection

