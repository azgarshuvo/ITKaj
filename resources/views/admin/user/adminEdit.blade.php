<?php
/**
 * Created by PhpStorm.
 * User: zakariya
 * Date: 09-Oct-17
 * Time: 2:19 PM
 */
?>
@extends('layouts.admin.master')

@section('title', 'Add Admin')

@section('content')
    <div class="wrapper wrapper-content">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Add Admin Just Templating</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content wizard-card">
            <form class="form-horizontal" action="{{route('adminUpdate', $users->id)}}" method="post">
                <div class="form-group">
                    <label class="col-lg-2 control-label">First Name</label>
                    <div class="col-lg-10"><input type="text" name="fname" placeholder="First Name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Last Name</label>
                    <div class="col-lg-10"><input type="text" name="lname" placeholder="Last Name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-10"><input type="email" name="email" placeholder="Email" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">User Name</label>
                    <div class="col-lg-10"><input type="text" name="user_name" placeholder="User Name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Password</label>
                    <div class="col-lg-10"><input type="password" name="password" placeholder="Password" class="form-control"></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Admin User Type</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="addminUserType">
                        <option value="1">Super Admin</option>
                        <option value="2">Mid Level Admin</option>
                        <option value="3">Third Level Admin</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Phone Number</label>
                    <div class="col-lg-10"><input type="text" name="phone_number" placeholder="Phone Numbere" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Country</label>
                    <div class="col-lg-10"><input type="text" name="country" placeholder="Country" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">City</label>
                    <div class="col-lg-10"><input type="text" name="city" placeholder="City" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Post Code</label>
                    <div class="col-lg-10"><input type="text" name="post_code" placeholder="Post Code" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Address</label>
                    <div class="col-lg-10"><textarea type="text" name="address" placeholder="Address" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Profile Picture</label>
                    <div class="col-lg-10 ">
                      <div class="picture-container">
                        <div class="picture">
                            <img src="assets/img/avatar.png" class="picture-src" id="output_image"/>
                            <input type="file" accept="image/*" onchange="preview_image(event)">
                        </div>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
