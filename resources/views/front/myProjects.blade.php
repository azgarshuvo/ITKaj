<?php
/**
 * Created by PhpStorm.
 * User: shuvo
 * Date: 08-Oct-17
 * Time: 4:33 PM
 */
?>
@extends('layouts.front.profileMaster')

@section('title', 'Profile')

@section('content')
   <!-- Profile Content -->
                <div class="col-md-9">
                    <div class="profile-body">
                        <!--Projects-->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="easy-block-v1">
                                    <img class="img-responsive" src="{{asset('assets/img/main/img12.jpg')}}" alt="">
                                    <div class="easy-block-v1-badge rgba-red">Web Design</div>
                                </div>
                                <div class="projects">
                                    <h2><a class="color-dark" href="#">Rigging in Autodesk 3Ds Max</a></h2>
                                    <ul class="list-unstyled list-inline blog-info-v2">
                                        <li>By: <a class="color-green" href="#">Edward Rooster</a></li>
                                        <li><i class="fa fa-clock-o"></i> Jan 02, 2013</li>
                                    </ul>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry printing. Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                                    <br>
                                    <h3 class="heading-xs">Project Completeness <span class="pull-right">77%</span></h3>
                                    <div class="progress progress-u progress-xxs">
                                        <div class="progress-bar progress-bar-u" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%">
                                        </div>
                                    </div>
                                    <ul class="list-inline blog-info-v2">
                                        <li>
                                            <strong>12%</strong>
                                            <span>Funded</span>
                                        </li>
                                        <li>
                                            <strong>17%</strong>
                                            <span>Pludged</span>
                                        </li>
                                        <li>
                                            <strong>25</strong>
                                            <span>days to go</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="project-share">
                                    <ul class="list-inline comment-list-v2 pull-left">
                                        <li><i class="fa fa-eye"></i> <a href="#">25</a></li>
                                        <li><i class="fa fa-comments"></i> <a href="#">32</a></li>
                                        <li><i class="fa fa-retweet"></i> <a href="#">77</a></li>
                                    </ul>
                                    <ul class="list-inline star-vote pull-right">
                                        <li><i class="color-green fa fa-star"></i></li>
                                        <li><i class="color-green fa fa-star"></i></li>
                                        <li><i class="color-green fa fa-star"></i></li>
                                        <li><i class="color-green fa fa-star-half-o"></i></li>
                                        <li><i class="color-green fa fa-star-o"></i></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="service-or easy-block-v2 no-margin-bottom">
                                    <img class="img-responsive" src="{{asset('assets/img/main/img16.jpg')}}" alt="">
                                    <div class="easy-bg-v2 rgba-default">Unify</div>
                                </div>
                                <div class="projects">
                                    <h2><a class="color-dark" href="#">Getting Started Photography</a></h2>
                                    <ul class="list-unstyled list-inline blog-info-v2">
                                        <li>By: <a class="color-green" href="#">Edward Rooster</a></li>
                                        <li><i class="fa fa-clock-o"></i> Jan 07, 2013</li>
                                    </ul>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry printing. Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                                    <br>
                                    <h3 class="heading-xs">Project Completeness <span class="pull-right">92%</span></h3>
                                    <div class="progress progress-u progress-xxs">
                                        <div class="progress-bar progress-bar-u" role="progressbar" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100" style="width: 92%">
                                        </div>
                                    </div>
                                    <ul class="list-inline blog-info-v2">
                                        <li>
                                            <strong>45%</strong>
                                            <span>Funded</span>
                                        </li>
                                        <li>
                                            <strong>58%</strong>
                                            <span>Pludged</span>
                                        </li>
                                        <li>
                                            <strong>5</strong>
                                            <span>days to go</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="project-share">
                                    <ul class="list-inline comment-list-v2 pull-left">
                                        <li><i class="fa fa-eye"></i> <a href="#">45</a></li>
                                        <li><i class="fa fa-comments"></i> <a href="#">90</a></li>
                                        <li><i class="fa fa-retweet"></i> <a href="#">84</a></li>
                                    </ul>
                                    <ul class="list-inline star-vote pull-right">
                                        <li><i class="color-green fa fa-star"></i></li>
                                        <li><i class="color-green fa fa-star"></i></li>
                                        <li><i class="color-green fa fa-star"></i></li>
                                        <li><i class="color-green fa fa-star"></i></li>
                                        <li><i class="color-green fa fa-star-half-o"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div><!--/end row-->
                        <!--End Projects-->

                        <hr>

                        <!--Projects-->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="easy-block-v1">
                                    <img class="img-responsive" src="{{asset('assets/img/main/img17.jpg')}}" alt="">
                                    <div class="easy-block-v1-badge rgba-purple">Graphic Design</div>
                                </div>
                                <div class="projects">
                                    <h2><a class="color-dark" href="#">Rigging in Autodesk 3Ds Max</a></h2>
                                    <ul class="list-unstyled list-inline blog-info-v2">
                                        <li>By: <a class="color-green" href="#">Edward Rooster</a></li>
                                        <li><i class="fa fa-clock-o"></i> Jan 02, 2013</li>
                                    </ul>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry printing. Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                                    <br>
                                    <h3 class="heading-xs">Project Completeness <span class="pull-right">77%</span></h3>
                                    <div class="progress progress-u progress-xxs">
                                        <div class="progress-bar progress-bar-u" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%">
                                        </div>
                                    </div>
                                    <ul class="list-inline blog-info-v2">
                                        <li>
                                            <strong>12%</strong>
                                            <span>Funded</span>
                                        </li>
                                        <li>
                                            <strong>17%</strong>
                                            <span>Pludged</span>
                                        </li>
                                        <li>
                                            <strong>25</strong>
                                            <span>days to go</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="project-share">
                                    <ul class="list-inline comment-list-v2 pull-left">
                                        <li><i class="fa fa-eye"></i> <a href="#">25</a></li>
                                        <li><i class="fa fa-comments"></i> <a href="#">32</a></li>
                                        <li><i class="fa fa-retweet"></i> <a href="#">77</a></li>
                                    </ul>
                                    <ul class="list-inline star-vote pull-right">
                                        <li><i class="color-green fa fa-star"></i></li>
                                        <li><i class="color-green fa fa-star"></i></li>
                                        <li><i class="color-green fa fa-star"></i></li>
                                        <li><i class="color-green fa fa-star-half-o"></i></li>
                                        <li><i class="color-green fa fa-star-o"></i></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="service-or easy-block-v2 no-margin-bottom">
                                    <img class="img-responsive" src="{{asset('assets/img/main/img18.jpg')}}" alt="">
                                    <div class="easy-bg-v2 rgba-blue">Nokia</div>
                                </div>
                                <div class="projects">
                                    <h2><a class="color-dark" href="#">Getting Started Photography</a></h2>
                                    <ul class="list-unstyled list-inline blog-info-v2">
                                        <li>By: <a class="color-green" href="#">Edward Rooster</a></li>
                                        <li><i class="fa fa-clock-o"></i> Jan 07, 2013</li>
                                    </ul>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry printing. Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                                    <br>
                                    <h3 class="heading-xs">Project Completeness <span class="pull-right">92%</span></h3>
                                    <div class="progress progress-u progress-xxs">
                                        <div class="progress-bar progress-bar-u" role="progressbar" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100" style="width: 92%">
                                        </div>
                                    </div>
                                    <ul class="list-inline blog-info-v2">
                                        <li>
                                            <strong>45%</strong>
                                            <span>Funded</span>
                                        </li>
                                        <li>
                                            <strong>58%</strong>
                                            <span>Pludged</span>
                                        </li>
                                        <li>
                                            <strong>5</strong>
                                            <span>days to go</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="project-share">
                                    <ul class="list-inline comment-list-v2 pull-left">
                                        <li><i class="fa fa-eye"></i> <a href="#">45</a></li>
                                        <li><i class="fa fa-comments"></i> <a href="#">90</a></li>
                                        <li><i class="fa fa-retweet"></i> <a href="#">84</a></li>
                                    </ul>
                                    <ul class="list-inline star-vote pull-right">
                                        <li><i class="color-green fa fa-star"></i></li>
                                        <li><i class="color-green fa fa-star"></i></li>
                                        <li><i class="color-green fa fa-star"></i></li>
                                        <li><i class="color-green fa fa-star"></i></li>
                                        <li><i class="color-green fa fa-star-half-o"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div><!--/end row-->
                        <!--End Projects-->

                        <hr>

                        <!--Projects-->
                        <div class="row margin-bottom-30">
                            <div class="col-sm-6">
                                <div class="easy-block-v1">
                                    <img class="img-responsive" src="{{asset('assets/img/main/img19.jpg')}}" alt="">
                                    <div class="easy-block-v1-badge rgba-aqua">Unify Project</div>
                                </div>
                                <div class="projects">
                                    <h2><a class="color-dark" href="#">Rigging in Autodesk 3Ds Max</a></h2>
                                    <ul class="list-unstyled list-inline blog-info-v2">
                                        <li>By: <a class="color-green" href="#">Edward Rooster</a></li>
                                        <li><i class="fa fa-clock-o"></i> Jan 02, 2013</li>
                                    </ul>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry printing. Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                                    <br>
                                    <h3 class="heading-xs">Project Completeness <span class="pull-right">77%</span></h3>
                                    <div class="progress progress-u progress-xxs">
                                        <div class="progress-bar progress-bar-u" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%">
                                        </div>
                                    </div>
                                    <ul class="list-inline blog-info-v2">
                                        <li>
                                            <strong>12%</strong>
                                            <span>Funded</span>
                                        </li>
                                        <li>
                                            <strong>17%</strong>
                                            <span>Pludged</span>
                                        </li>
                                        <li>
                                            <strong>25</strong>
                                            <span>days to go</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="project-share">
                                    <ul class="list-inline comment-list-v2 pull-left">
                                        <li><i class="fa fa-eye"></i> <a href="#">25</a></li>
                                        <li><i class="fa fa-comments"></i> <a href="#">32</a></li>
                                        <li><i class="fa fa-retweet"></i> <a href="#">77</a></li>
                                    </ul>
                                    <ul class="list-inline star-vote pull-right">
                                        <li><i class="color-green fa fa-star"></i></li>
                                        <li><i class="color-green fa fa-star"></i></li>
                                        <li><i class="color-green fa fa-star"></i></li>
                                        <li><i class="color-green fa fa-star-half-o"></i></li>
                                        <li><i class="color-green fa fa-star-o"></i></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="service-or easy-block-v2 no-margin-bottom">
                                    <img class="img-responsive" src="{{asset('assets/img/main/img20.jpg')}}" alt="">
                                    <div class="easy-bg-v2 rgba-yellow">Sony</div>
                                </div>
                                <div class="projects">
                                    <h2><a class="color-dark" href="#">Getting Started Photography</a></h2>
                                    <ul class="list-unstyled list-inline blog-info-v2">
                                        <li>By: <a class="color-green" href="#">Edward Rooster</a></li>
                                        <li><i class="fa fa-clock-o"></i> Jan 07, 2013</li>
                                    </ul>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry printing. Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                                    <br>
                                    <h3 class="heading-xs">Project Completeness <span class="pull-right">92%</span></h3>
                                    <div class="progress progress-u progress-xxs">
                                        <div class="progress-bar progress-bar-u" role="progressbar" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100" style="width: 92%">
                                        </div>
                                    </div>
                                    <ul class="list-inline blog-info-v2">
                                        <li>
                                            <strong>45%</strong>
                                            <span>Funded</span>
                                        </li>
                                        <li>
                                            <strong>58%</strong>
                                            <span>Pludged</span>
                                        </li>
                                        <li>
                                            <strong>5</strong>
                                            <span>days to go</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="project-share">
                                    <ul class="list-inline comment-list-v2 pull-left">
                                        <li><i class="fa fa-eye"></i> <a href="#">45</a></li>
                                        <li><i class="fa fa-comments"></i> <a href="#">90</a></li>
                                        <li><i class="fa fa-retweet"></i> <a href="#">84</a></li>
                                    </ul>
                                    <ul class="list-inline star-vote pull-right">
                                        <li><i class="color-green fa fa-star"></i></li>
                                        <li><i class="color-green fa fa-star"></i></li>
                                        <li><i class="color-green fa fa-star"></i></li>
                                        <li><i class="color-green fa fa-star"></i></li>
                                        <li><i class="color-green fa fa-star-half-o"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div><!--/end row-->
                        <!--End Projects-->
                        <button type="button" class="btn-u btn-u-default btn-u-sm btn-block">Load More</button>
                    </div>
                </div>
                <!-- End Profile Content -->
@endsection

