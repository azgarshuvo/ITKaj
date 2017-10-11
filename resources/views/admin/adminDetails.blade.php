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
            <h4><strong>{{$users->fname." ".$users->lname}}</strong></h4>
            <p><i class="fa fa-map-marker"></i> Dhaka, Bangladesh</p>
            <h5>
                About me
            </h5>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat.
            </p>
            <div class="row m-t-lg">
                <div class="col-md-4">
                    <span class="bar">5,3,9,6,5,9,7,3,5,2</span>
                    <h5><strong>169</strong> Posts</h5>
                </div>
                <div class="col-md-4">
                    <span class="line">5,3,9,6,5,9,7,3,5,2</span>
                    <h5><strong>28</strong> Following</h5>
                </div>
                <div class="col-md-4">
                    <span class="bar">5,3,2,-1,-3,-2,2,3,5,2</span>
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
        @endif
      </div>
    </div>
@endsection
