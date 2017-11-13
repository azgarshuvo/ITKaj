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
        @if($errors->any())
            <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach()
            </div>
        @endif
        <div class="ibox-content wizard-card">
            <form class="form-horizontal" action="{{route('adminUpdate', $users->id)}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-lg-2 control-label">First Name</label>
                    <div class="col-lg-10"><input type="text" name="fname" value="{{$users->fname}}" placeholder="First Name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Last Name</label>
                    <div class="col-lg-10"><input type="text" name="lname" value="{{$users->lname}}" placeholder="Last Name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">User Name</label>
                    <div class="col-lg-10"><input type="text" name="username" value="{{$users->username}}" placeholder="Email" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-10"><input type="email" name="email" value="{{$users->email}}" placeholder="Email" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Password</label>
                    <div class="col-lg-10"><input type="password" name="password" value="" placeholder="Password" class="form-control"></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Admin User Type</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="admin_user_type">
                        <option value="1" {{($users->admin_user_type == 1) ? "selected" : ""}}>Super Admin</option>
                        <option value="2" {{($users->admin_user_type == 2) ? "selected" : ""}}>Mid Level Admin</option>
                        <option value="3" {{($users->admin_user_type == 3) ? "selected" : ""}}>Third Level Admin</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Phone Number</label>
                    <div class="col-lg-10"><input type="text" name="phone_number" value="@if($usersProfile != null && $usersProfile != ""){{$usersProfile->phone_number}}@endif" placeholder="Phone Number" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Country</label>
                    <div class="col-lg-10"><input type="text" name="country" value="@if($usersProfile != null && $usersProfile != ""){{$usersProfile->country}}@endif" placeholder="Country" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">City</label>
                    <div class="col-lg-10"><input type="text" name="city" value="@if($usersProfile != null && $usersProfile != ""){{$usersProfile->city}}@endif" placeholder="City" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Post Code</label>
                    <div class="col-lg-10"><input type="text" name="postcode" value="@if($usersProfile != null && $usersProfile != ""){{$usersProfile->postcode}}@endif" placeholder="Post Code" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Address</label>
                    <div class="col-lg-10"><textarea type="text" name="address" value="" placeholder="Address" class="form-control">@if($usersProfile != null && $usersProfile != ""){{$usersProfile->address}}@endif</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Profile Picture</label>
                    <div class="col-lg-10 ">
                      <div class="picture-container">
                        <div class="picture">
                            <img src="@if($usersProfile != null && $usersProfile != ""){{ asset('uploads/admin/' . $usersProfile->img_path) }}@endif" class="picture-src" id="output_image"/>
                            <input type="file" name='image' accept="image/*" onchange="preview_image(event)">
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
