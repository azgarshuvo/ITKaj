<?php
/**
 * Created by PhpStorm.
 * User: zakariya
 * Date: 11-Oct-17
 * Time: 11:23 AM
 */
?>
@extends('layouts.front.master')

@section('title', 'Email Confirmation Notification')

@section('content')
    <div class="container content">
        <div class="row">
            <div class="col-md-12">
                <div class="clearfix margin-bottom-30"></div>
                <div class="clearfix margin-bottom-30"></div>
                <div class="clearfix margin-bottom-15"></div>
                <div class="shadow-wrapper">
                    <blockquote class="hero box-shadow shadow-effect-2">
                        <p><em><h1>Please Confirm Your Email Address To Gain Full Access</h1></em></p>
                        <p><em><button class="btn-u btn-brd rounded btn-u-green btn-u-sm" type="button"><i class="fa fa-envelope-o"></i> Resend Confirmation Email</button></em></p>
                        <small><em>Company Name...</em></small>
                    </blockquote>
                </div>
                <div class="clearfix margin-bottom-30"></div>
                <div class="clearfix margin-bottom-30"></div>
                <div class="clearfix margin-bottom-20"></div>
            </div>
        </div>
    </div>
@endsection

