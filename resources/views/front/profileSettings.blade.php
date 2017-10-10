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
                                        <dt><strong>Company name </strong></dt>
                                        <dd>
                                            <div class="row">
                                                <div class="col-md-6" id="companyName">Htmlstream</div>
                                                <div class="col-md-6">
                                                    <input class="form-control" type="hidden" value="Htmlstream" name="companyName">
                                                </div>
                                                <div class="col-md-6">
                                                    <span>
                                                        <a onclick="changeData('companyName')" class="pull-right" href="javascript:void;">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                        </dd>
                                        <hr>
                                        <dt><strong>Primary Email Address </strong></dt>
                                        <dd>
                                            <div class="row">
                                                <div  id="email" class="col-md-6">
                                                    edward-rooster@gmail.com
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-control" type="hidden" value="Htmlstream" name="email">
                                                </div>
                                                <div class="col-md-6">
                                                    <span>
                                                        <a onclick="changeData('email')" class="pull-right" href="javascript:void;">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                    </span>
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
                                        <dt><strong>Office Number </strong></dt>
                                        <dd>
                                            <div class="row">
                                                <div class="col-md-8" id="officePhone">
                                                    (304) 33-2867-499
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-control" type="hidden" value="304) 33-2867-499 " name="officePhone">
                                                </div>
                                                <div class="col-md-6">
                                                    <span>
                                                        <a onclick="changeData('officePhone')" class="pull-right" href="javascript:void;">
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

                        $.ajax({
                            url: "{{route('changeProfile')}}", // Url to which the request is send
                            type: "POST",             // Type of request to be send, called as method
                            data: new FormData("#profile_change"), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                            contentType: false,       // The content type used when sending data to the server.
                            cache: false,             // To unable request pages to be cached
                            processData:false,        // To send DOMDocument or non processed data file it is set to false
                            success: function(data)   // A function to be called if request succeeds
                            {
                                $('#loading').hide();
                                $("#message").html(data);
                            }
                        });

                    });
                </script>
@endsection

