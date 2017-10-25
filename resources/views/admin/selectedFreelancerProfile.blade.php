<?php
/**
 * Created by PhpStorm.
 * User: Shuvo
 * Date: 10/25/2017
 * Time: 5:11 PM
 */
?>
@extends('layouts.admin.master')

@section('title', 'Freelancer List')

@section('content')
    <div class="wrapper wrapper-content">
        @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="col-md-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Profile Detail</h5>
                </div>
                <div>
                    <div class="ibox-content no-padding border-left-right">
                        <img alt="image" class="img-responsive" src="img/profile_big.jpg">
                    </div>
                    <div class="ibox-content profile-content">
                        <h4><strong>Monica Smith</strong></h4>
                        <p><i class="fa fa-map-marker"></i> Riviera State 32/106</p>
                        <h5>
                            About me
                        </h5>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat.
                        </p>
                        <div class="row m-t-lg">
                            <div class="col-md-4">
                                <span class="bar" style="display: none;">5,3,9,6,5,9,7,3,5,2</span><svg class="peity" height="16" width="32"><rect fill="#1ab394" x="0" y="7.111111111111111" width="2.3" height="8.88888888888889"></rect><rect fill="#d7d7d7" x="3.3" y="10.666666666666668" width="2.3" height="5.333333333333333"></rect><rect fill="#1ab394" x="6.6" y="0" width="2.3" height="16"></rect><rect fill="#d7d7d7" x="9.899999999999999" y="5.333333333333334" width="2.3" height="10.666666666666666"></rect><rect fill="#1ab394" x="13.2" y="7.111111111111111" width="2.3" height="8.88888888888889"></rect><rect fill="#d7d7d7" x="16.5" y="0" width="2.3" height="16"></rect><rect fill="#1ab394" x="19.799999999999997" y="3.555555555555557" width="2.3" height="12.444444444444443"></rect><rect fill="#d7d7d7" x="23.099999999999998" y="10.666666666666668" width="2.3" height="5.333333333333333"></rect><rect fill="#1ab394" x="26.4" y="7.111111111111111" width="2.3" height="8.88888888888889"></rect><rect fill="#d7d7d7" x="29.7" y="12.444444444444445" width="2.3" height="3.5555555555555554"></rect></svg>
                                <h5><strong>169</strong> Posts</h5>
                            </div>
                            <div class="col-md-4">
                                <span class="line" style="display: none;">5,3,9,6,5,9,7,3,5,2</span><svg class="peity" height="16" width="32"><polygon fill="#1ab394" points="0 15 0 7.166666666666666 3.5555555555555554 10.5 7.111111111111111 0.5 10.666666666666666 5.5 14.222222222222221 7.166666666666666 17.77777777777778 0.5 21.333333333333332 3.833333333333332 24.888888888888886 10.5 28.444444444444443 7.166666666666666 32 12.166666666666666 32 15"></polygon><polyline fill="transparent" points="0 7.166666666666666 3.5555555555555554 10.5 7.111111111111111 0.5 10.666666666666666 5.5 14.222222222222221 7.166666666666666 17.77777777777778 0.5 21.333333333333332 3.833333333333332 24.888888888888886 10.5 28.444444444444443 7.166666666666666 32 12.166666666666666" stroke="#169c81" stroke-width="1" stroke-linecap="square"></polyline></svg>
                                <h5><strong>28</strong> Following</h5>
                            </div>
                            <div class="col-md-4">
                                <span class="bar" style="display: none;">5,3,2,-1,-3,-2,2,3,5,2</span><svg class="peity" height="16" width="32"><rect fill="#1ab394" x="0" y="0" width="2.3" height="10"></rect><rect fill="#d7d7d7" x="3.3" y="4" width="2.3" height="6"></rect><rect fill="#1ab394" x="6.6" y="6" width="2.3" height="4"></rect><rect fill="#d7d7d7" x="9.899999999999999" y="10" width="2.3" height="2"></rect><rect fill="#1ab394" x="13.2" y="10" width="2.3" height="6"></rect><rect fill="#d7d7d7" x="16.5" y="10" width="2.3" height="4"></rect><rect fill="#1ab394" x="19.799999999999997" y="6" width="2.3" height="4"></rect><rect fill="#d7d7d7" x="23.099999999999998" y="4" width="2.3" height="6"></rect><rect fill="#1ab394" x="26.4" y="0" width="2.3" height="10"></rect><rect fill="#d7d7d7" x="29.7" y="6" width="2.3" height="4"></rect></svg>
                                <h5><strong>240</strong> Followers</h5>
                            </div>
                        </div>
                        <div class="user-button">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-primary btn-sm btn-block"><i class="fa fa-envelope"></i> Send Message</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-default btn-sm btn-block"><i class="fa fa-coffee"></i> Buy a coffee</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Activites</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link binded">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link binded">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">

                    <div>
                        <div class="feed-activity-list">

                            <div class="feed-element">
                                <a href="#" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a1.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right text-navy">1m ago</small>
                                    <strong>Sandra Momot</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">Today 4:21 pm - 12.06.2014</small>
                                    <div class="actions">
                                        <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                                        <a class="btn btn-xs btn-danger"><i class="fa fa-heart"></i> Love</a>
                                    </div>
                                </div>
                            </div>

                            <div class="feed-element">
                                <a href="#" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/profile.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right">5m ago</small>
                                    <strong>Monica Smith</strong> posted a new blog. <br>
                                    <small class="text-muted">Today 5:60 pm - 12.06.2014</small>

                                </div>
                            </div>

                            <div class="feed-element">
                                <a href="#" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a2.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right">2h ago</small>
                                    <strong>Mark Johnson</strong> posted message on <strong>Monica Smith</strong> site. <br>
                                    <small class="text-muted">Today 2:10 pm - 12.06.2014</small>
                                    <div class="well">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                        Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                    </div>
                                    <div class="pull-right">
                                        <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                                        <a class="btn btn-xs btn-white"><i class="fa fa-heart"></i> Love</a>
                                        <a class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Message</a>
                                    </div>
                                </div>
                            </div>
                            <div class="feed-element">
                                <a href="#" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a3.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right">2h ago</small>
                                    <strong>Janet Rosowski</strong> add 1 photo on <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">2 days ago at 8:30am</small>
                                    <div class="photos">
                                        <a target="_blank" href="http://24.media.tumblr.com/20a9c501846f50c1271210639987000f/tumblr_n4vje69pJm1st5lhmo1_1280.jpg"> <img alt="image" class="feed-photo" src="img/p1.jpg"></a>
                                        <a target="_blank" href="http://37.media.tumblr.com/9afe602b3e624aff6681b0b51f5a062b/tumblr_n4ef69szs71st5lhmo1_1280.jpg"> <img alt="image" class="feed-photo" src="img/p3.jpg"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="feed-element">
                                <a href="#" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a4.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right text-navy">5h ago</small>
                                    <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                    <div class="actions">
                                        <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                                        <a class="btn btn-xs btn-white"><i class="fa fa-heart"></i> Love</a>
                                    </div>
                                </div>
                            </div>
                            <div class="feed-element">
                                <a href="#" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a5.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right">2h ago</small>
                                    <strong>Kim Smith</strong> posted message on <strong>Monica Smith</strong> site. <br>
                                    <small class="text-muted">Yesterday 5:20 pm - 12.06.2014</small>
                                    <div class="well">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                        Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                    </div>
                                    <div class="pull-right">
                                        <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                                    </div>
                                </div>
                            </div>
                            <div class="feed-element">
                                <a href="#" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/profile.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right">23h ago</small>
                                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                    <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                </div>
                            </div>
                            <div class="feed-element">
                                <a href="#" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a7.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right">46h ago</small>
                                    <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary btn-block m"><i class="fa fa-arrow-down"></i> Show More</button>

                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
