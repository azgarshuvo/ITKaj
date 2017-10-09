<?php
/**
 * Created by PhpStorm.
 * User: zakariya
 * Date: 08-Oct-17
 * Time: 5:01 PM
 */
?>
@extends('layouts.front.profilemaster')

@section('title', 'Profile')


    <!--=== Profile ===-->
    <div class="container content profile">
        <div class="row">
           @section('content')
            <!-- Profile Content -->
            <div class="col-md-9">
                <div class="profile-body">
                    <!--Service Block v3-->
                    <div class="row margin-bottom-10">
                        <div class="col-sm-6 sm-margin-bottom-20">
                            <div class="service-block-v3 service-block-u">
                                <i class="icon-users"></i>
                                <span class="service-heading">Overall Visits</span>
                                <span class="counter">52,147</span>

                                <div class="clearfix margin-bottom-10"></div>

                                <div class="row margin-bottom-20">
                                    <div class="col-xs-6 service-in">
                                        <small>Last Week</small>
                                        <h4 class="counter">1,385</h4>
                                    </div>
                                    <div class="col-xs-6 text-right service-in">
                                        <small>Last Month</small>
                                        <h4 class="counter">6,048</h4>
                                    </div>
                                </div>
                                <div class="statistics">
                                    <h3 class="heading-xs">Statistics in Progress Bar <span class="pull-right">67%</span></h3>
                                    <div class="progress progress-u progress-xxs">
                                        <div style="width: 67%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="67" role="progressbar" class="progress-bar progress-bar-light">
                                        </div>
                                    </div>
                                    <small>11% less <strong>than last month</strong></small>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="service-block-v3 service-block-blue">
                                <i class="icon-screen-desktop"></i>
                                <span class="service-heading">Overall Page Views</span>
                                <span class="counter">324,056</span>

                                <div class="clearfix margin-bottom-10"></div>

                                <div class="row margin-bottom-20">
                                    <div class="col-xs-6 service-in">
                                        <small>Last Week</small>
                                        <h4 class="counter">26,904</h4>
                                    </div>
                                    <div class="col-xs-6 text-right service-in">
                                        <small>Last Month</small>
                                        <h4 class="counter">124,766</h4>
                                    </div>
                                </div>
                                <div class="statistics">
                                    <h3 class="heading-xs">Statistics in Progress Bar <span class="pull-right">89%</span></h3>
                                    <div class="progress progress-u progress-xxs">
                                        <div style="width: 89%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="89" role="progressbar" class="progress-bar progress-bar-light">
                                        </div>
                                    </div>
                                    <small>15% higher <strong>than last month</strong></small>
                                </div>
                            </div>
                        </div>
                    </div><!--/end row-->
                    <!--End Service Block v3-->

                    <hr>

                               

               
                    <!--Profile Blog-->
                    <div class="panel panel-profile">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-tasks"></i>Contacts</h2>
                            <a href="page_profile_users.html" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs pull-right">View All</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="profile-blog blog-border">
                                        <img class="rounded-x" src="assets/img/testimonials/img1.jpg" alt="">
                                        <div class="name-location">
                                            <strong>Mikel Andrews</strong>
                                            <span><i class="fa fa-map-marker"></i><a href="#">California,</a> <a href="#">US</a></span>
                                        </div>
                                        <div class="clearfix margin-bottom-20"></div>
                                        <p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                                        <hr>
                                        <ul class="list-inline share-list">
                                            <li><i class="fa fa-bell"></i><a href="#">12 Notifications</a></li>
                                            <li><i class="fa fa-group"></i><a href="#">54 Followers</a></li>
                                            <li><i class="fa fa-twitter"></i><a href="#">Retweet</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="profile-blog blog-border">
                                        <img class="rounded-x" src="assets/img/testimonials/img4.jpg" alt="">
                                        <div class="name-location">
                                            <strong>Natasha Kolnikova</strong>
                                            <span><i class="fa fa-map-marker"></i><a href="#">Moscow,</a> <a href="#">Russia</a></span>
                                        </div>
                                        <div class="clearfix margin-bottom-20"></div>
                                        <p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                                        <hr>
                                        <ul class="list-inline share-list">
                                            <li><i class="fa fa-bell"></i><a href="#">37 Notifications</a></li>
                                            <li><i class="fa fa-group"></i><a href="#">46 Followers</a></li>
                                            <li><i class="fa fa-twitter"></i><a href="#">Retweet</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Profile Blog-->

                </div>
            </div>
            <!-- End Profile Content -->
        </div>
    </div><!--/container-->
    <!--=== End Profile ===-->
@endsection

