<?php
/**
 * Created by PhpStorm.
 * User: shuvo
 * Date: 07-Oct-17
 * Time: 6:19 PM
 */
?>
@extends('layouts.front.master')

@section('title', 'Job Post')

@section('content')
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Job Post</h1>
        </div><!--/container-->
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->
    <!--=== Content Part ===-->
    <div class="container content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <!-- @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif -->
                <form method="post" class="reg-page">

                    {{csrf_field()}}
                    <div class="reg-header">
                        <h2>Fill Up the Bellow Field to Post a New Job</h2>
                    </div>

                    <label>Job Title<span class="color-red">*</span></label>
                    <input name="title" type="text" class="form-control margin-bottom-20">

                    <label>Description<span class="color-red">*</span></label>
                    <input name="description" type="text" class="form-control margin-bottom-20">

                    <label>Category<span class="color-red">*</span></label>
                    <select class="form-control margin-bottom-20" name="category">
                            <option value="">Select One</option>
                            <option value="web">Web Development</option>
                            <option value="desktop">Desktop Application</option>
                            <option value="mobile">Mobile Application</option>
                            <option value="image">Computer Vision</option>
                            
                        </select>

                    <label>Sub Category</label>
                        <select class="form-control margin-bottom-20" name="subCategory">
                            <option value="">Select One</option>
                            <option value="">select1</option>
                            <option value="">select2</option>
                        </select>
                    
                    <label>Payment<span class="color-red">*</span></label>
                    <input name="payment" type="number" class="form-control margin-bottom-20">

                    <label>Duration<span class="color-red">*</span></label>
                    <select class="form-control margin-bottom-20" name="subCategory">
                            <option value="">Select One</option>
                            <option value="freelancer">Freelancer</option>
                            <option value="employer">employer</option>
                        </select>
                    <hr>

                    <div class="row">
                        <div class="col-lg-6 checkbox">
                            <label>
                                <input name="terms" type="checkbox">
                                I read <a href="page_terms.html" class="color-green">Terms and Conditions</a>
                            </label>
                        </div>
                        <div class="col-lg-6 text-right">
                            <button class="btn-u" type="submit">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><!--/container-->
    <!--=== End Content Part ===-->
@endsection

