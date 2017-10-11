<?php
/**
 * Created by PhpStorm.
 * User: shuvo
 * Date: 08-Oct-17
 * Time: 2:40 PM
 */
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
                                                <div class="col-md-6" id="fname">{{$userProfile->fname}}</div>
                                                <div class="col-md-6">
                                                    <input class="form-control" value="{{$userProfile->fname}}" type="hidden" name="fname" />
                                                </div>
                                                <div class="col-md-6">
                                                    <span>
                                                        <a id="name" onclick="changeData('fname')" class="pull-right" href="javascript:void;">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                        </dd>

                                        <hr>
                                        <dt><strong>Last name </strong></dt>
                                        <dd>
                                            <div class="row">
                                                <div class="col-md-6" id="lname">{{$userProfile->lname}}</div>
                                                <div class="col-md-6">
                                                    <input class="form-control" value="{{$userProfile->lname}}" type="hidden" name="lname" />
                                                </div>
                                                <div class="col-md-6">
                                                    <span>
                                                        <a id="name" onclick="changeData('lname')" class="pull-right" href="javascript:void;">
                                                            <i class="fa fa-pencil"></i>
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
                                                    {{--{{$userProfile->user_type}}--}}
                                                </div>


                                            </div>
                                        </dd>
                                        <hr>
                                        <dt><strong>Phone Number </strong></dt>
                                        <dd>
                                            <div class="row">
                                                <div id="phone" class="col-md-10">
                                                    {{$userProfile->phone_number}}
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-control"  type="hidden" value="{{$userProfile->phone_number}}" name="phone">
                                                </div>
                                                <div class="col-md-6">
                                                <span>
                                                    <a onclick="changeData('phone')" class="pull-right" href="javascript:void;">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                </span>
                                                </div>
                                            </div>
                                        </dd>
                                        <hr>

                                        <dt><strong>Address </strong></dt>
                                        <dd>
                                            <div class="row">
                                                <div class="col-md-8" id="address">
                                                    {{$userProfile->address}}
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-control" type="hidden" value="{{$userProfile->address}}" name="address">
                                                </div>
                                                <div class="col-md-6">
                                                    <span>
                                                        <a onclick="changeData('address')" class="pull-right" href="javascript:void;">
                                                            <i class="fa fa-pencil"></i>
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
                                                    <div class="col-md-8" id="company_name">
                                                        {{$userProfile->company_name}}
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input class="form-control" type="hidden" value="{{$userProfile->company_name}}" name="company_name">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span>
                                                            <a onclick="changeData('company_name')" class="pull-right" href="javascript:void(0);">
                                                                <i class="fa fa-pencil"></i>
                                                            </a>
                                                         </span>
                                                    </div>
                                                </div>

                                            </dd>
                                            <hr>

                                            <dt><strong>Company Web Address </strong></dt>
                                            <dd>
                                                <div class="row">
                                                    <div class="col-md-8" id="web_address">
                                                        {{$userProfile->company_website}}
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input class="form-control" type="hidden" value="{{$userProfile->company_website}}" name="web_address">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span>
                                                            <a onclick="changeData('web_address')" class="pull-right" href="javascript:void;">
                                                                <i class="fa fa-pencil"></i>
                                                            </a>
                                                         </span>
                                                    </div>
                                                </div>

                                            </dd>
                                            <hr>
                                        @endif
                                    </dl>
                                    <button type="button" class="btn-u btn-u-default">Cancel</button>
                                    <button id="infoUpdate" type="submit" class="btn-u">Save Changes</button>
                                    </form>
                                </div>

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
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Profile Content -->
                {{--this script use for update password--}}
               <script type="text/javascript">
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
                        //$('input').attr('name', 'yourNewname');
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
                               web_address: $("input[name=web_address]").val()
                           },
                           function(data, status){
                               $("#profile_status").html(data);
                               //alert("Data: " + data + "\nStatus: " + status);
                           });
                    });
                </script>
@endsection

