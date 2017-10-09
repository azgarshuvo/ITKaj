<?php
/**
 * Created by PhpStorm.
 * User: zakariya
 * Date: 08-Oct-17
 * Time: 5:01 PM
 */
?>
@extends('layouts.front.profileMaster')

@section('title', 'Profile')

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

            <hr>

            <div class="row">
                <!--Alert-->
                <div class="col-sm-12 sm-margin-bottom-30">
                    <div class="panel panel-profile">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-send"></i> Alarm Notification</h2>
                            <a href="#"><i class="fa fa-cog pull-right"></i></a>
                        </div>
                        <div id="scrollbar3" class="panel-body no-padding mCustomScrollbar" data-mcs-theme="minimal-dark">
                            <div class="alert-blocks alert-blocks-pending alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <img class="rounded-x" src="assets/img/testimonials/img3.jpg" alt="">
                                <div class="overflow-h">
                                    <strong class="color-yellow">Pending... <small class="pull-right"><em>Just now</em></small></strong>
                                    <p>Your friend request has been sent.</p>
                                </div>
                            </div>
                            <div class="alert-blocks alert-blocks-success alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <img class="rounded-x" src="assets/img/testimonials/img2.jpg" alt="">
                                <div class="overflow-h">
                                    <strong class="color-green">Accepted. <small class="pull-right"><em>7 hours ago</em></small></strong>
                                    <p>Your friend request has been accepted.</p>
                                </div>
                            </div>
                            <div class="alert-blocks alert-blocks-info alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <i class="icon-custom rounded-x icon-bg-blue fa fa-bolt"></i>
                                <div class="overflow-h">
                                    <strong class="color-blue">Info <small class="pull-right"><em>2 days ago</em></small></strong>
                                    <p>Your friend request has been denied :)</p>
                                </div>
                            </div>
                            <div class="alert-blocks alert-blocks-error alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <img class="rounded-x" src="assets/img/testimonials/img6.jpg" alt="">
                                <div class="overflow-h">
                                    <strong class="color-red">Denied! <small class="pull-right"><em>2 days ago</em></small></strong>
                                    <p>Your friend request has been denied.</p>
                                </div>
                            </div>
                            <div class="alert-blocks alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <i class="icon-custom rounded-x icon-bg-dark fa fa-magic"></i>
                                <div class="overflow-h">
                                    <strong class="color-dark">Default <small class="pull-right"><em>Just now</em></small></strong>
                                    <p><strong>Adam Johnson's</strong> friend request pending..</p>
                                </div>
                            </div>
                            <div class="alert-blocks alert-blocks-pending alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <i class="icon-custom rounded-x icon-bg-yellow fa fa-info"></i>
                                <div class="overflow-h">
                                    <strong class="color-yellow">Pending <small class="pull-right"><em>Just now</em></small></strong>
                                    <p><strong>Adam Johnson's</strong> friend request pending..</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Alert-->

                
            </div><!--/end row-->

            <hr>

            

            
        </div>
    </div>
    <!-- End Profile Content -->
@endsection

