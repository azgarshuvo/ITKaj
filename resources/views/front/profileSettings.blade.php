<?php
/**
 * Created by PhpStorm.
 * User: shuvo
 * Date: 08-Oct-17
 * Time: 2:40 PM
 */
//dd($cities);
?>
@extends('layouts.front.profileMaster')

@section('title', 'Profile')

@section('content')
    <!-- Profile Content -->
    <div class="col-md-9">
        <div class="profile-body margin-bottom-20">
            <div class="tab-v1">
                <ul class="nav nav-justified nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#profile">Edit Profile</a></li>
                    <li><a data-toggle="tab" href="#passwordTab">Change Password</a></li>
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
                                        <div class="col-md-6 setText" id="fname">{{$userProfile->fname}}</div>
                                        <div class="col-md-6">
                                            <input class="form-control" value="{{$userProfile->fname}}" type="hidden" name="fname" />
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
                                        <div class="col-md-6 setText" id="lname">{{$userProfile->lname}}</div>
                                        <div class="col-md-6">
                                            <input class="form-control" value="{{$userProfile->lname}}" type="hidden" name="lname" />
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
                                        <div class="col-md-6 setText" id="username">{{$userProfile->username}}</div>
                                        <div class="col-md-6">
                                            <input class="form-control" value="{{$userProfile->username}}" type="hidden" name="username" />
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
                                            {{$userProfile->email}}
                                        </div>
                                    </div>
                                </dd>
                                <hr>
                                <dt><strong>Phone Number </strong></dt>
                                <dd>
                                    <div class="row">
                                        <div id="phone" class="col-md-10 setText">
                                            {{$userProfile->profile->phone_number}}
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control"  type="hidden" value="{{$userProfile->profile->phone_number}}" name="phone">
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
                                        <div  class="col-md-6 setText" id="country">
                                            {{--{{$userProfile->profile->country}}--}}
                                            <select class="form-control margin-bottom-20" name="country" disabled>
                                                <option value="">Select One</option>
                                                @foreach($countries as $country)
                                                    @if($userProfile->profile->country == $country->id)
                                                        <option value="{{$country->id}}" selected="selected">{{$country->name}}</option>
                                                    @endif
                                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            {{--<input class="form-control" type="hidden" value="{{$userProfile->profile->country}}" name="country">--}}
                                            <select class="form-control margin-bottom-20 country" name="country">
                                                <option value="">Select One</option>
                                                @foreach($countries as $country)
                                                    @if($userProfile->profile->country == $country->id)
                                                        <option value="{{$country->id}}" selected="selected">{{$country->name}}</option>
                                                    @endif
                                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <span>
                                                <a onclick="changeData('country')" class="pull-right address_edit" href="javascript:void(0);">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </span>
                                            <span>
                                                <a onclick="resetData('country')" class="pull-right address hidden" href="javascript:void(0);">
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
                                        <div  class="col-md-6 setText" id="city">
                                            {{--{{$userProfile->profile->country}}--}}
                                            <select class="form-control margin-bottom-20 cityOptions" name="city" disabled>

                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control margin-bottom-20 cityOptions" name="city">

                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <span>
                                                <a onclick="changeData('city')" class="pull-right address_edit" href="javascript:void(0);">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </span>
                                            <span>
                                                <a onclick="resetData('city')" class="pull-right address hidden" href="javascript:void(0);">
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
                                            {{$userProfile->profile->address}}
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type="hidden" value="{{$userProfile->profile->address}}" name="address">
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
                                                {{$userProfile->profile->company_name}}
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-control" type="hidden" value="{{$userProfile->profile->company_name}}" name="company_name">
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
                                                {{$userProfile->profile->company_website}}
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-control" type="hidden" value="{{$userProfile->profile->company_website}}" name="web_address">
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
                                            {{$userProfile->profile->professional_title}}
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type="hidden" value="{{$userProfile->profile->professional_title}}" name="professional_title">
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
                                            {{$userProfile->profile->professional_overview}}
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type="hidden" value="{{$userProfile->profile->professional_title}}" name="professional_overview">
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
                                                {{$userProfile->profile->skills}}
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-control" type="hidden" value="{{$userProfile->profile->skills}}" name="skills">
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
                                                {{$userProfile->experience_lavel}}
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-control" type="hidden" value="{{$userProfile->experience_lavel}}" name="hourly_rate">
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
                                            <div class="col-md-6 setText" id="experience_lavel">
                                                <select class="form-control margin-bottom-20" name="experience_lavel">
                                                    <option value="">Select One</option>
                                                    <option value="1">Entry Level</option>
                                                    <option value="2">Intermediate Level</option>
                                                    <option value="3">Expart Level</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-control" type="hidden" value="{{$userProfile->profile->experience_lavel}}" name="experience_lavel">
                                            </div>
                                            <div class="col-md-6">
                                                <span>
                                                    <a onclick="changeData('experience_lavel')" class="pull-right experience_lavel_edit" href="javascript:void(0);">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                </span>
                                                <span>
                                                    <a onclick="resetData('experience_lavel')" class="pull-right experience_lavel hidden" href="javascript:void(0);">
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
    <input type="hidden" value="{{$userProfile->profile->country}}" id="userCountryId">
    <input type="hidden" value="{{$cities}}" id="userCities">
@endsection
@section('script')
    {{--this script use for update password--}}
    <script type="text/javascript">

        $(document).ready(function(){
            if($('#userCountryId').val() != null && $('#userCountryId').val() != ''){
                $("select.cityOptions").html("<option value=\"\">Select One</option>" +
                    "@foreach($cities as $city)\n" +
                    "@if($userProfile->profile->country == $city->countries_id)\n" +
                    "@if($userProfile->profile->city == $city->id)" +
                    "<option value=\"{{$city->id}}\" selected = 'selected'>{{$city->name}}</option>\n" +
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


        $("#infoUpdate").click(function(event){
            event.preventDefault();

            var data = $( "#profile_change" ).serializeArray() ;
            $.post("{{route('changeProfile')}}",
                {
                    _token: '{{csrf_token()}}',
                    fname: $("input[name=fname]").val(),
                    lname: $("input[name=lname]").val(),
                    companyName: $("input[name=companyName]").val(),
                    phone: $("input[name=phone]").val(),
                    officePhone: $("input[name=officePhone]").val(),
                    address: $("input[name=address]").val(),
                    company_name: $("input[name=company_name]").val(),
                    web_address: $("input[name=web_address]").val(),
                    skills: $("input[name=skills]").val(),
                    experience_lavel: $("input[name=experience_lavel]").val(),
                    professional_title: $("input[name=professional_title]").val()
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
            $( ".fa-times" ).parent().addClass('hidden');
        });
    </script>
@endsection
