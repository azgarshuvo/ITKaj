<?php
/**
 * Created by PhpStorm.
 * User: zakariya
 * Date: 09-Oct-17
 * Time: 2:19 PM
 */
?>
@extends('layouts.admin.master')

@section('title', 'Admin Details')

@section('content')
    <div class="wrapper wrapper-content">
      <div class="col-md-6 col-md-offset-3">
        @if(!empty($users))
        <div class="ibox float-e-margins">
          <div class="ibox-title">
              <h5>{{$users->fname." ".$users->lname}} Details</h5>

              <div class="ibox-tools">
                  <a class="collapse-link">
                      <i class="fa fa-chevron-up"></i>
                  </a>
              </div>
          </div>
          <div class="ibox-content no-padding border-left-right">
              <img alt="image" class="img-responsive" src="{{asset('admin/img/profile_big.jpg')}}">
          </div>
          <div class="ibox-content profile-content">
            <h4><strong>{{$users->fname." ".$users->lname}}</strong><span> ({{$users->username}})</span></h4>
            <h5><i>Full Stack Developer</i></h5>
            <p><i class="fa fa-map-marker"></i> Dhaka, Bangladesh</p>
            <p><i class="fa fa-envelope"></i> shafikshaon@gmail.com</p>
            <p><i class="fa fa-phone"></i> 01705184686</p>
            <h5>
                About me
            </h5>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat.
            </p>
            <div class="row m-t-lg">
              <div class="col-md-4">
                <span style="color: #18AA8D"><i class="fa fa-briefcase fa-2x" aria-hidden="true"></i></span>
                <h5>Experianced in:</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi </p>
              </div>
                <div class="col-md-4">
                    <span style="color: #18AA8D"><i class="fa fa-money fa-2x" aria-hidden="true"></i></span>
                    <h5><strong>$10</strong> Per Hour</h5>
                </div>
                <div class="col-md-4">
                    <span style="color: #18AA8D"><i class="fa fa-clock-o fa-2x" aria-hidden="true"></i></span>
                    <h5><strong>30 Hours </strong> Available/Week</h5>
                </div>
            </div>
            <div class="user-button">
                <div class="row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary btn-sm btn-block"><i class="fa fa-envelope"></i> Send Message</button>
                    </div>
                </div>
            </div>
          </div>
        </div>
        @endif
      </div>
    </div>
@endsection
