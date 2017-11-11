<?php
/**
 * Created by PhpStorm.
 * User: zakariya
 * Date: 09-Oct-17
 * Time: 2:43 PM
 */
?>
<div class="row border-bottom">
    <nav class="navbar navbar-static-top white-bg" role="navigation">
        <div class="navbar-header">

            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="javascript:void(0);"><i class="fa fa-bars"></i> </a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">

                <ul class="dropdown-menu dropdown-messages">
                    <li>
                        <div class="dropdown-messages-box">
                            <a href="profile.html" class="pull-left">
                                <img alt="image" class="img-circle" src="img/a7.jpg">
                            </a>
                            <div>
                                <small class="pull-right">46h ago</small>
                                <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                            </div>
                        </div>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <div class="dropdown-messages-box">
                            <a href="profile.html" class="pull-left">
                                <img alt="image" class="img-circle" src="img/a4.jpg">
                            </a>
                            <div>
                                <small class="pull-right text-navy">5h ago</small>
                                <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                            </div>
                        </div>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <div class="dropdown-messages-box">
                            <a href="profile.html" class="pull-left">
                                <img alt="image" class="img-circle" src="img/profile.jpg">
                            </a>
                            <div>
                                <small class="pull-right">23h ago</small>
                                <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                            </div>
                        </div>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <div class="text-center link-block">
                            <a href="mailbox.html">
                                <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="dropdown notification-status">

                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell"></i>
                    @if($unreadMessage->count()>0)
                      <span class="label label-primary">

                            {{$unreadMessage->count()}}

                    </span>
                    @endif
                </a>
                <ul class="dropdown-menu dropdown-alerts notification-alert">
                    <li>
                        <a href="{{route('admin-message')}}">
                            <div class="text-center">
                                <i class="fa fa-envelope fa-fw"></i> You have {{$unreadMessage->count()}} messages
                               {{-- <span class="pull-right text-muted small">4 minutes ago</span>--}}
                            </div>
                        </a>
                    </li>
                    @foreach($unreadConversion as $conversion)
                        @if($conversion->UnreadMessage->count()>0)
                        <li class="divider"></li>
                        <li>
                            <a href="{{route('admin-getConversion',['conversionId'=>$conversion->id])}}">
                                <div>
                                    <i class="fa fa-eye-slash"> </i>  {{$conversion->UnreadMessage->count()}} New Message From {{$conversion->getUser->fname}} {{$conversion->getUser->lname}}
                                    <span class="pull-right text-muted small">{{  $conversion->UnreadMessage[0]->time }}</span>
                                </div>
                            </a>
                        </li>
                        @endif
                    @endforeach

                    <li class="divider"></li>
                    <li>
                        <div class="text-center link-block">
                            <a href="{{route('admin-message')}}">
                                <strong>See All Message</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>

            <li>
                <a href="{{route('logout')}}">
                    <i class="fa fa-sign-out"></i> Log out
                </a>
            </li>
        </ul>

    </nav>
</div>
