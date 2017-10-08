<?php
/**
 * Created by PhpStorm.
 * User: zakariya
 * Date: 05-Oct-17
 * Time: 5:00 PM
 */
?>
@extends('layouts.front.master')

@section('title', 'Home Page')

@section('content')
    <!--=== Search Block ===-->
    <div class="search-block parallaxBg">
        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <h1>Discover <span class="color-green">new</span> jobs</h1>

                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search     ...">
                    <span class="input-group-btn">
                        <button class="btn-u btn-u-lg" type="button"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </div>
        </div>
    </div><!--/container-->
    <!--=== End Search Block ===-->

    <!--=== Content ===-->
    <div class="container content">
        <!-- Top Categories -->
        <div class="headline"><h2>Top Categories</h2></div>
        <div class="row category margin-bottom-20">
            <!-- Info Blocks -->
            <div class="col-md-4 col-sm-6">
                <div class="content-boxes-v3 margin-bottom-10 md-margin-bottom-20">
                    <i class="icon-custom icon-sm rounded-x icon-bg-brown fa fa-desktop"></i>
                    <div class="content-boxes-in-v3">
                        <h3><a href="#"> Web design</a> <small>(462)</small></h3>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium</p>
                    </div>
                </div>
            </div>
            <!-- End Info Blocks -->
            <!-- Info Blocks -->
            <div class="col-md-4 col-sm-6 md-margin-bottom-40">
                <div class="content-boxes-v3 margin-bottom-10 md-margin-bottom-20">
                    <i class="icon-custom icon-sm rounded-x icon-bg-yellow fa fa-thumbs-o-up"></i>
                    <div class="content-boxes-in-v3">
                        <h3><a href="#"> Programming</a> <small>(4053)</small></h3>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium</p>
                    </div>
                </div>
            </div>
            <!-- End Info Blocks -->

            <!-- Begin Section-Block -->
            <div class="col-md-4 col-sm-12">
                <div class="section-block">
                    <div class="text-center">
                        <i class="rounded icon-custom icon-sm icon-bg-darker line-icon icon-graph"></i>
                        <h2>Popular Search</h2>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis. <a href="#">View more</a></p>
                    </div>

                    </br>

                    <!-- Progress Bar -->
                    <h3 class="heading-xs no-top-space">Web Design <span class="pull-right">88%</span></h3>
                    <div class="progress progress-u progress-xxs">
                        <div style="width: 88%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="88" role="progressbar" class="progress-bar progress-bar-u">
                        </div>
                    </div>

                    <h3 class="heading-xs no-top-space">PHP/WordPress <span class="pull-right">76%</span></h3>
                    <div class="progress progress-u progress-xxs">
                        <div style="width: 76%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="76" role="progressbar" class="progress-bar progress-bar-u">
                        </div>
                    </div>

                    <h3 class="heading-xs no-top-space">HTML/CSS <span class="pull-right">97%</span></h3>
                    <div class="progress progress-u progress-xxs">
                        <div style="width: 97%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="97" role="progressbar" class="progress-bar progress-bar-u">
                        </div>
                    </div>
                    <!-- End Progress Bar -->

                    <div class="clearfix"></div>

                    <div class="section-block-info">
                        <ul class="list-inline tags-v1">
                            <li><a href="#">#HTML5</a></li>
                            <li><a href="#">#Bootstrap</a></li>
                            <li><a href="#">#Blog and Portfolio</a></li>
                            <li><a href="#">#Responsive</a></li>
                            <li><a href="#">#Unify</a></li>
                            <li><a href="#">#JavaScript</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Section-Block -->
        </div>
        <!-- End Top Categories -->
    </div><!--/container-->
    <!--=== End Content ===-->
    <!--=== Container Part ===-->
    <div class="bg-grey">
        <div class="container content-md">
            <div class="headline"><h2>Highest Rated Jobs</h2></div>
            <ul class="row list-row margin-bottom-30">
                <li class="col-md-4 md-margin-bottom-30">
                    <div class="content-boxes-v3 block-grid-v1 rounded">
                        <img class="pull-left rounded-x block-grid-v1-img" src="assets/img/testimonials/img6.jpg" alt="">
                        <div class="content-boxes-in-v3">
                            <h3><a href="#">Forbes 1000</a></h3>
                            <ul class="star-vote">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star-half-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                            </ul>
                            <ul class="list-inline margin-bottom-5">
                                <li>By <a class="color-green" href="#">Edward Rooster</a></li>
                                <li><i class="fa fa-clock-o"></i> Oct 07, 2014</li>
                            </ul>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium...</p>
                            <ul class="list-inline block-grid-v1-add-info">
                                <li><a href="#"><i class="fa fa-eye"></i> 34039</a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i> 451</a></li>
                                <li><a href="#"><i class="fa fa-download"></i> 10842</a></li>
                                <li><a href="#"><i class="fa fa-heart"></i> 863</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="col-md-4 md-margin-bottom-30">
                    <div class="content-boxes-v3 block-grid-v1 rounded">
                        <i class="icon-custom icon-sm rounded-x icon-bg-red fa fa-line-chart"></i>
                        <div class="content-boxes-in-v3">
                            <h3><a href="#">Business &amp; Finance</a></h3>
                            <ul class="star-vote">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star-half-o"></i></li>
                            </ul>
                            <ul class="list-inline margin-bottom-5">
                                <li>By <a class="color-green" href="#">The Economist</a></li>
                                <li><i class="fa fa-clock-o"></i> Oct 02, 2014</li>
                            </ul>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium...</p>
                            <ul class="list-inline block-grid-v1-add-info">
                                <li><a href="#"><i class="fa fa-eye"></i> 4258</a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i> 382</a></li>
                                <li><a href="#"><i class="fa fa-download"></i> 2938</a></li>
                                <li><a href="#"><i class="fa fa-heart"></i> 230</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="col-md-4">
                    <div class="content-boxes-v3 block-grid-v1 rounded">
                        <img class="rounded-x pull-left block-grid-v1-img" src="assets/img/testimonials/img7.jpg" alt="">
                        <div class="content-boxes-in-v3">
                            <h3><a href="#">Web Programming</a></h3>
                            <ul class="star-vote">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star-half-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                            </ul>
                            <ul class="list-inline margin-bottom-5">
                                <li>By <a class="color-green" href="#">Edward Rooster</a></li>
                                <li><i class="fa fa-clock-o"></i> Jan 02, 2013</li>
                            </ul>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium...</p>
                            <ul class="list-inline block-grid-v1-add-info">
                                <li><a href="#"><i class="fa fa-eye"></i> 34039</a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i> 451</a></li>
                                <li><a href="#"><i class="fa fa-download"></i> 10842</a></li>
                                <li><a href="#"><i class="fa fa-heart"></i> 863</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>

            <ul class="row list-row">
                <li class="col-md-4 md-margin-bottom-30">
                    <div class="content-boxes-v3 block-grid-v1 rounded">
                        <i class="icon-custom icon-sm rounded-x icon-bg-blue fa fa-twitter"></i>
                        <div class="content-boxes-in-v3">
                            <h3><a href="#">Social Network</a></h3>
                            <ul class="star-vote">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                            </ul>
                            <ul class="list-inline margin-bottom-5">
                                <li>By <a class="color-green" href="#">Twitter Inc.</a></li>
                                <li><i class="fa fa-clock-o"></i> Jan 02, 2013</li>
                            </ul>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium...</p>
                            <ul class="list-inline block-grid-v1-add-info">
                                <li><a href="#"><i class="fa fa-eye"></i> 25232</a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i> 543</a></li>
                                <li><a href="#"><i class="fa fa-download"></i> 6782</a></li>
                                <li><a href="#"><i class="fa fa-heart"></i> 943</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="col-md-4 md-margin-bottom-30">
                    <div class="content-boxes-v3 block-grid-v1 rounded">
                        <img class="rounded-x pull-left block-grid-v1-img" src="assets/img/testimonials/img2.jpg" alt="">
                        <div class="content-boxes-in-v3">
                            <h3><a href="#">Education/Travel</a></h3>
                            <ul class="star-vote">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star-half-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                            </ul>
                            <ul class="list-inline margin-bottom-5">
                                <li>By <a class="color-green" href="#">Stanford University</a></li>
                                <li><i class="fa fa-clock-o"></i> Jan 02, 2013</li>
                            </ul>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium...</p>
                            <ul class="list-inline block-grid-v1-add-info">
                                <li><a href="#"><i class="fa fa-eye"></i> 7653</a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i> 342</a></li>
                                <li><a href="#"><i class="fa fa-download"></i> 3621</a></li>
                                <li><a href="#"><i class="fa fa-heart"></i> 583</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="col-md-4">
                    <div class="content-boxes-v3 block-grid-v1 rounded">
                        <i class="icon-custom icon-sm rounded-x icon-bg-purple fa fa-music"></i>
                        <div class="content-boxes-in-v3">
                            <h3><a href="#">Music/Films</a></h3>
                            <ul class="star-vote">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star-half-o"></i></li>
                            </ul>
                            <ul class="list-inline margin-bottom-5">
                                <li>By <a class="color-green" href="#">Sony Corporation</a></li>
                                <li><i class="fa fa-clock-o"></i> Jan 02, 2013</li>
                            </ul>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium...</p>
                            <ul class="list-inline block-grid-v1-add-info">
                                <li><a href="#"><i class="fa fa-eye"></i> 5263</a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i> 741</a></li>
                                <li><a href="#"><i class="fa fa-download"></i> 21314</a></li>
                                <li><a href="#"><i class="fa fa-heart"></i> 1041</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection