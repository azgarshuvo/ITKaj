<?php
/**
 * Created by PhpStorm.
 * User: shuvo
 * Date: 08-Oct-17
 * Time: 2:40 PM
 */
$edus = (Auth::User()->education);
$emps = (Auth::User()->employment);
//dd($emps);
?>
@extends('layouts.front.profileMaster')

@section('title', 'Profile')

@section('content')
{{--{{dd($countries[17]->name)}}--}}
    <!-- Profile Content -->
    <div class="col-md-9">
        <div class="profile-body margin-bottom-20">
            <div class="tab-v1">
                <ul class="nav nav-justified nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#profile">Edit Profile</a></li>
                    <li><a data-toggle="tab" href="#passwordTab">Change Password</a></li>
                    <li><a data-toggle="tab" href="#education">Education</a></li>
                    <li><a data-toggle="tab" href="#employment">Employment</a></li>
                    <li><a data-toggle="tab" href="#payment">Payment Options</a></li>
                    <li><a data-toggle="tab" href="#settings">Notification Settings</a></li>
                </ul>
                <div class="tab-content">
                    <div id="profile" class="profile-edit tab-pane fade in active">
                        <h2 class="heading-md">Manage your Name, ID and Email Addresses.</h2>
                        <p>Below are the name and email addresses on file for your account.</p>
                        <br>
                        <p id="profile_status"></p>
                        <form method="POST" class="" id="profile_change" action="{{route('changeProfile')}}">
                            {{csrf_field()}}
                            <dl class="dl-horizontal">
                                <dt><strong>First name </strong></dt>
                                <dd>
                                    <div class="row">
                                        <div class="col-md-6 setText" id="fname"> @if($userProfile->fname !== null || $userProfile->fname != '') {{$userProfile->fname}} @endif</div>
                                        <div class="col-md-6">
                                            <input class="form-control" @if($userProfile->fname !== null || $userProfile->fname != '') value=" {{$userProfile->fname}}" @endif type="hidden" name="fname" />
                                        </div>
                                        <div class="col-md-6">
                                            <span>
                                                <a onclick="changeData('fname')" class="pull-right fname_edit" href="javascript:void(0);">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </span>
                                            <span>
                                                <a onclick="resetData('fname')" class="pull-right fname hidden" href="javascript:void(0);">
                                                    <i class="fa fa-times fa-lg"></i>
                                                </a>
                                            </span>

                                        </div>
                                    </div>
                                </dd>

                                <hr>
                                <dt><strong>Last name </strong></dt>
                                <dd>
                                    <div class="row">
                                        <div class="col-md-6 setText" id="lname">@if($userProfile->lname != null && $userProfile->lname != ''){{$userProfile->lname}}@endif</div>
                                        <div class="col-md-6">
                                            <input class="form-control" @if($userProfile->lname != null && $userProfile->lname != '')value="{{$userProfile->lname}}" @endif type="hidden" name="lname" />
                                        </div>
                                        <div class="col-md-6">
                                            <span>
                                                <a id="name" onclick="changeData('lname')" class="pull-right lname_edit" href="javascript:void(0);">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </span>
                                            <span>
                                                <a onclick="resetData('lname')" class="pull-right lname hidden" href="javascript:void(0);">
                                                    <i class="fa fa-times fa-lg"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </dd>
                                <hr>
                                <dt><strong>User Name </strong></dt>
                                <dd>
                                    <div class="row">
                                        <div class="col-md-6 setText" id="username">@if($userProfile->username != null && $userProfile->username != ''){{$userProfile->username}}@endif</div>
                                        <div class="col-md-6">
                                            <input class="form-control" @if($userProfile->username != null && $userProfile->username != '') value="{{$userProfile->username}}" @endif type="hidden" name="username" />
                                        </div>
                                        <div class="col-md-6">
                                            <span>
                                                <a id="name" onclick="changeData('username')" class="pull-right lname_edit" href="javascript:void(0);">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </span>
                                            <span>
                                                <a onclick="resetData('username')" class="pull-right lname hidden" href="javascript:void(0);">
                                                    <i class="fa fa-times fa-lg"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </dd>
                                <hr>
                                <dt><strong>Email Address </strong></dt>
                                <dd>
                                    <div class="row">
                                        <div  id="email" class="col-md-6">
                                            @if($userProfile->email != null && $userProfile->email != ''){{$userProfile->email}}@endif
                                        </div>
                                    </div>
                                </dd>
                                <hr>
                                <dt><strong>Phone Number </strong></dt>
                                <dd>
                                    <div class="row">
                                        <div id="phone" class="col-md-10 setText">
                                            @if($userProfile->profile != null && $userProfile->profile != ''){{$userProfile->profile->phone_number}}@endif
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control"  type="hidden" @if($userProfile->profile != null && $userProfile->profile != '') value="{{$userProfile->profile->phone_number}}" @endif name="phone">
                                        </div>
                                        <div class="col-md-6">
                                            <span>
                                                <a onclick="changeData('phone')" class="pull-right phone_edit" href="javascript:void(0);">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </span>
                                            <span>
                                                <a onclick="resetData('phone')" class="pull-right phone hidden" href="javascript:void(0);">
                                                    <i class="fa fa-times fa-lg"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </dd>
                                <hr>
                                <dt><strong>Country</strong></dt>
                                
                                <dd>
                                    <div class="row">
                                        <div  class="col-md-6 setText" id="">
                                            <select id="countryDropdown" class="form-control margin-bottom-20 country" name="country" disabled>
                                                <option value="">Select One</option>
                                                @foreach($countries as $country)
                                                    @if($userProfile->profile != null && $userProfile->profile != '')
                                                        @if($userProfile->profile->country == $country->id)
                                                            <option value="{{$country->id}}" selected="selected">{{$country->name}}</option>
                                                        @endif
                                                    @endif
                                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            {{--<input class="form-control" type="hidden" value="{{$userProfile->profile->country}}" name="country">--}}
                                            {{--<select  class="form-control margin-bottom-20 country hidden" name="country">
                                                <option value="0">Select One</option>
                                                @foreach($countries as $country)
                                                    @if($userProfile->profile != null && $userProfile->profile != '')
                                                        @if($userProfile->profile->country == $country->id)
                                                            <option value="{{$country->id}}" selected="selected">{{$country->name}}</option>
                                                        @endif
                                                    @endif
                                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                                @endforeach
                                            </select>--}}
                                        </div>
                                        <div class="col-md-6">
                                            <span>
                                                <a onclick="changeCountry()" class="pull-right country_edit" href="javascript:void(0);">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </span>
                                            <span class="country_cancle hidden">
                                                <a onclick="resetCountry()" class="pull-right " href="javascript:void(0);">
                                                    <i class="fa fa-times fa-lg"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </dd>
                                <hr>
                                <dt><strong>City</strong></dt>
                                <dd>
                                    <div class="row">
                                        <div  class="col-md-6 setText" id="cityOptions">
                                            {{--{{$userProfile->profile->country}}--}}
                                            <select id="cityDropdown" class="form-control margin-bottom-20 cityOptions" name="cityOptions" disabled>

                                            </select>
                                        </div>
                                        {{--<div class="col-md-6">
                                            <select class="hidden form-control margin-bottom-20 cityOptions" name="cityOptions">

                                            </select>
                                        </div>--}}
                                        <div class="col-md-6">
                                            <span id="cityEdit">
                                                <a onclick="changeDropDown('city')" class="pull-right" href="javascript:void(0);">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </span>
                                            <span>
                                                <a onclick="resetCityDropDown('city')" class="pull-right city hidden" href="javascript:void(0);">
                                                    <i class="fa fa-times fa-lg"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </dd>

                                <hr>
                                <dt><strong>Address </strong></dt>
                                <dd>
                                    <div class="row">
                                        <div  class="col-md-8 setText" id="address">
                                            @if($userProfile->profile != null && $userProfile->profile != ''){{$userProfile->profile->address}} @endif
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type="hidden" @if($userProfile->profile != null && $userProfile->profile != '') value="{{$userProfile->profile->address}}" @endif name="address">
                                        </div>
                                        <div class="col-md-6">
                                            <span>
                                                <a onclick="changeData('address')" class="pull-right address_edit" href="javascript:void(0);">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </span>
                                            <span>
                                                <a onclick="resetData('address')" class="pull-right address hidden" href="javascript:void(0);">
                                                    <i class="fa fa-times fa-lg"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>

                                </dd>
                                <hr>
                                @if($userProfile->user_type=="employer")
                                    <dt><strong>Company Name </strong></dt>
                                    <dd>
                                        <div class="row">
                                            <div class="col-md-8 setText" id="company_name">
                                                @if($userProfile->profile != null && $userProfile->profile != ''){{$userProfile->profile->company_name}} @endif
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-control" type="hidden" @if($userProfile->profile != null && $userProfile->profile != '') value="{{$userProfile->profile->company_name}}" @endif name="company_name">
                                            </div>
                                            <div class="col-md-6">
                                                <span>
                                                    <a onclick="changeData('company_name')" class="pull-right company_name_edit" href="javascript:void(0);">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                </span>
                                                <span>
                                                    <a onclick="resetData('company_name')" class="pull-right company_name hidden" href="javascript:void(0);">
                                                        <i class="fa fa-times fa-lg"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>

                                    </dd>
                                    <hr>

                                    <dt><strong>Company Web Address </strong></dt>
                                    <dd>
                                        <div class="row">
                                            <div class="col-md-8 setText" id="web_address">
                                                @if($userProfile->profile != null && $userProfile->profile != '') {{$userProfile->profile->company_website}}@endif
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-control" type="hidden" @if($userProfile->profile != null && $userProfile->profile != '') value="{{$userProfile->profile->company_website}}" @endif name="web_address">
                                            </div>
                                            <div class="col-md-6">
                                                <span>
                                                    <a onclick="changeData('web_address')" class="pull-right web_address_edit" href="javascript:void(0);">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                </span>
                                                <span>
                                                    <a onclick="resetData('web_address')" class="pull-right web_address hidden" href="javascript:void(0);">
                                                        <i class="fa fa-times fa-lg"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>

                                    </dd>
                                    <hr>
                                @endif

                                {{--Professional title start--}}
                                <dt><strong>Professional Title</strong></dt>
                                <dd>
                                    <div class="row">
                                        <div class="col-md-8 setText" id="professional_title">
                                            @if($userProfile->profile != null && $userProfile->profile != ''){{$userProfile->profile->professional_title}} @endif
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type="hidden" @if($userProfile->profile != null && $userProfile->profile != '') value="{{$userProfile->profile->professional_title}}" @endif name="professional_title">
                                        </div>
                                        <div class="col-md-6">
                                            <span>
                                                <a onclick="changeData('professional_title')" class="pull-right professional_title_edit" href="javascript:void(0);">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </span>
                                            <span>
                                                <a onclick="resetData('professional_title')" class="pull-right professional_title hidden" href="javascript:void(0);">
                                                    <i class="fa fa-times fa-lg"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>

                                </dd>
                                <hr>
                                {{--Professional title end--}}
                                {{--Professional Overview start--}}
                                <dt><strong>Professional Overview</strong></dt>
                                <dd>
                                    <div class="row">
                                        <div class="col-md-8 setText" id="professional_overview">
                                            @if($userProfile->profile != null && $userProfile->profile != ''){{$userProfile->profile->professional_overview}} @endif
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type="hidden" @if($userProfile->profile != null && $userProfile->profile != '') value="{{$userProfile->profile->professional_overview}}" @endif name="professional_overview">
                                        </div>
                                        <div class="col-md-6">
                                            <span>
                                                <a onclick="changeData('professional_overview')" class="pull-right professional_overview_edit" href="javascript:void(0);">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </span>
                                            <span>
                                                <a onclick="resetData('professional_overview')" class="pull-right professional_overview hidden" href="javascript:void(0);">
                                                    <i class="fa fa-times fa-lg"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>

                                </dd>
                                <hr>
                                {{--Professional title end--}}
                                {{--This section start for frellancer--}}
                                @if($userProfile->user_type=="freelancer")


                                    {{--Skill  start--}}

                                    <dt><strong>Skill</strong></dt>
                                    <dd>
                                        <div class="row">
                                            <div class="col-md-8 setText" id="skills">
                                                @if($userProfile->profile != null && $userProfile->profile != '') {{$userProfile->profile->skills}} @endif
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-control" type="hidden" @if($userProfile->profile != null && $userProfile->profile != '') value="{{$userProfile->profile->skills}}" @endif name="skills">
                                            </div>
                                            <div class="col-md-6">
                                                <span>
                                                    <a onclick="changeData('skills')" class="pull-right skills_edit" href="javascript:void(0);">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                </span>
                                                <span>
                                                    <a onclick="resetData('skills')" class="pull-right skills hidden" href="javascript:void(0);">
                                                        <i class="fa fa-times fa-lg"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>

                                    </dd>
                                    <hr>
                                    {{--Skill  end--}}

                                    {{--Hourly rate start--}}
                                    <dt><strong>Hourly Rate</strong></dt>
                                    <dd>
                                        <div class="row">
                                            <div class="col-md-8 setText" id="hourly_rate">
                                                @if($userProfile->profile != null && $userProfile->profile ){{$userProfile->profile->hourly_rate}} @endif
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-control" type="hidden" @if($userProfile->profile != null && $userProfile->profile ) value="{{$userProfile->profile->hourly_rate}}"  @endif name="hourly_rate">
                                            </div>
                                            <div class="col-md-6">
                                                <span>
                                                    <a onclick="changeData('hourly_rate')" class="pull-right hourly_rate_edit" href="javascript:void(0);">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                </span>
                                                <span>
                                                    <a onclick="resetData('hourly_rate')" class="pull-right hourly_rate hidden" href="javascript:void(0);">
                                                        <i class="fa fa-times fa-lg"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                    </dd>
                                    <hr>
                                    {{--Experience Level End--}}

                                    {{--Experience Level start--}}
                                    <dt><strong>Experience Level</strong></dt>
                                    <dd>
                                        <div class="row">
                                            <div class="col-md-6 setText hidden experience_level" >
                                                <select id="experience_level_value" class="form-control margin-bottom-20" name="experience_level">
                                                    <option value="">Select One</option>
                                                    @if($userProfile->profile!=null)
                                                        <option @if($userProfile->profile->experience_level=="1") selected @endif value="1">Entry Level</option>
                                                        <option @if($userProfile->profile->experience_level=="2") selected @endif value="2">Intermediate Level</option>
                                                        <option @if($userProfile->profile->experience_level=="3") selected @endif value="3">Expart Level</option>
                                                    @else
                                                        <option value="1">Entry Level</option>
                                                        <option value="2">Intermediate Level</option>
                                                        <option value="3">Expart Level</option>
                                                    @endif
                                                </select>
                                            </div>
                                            <div id="experience_level" class="col-md-6">
                                                @if($userProfile->profile!=null)
                                                    @if($userProfile->profile->experience_level=="1")
                                                        Entry Level
                                                    @elseif($userProfile->profile->experience_level == '2')
                                                        Intermediate Level
                                                    @elseif($userProfile->profile->experience_level=="3")
                                                        Expart Level
                                                    @else

                                                    @endif
                                                @endif
                                                {{--<input class="form-control" type="hidden" @if( $userProfile->profile != null && $userProfile->profile != '') value="{{$userProfile->profile->experience_level}}" @endif name="experience_level">--}}
                                            </div>
                                            <div class="col-md-6">
                                                <span>
                                                    <a onclick="changeData('experience_level')" class="pull-right experience_level_edit" href="javascript:void(0);">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                </span>
                                                <span>
                                                    <a onclick="resetDropDown('experience_level')" class="pull-right experience_level hidden" href="javascript:void(2);">
                                                        <i class="fa fa-times fa-lg"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>

                                    </dd>
                                    <hr>
                                    {{--Experience Level End--}}
                                @endif
                                {{--freelancer section end--}}

                            </dl>
                            <button type="button" class="btn-u btn-u-default">Cancel</button>
                            <button id="infoUpdate" type="submit" class="btn-u">Save Changes</button>
                        </form>
                    </div>
                    {{--Change password tab start here--}}
                    <div id="passwordTab" class="profile-edit tab-pane fade">
                        <h2 class="heading-md">Manage your Security Settings</h2>
                        <p>Change your password.</p>

                        <p class="text-center" id="ajax_message"></p>
                        <br>
                        <form method="POST" class="sky-form" id="password_change" action="{{route('changePassword')}}">
                            {{csrf_field()}}
                            <dl class="dl-horizontal">

                                <dt>Current Password</dt>
                                <dd>
                                    <section>
                                        <label class="input">
                                            <i class="icon-append fa fa-lock"></i>
                                            <input id="c_password" type="password" placeholder="Current Password" name="c_password">
                                            <b class="tooltip tooltip-bottom-right">Needed to verify your account</b>
                                        </label>
                                    </section>
                                </dd>
                                <dt>Enter your password</dt>
                                <dd>
                                    <section>
                                        <label class="input">
                                            <i class="icon-append fa fa-lock"></i>
                                            <input type="password" id="password" name="password" placeholder="Password">
                                            <b class="tooltip tooltip-bottom-right">Don't forget your password</b>
                                        </label>
                                    </section>
                                </dd>
                                <dt>Confirm Password</dt>
                                <dd>
                                    <section>
                                        <label class="input">
                                            <i class="icon-append fa fa-lock"></i>
                                            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm password">
                                            <b class="tooltip tooltip-bottom-right">Don't forget your password</b>
                                        </label>
                                    </section>
                                </dd>
                            </dl>
                            <button type="reset" class="btn-u btn-u-default">Cancel</button>
                            <button id="password_submit" class="btn-u" type="submit">Save Changes</button>
                        </form>
                    </div>
                    {{--Change password tab end here--}}


                    {{--Education Start here--}}


                    <div id="education" class="profile-edit tab-pane fade">
                        <h2 class="heading-md">Education List</h2>

                        <div id="message"></div>
                        <p class="text-center" id="ajax_message"></p>
                        <br>
                            <dl class="dl-horizontal">
                                <div class="row">
                                    @foreach ($edus as $edu)
                                    <div class="col-sm-6">
                                        <div class="projects">
                                            <h2><a class="color-dark" href="#"></a>@if($edu->institution != null && $edu->institution != ''){{$edu->institution}}@endif</h2>
                                            <ul class="list-unstyled list-inline blog-info-v2">

                                                <li><i class="fa fa-clock-o"></i>@if($edu->start_date != null && $edu->start_date != ''){{$edu->start_date}}@endif</li>

                                                <li><i class="fa fa-clock-o"></i>@if($edu->end_date != null && $edu->end_date != ''){{$edu->end_date}}@endif</li>
                                            </ul>
                                            <h5><a class="color-dark">@if($edu->degree != null && $edu->degree != ''){{$edu->degree}}@endif</a></h5>
                                            <h5><a class="color-dark"></a>@if($edu->area_of_study != null && $edu->area_of_study != ''){{$edu->area_of_study}}@endif</h5>
                                            <h5><a class="color-dark"></a>@if($edu->description != null && $edu->description != ''){{$edu->description}}@endif </h5>
                                            <br>
                                        </div>
                                    </div>
                                     @endforeach
                                </div>
                               

                            </dl>
                            <button type="button" class="btn-u" data-toggle="modal" data-target="#educationModal">Add More</button>                       
                    </div>

                     {{--education end here--}}


                    {{--Employment Start Here--}}
                    <div id="employment" class="profile-edit tab-pane fade">
                        <h2 class="heading-md">Employment List</h2>

                        <div id="employmentMessage"></div>
                        <p class="text-center" id="ajax_message"></p>
                        <br>
                        <dl class="dl-horizontal">
                            <div class="row">
                                @foreach ($emps as $emp)
                                <div class="col-sm-6">
                                    <div class="projects">
                                        <h2><a class="color-dark" href="#"></a> @if($emp->company_name != null && $emp->company_name != '') {{$emp->company_name}} @endif</h2>
                                        <ul class="list-unstyled list-inline blog-info-v2">

                                            <li><i class="fa fa-clock-o"></i>@if($emp->start_date != null && $emp->start_date != '') {{$emp->start_date}} @endif</li>

                                            <li><i class="fa fa-clock-o"></i>@if($emp->finish_date != null && $emp->finish_date != '') {{$emp->finish_date}} @endif</li>
                                        </ul>
                                        <h5><a class="color-dark"></a>@if($emp->country != null && $emp->country != '') {{$emp->country}} @endif</h5>
                                        <h5><a class="color-dark"></a>@if($emp->city != null && $emp->city != '') {{$emp->city}} @endif</h5>
                                        <h5><a class="color-dark"></a>@if($emp->postal_code != null && $emp->postal_code != '') {{$emp->postal_code}} @endif</h5>
                                        <h5><a class="color-dark"></a>@if($emp->designation != null && $emp->designation != '') {{$emp->designation}} @endif</h5>
                                        <br>
                                    </div>
                                </div>
                                @endforeach
                            </div>


                        </dl>
                        <button type="button" class="btn-u" data-toggle="modal" data-target="#employmentModal">Add More</button>
                    </div>

                    {{--Employment End Here--}}




                    {{--Payment method tab start--}}
                    <div id="payment" class="profile-edit tab-pane fade">
                        <h2 class="heading-md">Manage your Payment Settings</h2>
                        <p>Below are the payment options for your account.</p>
                        <br>
                        <form class="sky-form" id="sky-form" action="#">
                            <!--Checkout-Form-->
                            <section>
                                <div class="inline-group">
                                    <label class="radio"><input type="radio" checked="" name="radio-inline"><i class="rounded-x"></i>Visa</label>
                                    <label class="radio"><input type="radio" name="radio-inline"><i class="rounded-x"></i>MasterCard</label>
                                    <label class="radio"><input type="radio" name="radio-inline"><i class="rounded-x"></i>PayPal</label>
                                </div>
                            </section>

                            <section>
                                <label class="input">
                                    <input type="text" name="name" placeholder="Name on card">
                                </label>
                            </section>

                            <div class="row">
                                <section class="col col-10">
                                    <label class="input">
                                        <input type="text" name="card" id="card" placeholder="Card number">
                                    </label>
                                </section>
                                <section class="col col-2">
                                    <label class="input">
                                        <input type="text" name="cvv" id="cvv" placeholder="CVV2">
                                    </label>
                                </section>
                            </div>

                            <div class="row">
                                <label class="label col col-4">Expiration date</label>
                                <section class="col col-5">
                                    <label class="select">
                                        <select name="month">
                                            <option disabled="" selected="" value="0">Month</option>
                                            <option value="1">January</option>
                                            <option value="1">February</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                        <i></i>
                                    </label>
                                </section>
                                <section class="col col-3">
                                    <label class="input">
                                        <input type="text" placeholder="Year" id="year" name="year">
                                    </label>
                                </section>
                            </div>
                            <button type="button" class="btn-u btn-u-default">Cancel</button>
                            <button class="btn-u" type="submit">Save Changes</button>
                            <!--End Checkout-Form-->
                        </form>
                    </div>
                    {{--Payment method end--}}

                    {{--Notification tab start--}}
                    <div id="settings" class="profile-edit tab-pane fade">
                        <h2 class="heading-md">Manage your Notifications.</h2>
                        <p>Below are the notifications you may manage.</p>
                        <br>
                        <form class="sky-form" id="sky-form3" action="#">
                            <label class="toggle"><input type="checkbox" checked="" name="checkbox-toggle-1"><i class="no-rounded"></i>Email notification</label>
                            <hr>
                            <label class="toggle"><input type="checkbox" checked="" name="checkbox-toggle-1"><i class="no-rounded"></i>Send me email notification when a user comments on my blog</label>
                            <hr>
                            <label class="toggle"><input type="checkbox" checked="" name="checkbox-toggle-1"><i class="no-rounded"></i>Send me email notification for the latest update</label>
                            <hr>
                            <label class="toggle"><input type="checkbox" checked="" name="checkbox-toggle-1"><i class="no-rounded"></i>Send me email notification when a user sends me message</label>
                            <hr>
                            <label class="toggle"><input type="checkbox" checked="" name="checkbox-toggle-1"><i class="no-rounded"></i>Receive our monthly newsletter</label>
                            <hr>
                            <button type="button" class="btn-u btn-u-default">Reset</button>
                            <button class="btn-u" type="submit">Save Changes</button>
                        </form>
                    </div>
                    {{--notification tab end--}}
                </div>
            </div>
        </div>
    </div>
    <!-- End Profile Content -->
    <input type="hidden" @if($userProfile->profile != null && $userProfile->profile != '') value="{{$userProfile->profile->country}}" @endif id="userCountryId">
    <input type="hidden" value="{{$cities}}" id="userCities">

    {{--Education Modal--}}


    <div class="margin-bottom-40">
        <div class="modal fade" id="educationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel4">Add Education</h4>
                    </div>
                    <div class="modal-body">
                        <!-- Education Form -->
                        <form action="{{route('addEdcation')}}" method="post" enctype="multipart/form-data" id="sky-form1" class="  sky-form">  
                            {{csrf_field()}}          
                            <fieldset>
                                <div class="row">
                                    <section class="col col-6">
                                        <label class="input">
                                            <input type="text" id="institution" name="institution" placeholder="Institution Name">
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label class="input">
                                            <input type="text" id="degree" name="degree" placeholder="Degree">
                                        </label>
                                    </section>
                                </div>

                                <div class="row">
                                    <section class="col col-6">
                                        <label class="input">
                                            <input type="text" name="study_area" id="study_area" placeholder="Area of Study">
                                        </label>
                                    </section>                               
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="row">
                                    <section class="col col-6">
                                        <label class="input">
                                            <i class="icon-append fa fa-calendar"></i>
                                            <input type="text" name="start" id="start" placeholder="Expected start date">
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label class="input">
                                            <i class="icon-append fa fa-calendar"></i>
                                            <input type="text" name="finish" id="finish" placeholder="Expected finish date">
                                        </label>
                                    </section>
                                </div>
                                <section>
                                    <label class="textarea">
                                        <textarea rows="5"  id = "description" name="description" placeholder="Tell us about your Experience"></textarea>
                                    </label>
                                </section>
                            </fieldset>
                            <footer>
                                <button type="submit" id="addEducation" class="btn-u">Add</button>                           
                            </footer>
                        </form>
                        <!-- End Education Form -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="closeModal" class="btn-u btn-u-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Education Modal End Here--}}

    {{--Employment Modal Start Here--}}

    <div class="margin-bottom-40">
        <div class="modal fade" id="employmentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel4">Add Employment</h4>
                    </div>
                    <div class="modal-body">
                        <!-- Employment Form -->
                        <form action="{{route('addEmployment')}}" method="post" enctype="multipart/form-data" id="sky-form1" class="  sky-form">
                            {{csrf_field()}}
                            <fieldset>
                                <div class="row">
                                    <section class="col col-6">
                                        <label class="input">
                                            <input type="text" id="company" name="company" placeholder="Company Name">
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label class="input">
                                            <input type="text" id="country_name" name="country_name" placeholder="Country">
                                        </label>
                                    </section>
                                </div>

                                <div class="row">
                                    <section class="col col-6">
                                        <label class="input">
                                            <input type="text" name="city" id="city" placeholder="City">
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label class="input">
                                            <input type="number" name="postal_code" id="postal_code" placeholder="Postal code">
                                        </label>
                                    </section>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="row">
                                    <section class="col col-6">
                                        <label class="input">
                                            <i class="icon-append fa fa-calendar"></i>
                                            <input type="text" name="start_date" id="start_date" placeholder="Expected start date">
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <label class="input">
                                            <i class="icon-append fa fa-calendar"></i>
                                            <input type="text" name="finish_date" id="finish_date" placeholder="Expected finish date">
                                        </label>
                                    </section>
                                </div>
                                <section>
                                    <label class="textarea">
                                        <textarea rows="5"  id = "designation" name="designation" placeholder="Tell us about your designation"></textarea>
                                    </label>
                                </section>
                            </fieldset>
                            <footer>
                                <button type="submit" id="addEmployment" class="btn-u">Add</button>
                            </footer>
                        </form>
                        <!-- End Education Form -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="closeEmploymentModal" class="btn-u btn-u-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--Employment Modal End Here--}}
@endsection
@section('script')
    {{--this script use for update password--}}
    <script type="text/javascript">

        $(document).ready(function(){
            if($('#userCountryId').val() != null && $('#userCountryId').val() != ''){
                $("select.cityOptions").html("<option value=\"\">Select One</option>" +
                    "@foreach($cities as $city)\n" +
                    "@if($userProfile->profile != null && $userProfile->profile != '')\n" +
                    "@if($userProfile->profile->country == $city->countries_id)\n" +
                    "@if($userProfile->profile->city == $city->id)" +
                    "<option value=\"{{$city->id}}\" selected = 'selected'>{{$city->name}}</option>\n" +
                    "@endif" +
                    "@endif" +
                    "<option value=\"{{$city->id}}\">{{$city->name}}</option>\n" +
                    "@endif\n" +
                    "@endforeach");
            }else{
                $('select.cityOptions').html("<option value=\"\">Select One</option>");
            }
        });

        $(".country").change(function() {
            var Selected_id = $('.country option:selected').val();
            var Cities = JSON.parse($('#userCities').val());
            $("select.cityOptions").html("<option value=\"\">Select One</option>");
            $.each(Cities, function( index, value ) {
                if(value.countries_id == Selected_id){
                    $('.cityOptions').append($('<option>', {
                        value: value.id,
                        text : value.name
                    }));
                }
            });
        });

        $("#password_submit").click(function(event){
            event.preventDefault();
            var c_password = $("#c_password").val();
            var password = $("#password").val();
            var password_confirm = $("#password_confirmation").val();
            $.post("{{route('changePassword')}}",
                {
                    _token: '{{csrf_token()}}',
                    c_password: c_password,
                    password: password,
                    password_confirmation :password_confirm
                },
                function(data, status){
                    $("#ajax_message").html(data);
                    return false;
                    //alert("Data: " + data + "\nStatus: " + status);
                });

        });
    </script>
    <script type="text/javascript">
        function changeData(name){
            var value = $("input[name=name]").val();

            $("input[name="+name+"]").attr('type', 'text');
            $("#"+name).addClass('hidden');
            $("."+name+"_edit").addClass('hidden');
            $("."+name).removeClass('hidden');
            //$('input').attr('name', 'yourNewname');
        }

        function resetData(name){
            var text = $("#"+name).text();
            var value = $.trim(text);
            $("input[name="+name+"]").val(value);
            $("input[name="+name+"]").attr('type', 'hidden');
            $("#"+name).removeClass('hidden');
            $("."+name+"_edit").removeClass('hidden');
            $("."+name).addClass('hidden');
        }

        function resetDropDown(name){

            $("#"+name).removeClass('hidden');
            $("."+name+"_edit").removeClass('hidden');
            $("."+name).addClass('hidden');
            var desiredValue = $("#experience_level").text();
            var value = $.trim(desiredValue);

            $('[name=experience_level] option').filter(function() {
                return ($(this).text() == value);
            }).prop('selected', true);

        }

        /*use for city and country name change*/
        function changeDropDown(name){
            $("#"+name+"Dropdown").removeAttr('disabled');
            $("."+name).removeClass('hidden');
           $("#cityEdit").addClass('hidden');
        }

        /*use for city dropdown reset*/
        function resetCityDropDown(name){
            $("#"+name+"Edit").removeClass('hidden');
            $("."+name).addClass('hidden');
            $('#cityDropdown').prop("disabled", true);
        }

        /*Enable country dropdown*/
        function changeCountry(){
            $("#countryDropdown").removeAttr('disabled');
            $(".country_edit").parent().addClass('hidden');
            $(".country_cancle").removeClass('hidden');
        }

        /*Country update cancle */
        function resetCountry(){
            $("#countryDropdown").prop("disabled", true);
            $(".country_edit").parent().removeClass('hidden');
            $(".country_cancle").addClass('hidden');
        }

        /*update whole info in edit profile setting*/

        $("#infoUpdate").click(function(event){
            event.preventDefault();

            $.post("{{route('changeProfile')}}",
                {
                    _token: '{{csrf_token()}}',
                    fname: $("input[name=fname]").val(),
                    lname: $("input[name=lname]").val(),
                    companyName: $("input[name=companyName]").val(),
                    phone: $("input[name=phone]").val(),
                    username: $("input[name=username]").val(),
                    country: $("#countryDropdown").val(),
                    city: $("#cityDropdown").val(),
                    officePhone: $("input[name=officePhone]").val(),
                    address: $("input[name=address]").val(),
                    company_name: $("input[name=company_name]").val(),
                    web_address: $("input[name=web_address]").val(),
                    skills: $("input[name=skills]").val(),
                    hourly_rate: $("input[name=hourly_rate]").val(),
                    experience_level: $("#experience_level_value").val(),
                    professional_title: $("input[name=professional_title]").val(),
                    professional_overview: $("input[name=professional_overview]").val()
                },
                function(data, status){
                    $("#profile_status").html(data);
                    //alert("Data: " + data + "\nStatus: " + status);
                });
            $('input[type=text]').each(function(){
                $(this).parent().parent().find(".setText").text($(this).val());
            });
            $("input[type='text']").attr('type', 'hidden');
            $( "div.hidden" ).removeClass('hidden');
            $( ".fa-pencil" ).parent().removeClass('hidden');
            $( ".experience_level" ).addClass('hidden');
            $( "#experience_level" ).text($("select[name='experience_level']").find('option:selected').text());
            $( ".fa-times" ).parent().addClass('hidden');
        });
    </script>

    <!-- Add education script -->
    <script type="text/javascript">
        $("#addEducation").click(function(e){
            e.preventDefault();
            var institution = $("#institution").val();
            var degree = $("#degree").val();
            var study_area = $("#study_area").val();
            var start = $("#start").val();
            var finish = $("#finish").val();
            var description = $("#description").val();
            $.post("{{route('addEdcation')}}",
                {
                    _token: '{{csrf_token()}}',
                    institution : institution,
                    degree:degree,
                    study_area:study_area,
                    start:start,
                    finish:finish,
                    description:description,
                },
                function(data, status){
                    //alert(data);
                    //$("#profile_status").html(data);
                    //alert("Data: " + data );
                    $("#message").html(data);
                    
                    $("#institution").val("");
                    $("#degree").val("");
                    $("#study_area").val("");
                    $("#start").val("");
                    $("#finish").val("");
                    $("#description").val("");
                    $("#closeModal").click();
                });
        });
    </script>

    {{--Add Emplyment Script--}}
    <script type="text/javascript">
        $("#addEmployment").click(function(e){
            e.preventDefault();
            var company_name = $('#company').val();
            var country = $('#country_name').val();
            var city = $('#city').val();
            var postal_code = $('#postal_code').val();
            var start_date = $('#start_date').val();
            var finish_date = $('#finish_date').val();
            var designation = $('#designation').val();

            $.post("{{route('addEmployment')}}",
                {
                    _token: '{{csrf_token()}}',
                    company_name: company_name,
                    country: country,
                    city: city,
                    postal_code: postal_code,
                    start_date: start_date,
                    finish_date: finish_date,
                    designation: designation,
                },

            function(data, status) {
                $("#employmentMessage").html(data);

                $('#company').val("");
                $('#country').val("");
                $('#city').val("");
                $('#postal_code').val("");
                $('#start_date').val("");
                $('#finish_date').val("");
                $('#designation').val("");

                $('#closeEmploymentModal').click();
            });
        });

    </script>
@endsection