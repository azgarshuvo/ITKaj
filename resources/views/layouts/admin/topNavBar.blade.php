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
            <li class="dropdown notification-status">
                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell"></i>
                    @if($unreadMessage->count()>0)
                      <span class="label label-primary">{{$unreadMessage->count()}}</span>
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
