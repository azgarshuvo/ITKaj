<?php
/**
 * Created by PhpStorm.
 * User: zakariya
 * Date: 09-Oct-17
 * Time: 01:45 PM
 */
//dd(Auth::User())
?>
<!--Left Sidebar-->
<div class="col-md-3 md-margin-bottom-40">
    {{--<img class="img-responsive profile-img margin-bottom-20 left-profile" @if(strlen(App\UserProfile::where('user_id',Auth::user()->id)->first()->img_path)>3)  src="{{asset('profile_img/'.App\UserProfile::where('user_id',Auth::user()->id)->first()->img_path)}}" @else src="{{asset('assets/img/team/img32-md.jpg')}}" @endif alt="">--}}
    @if(Auth::User()->profile != null)
        <img id="image-profile" class="img-responsive md-margin-bottom-10 img img-thumbnail img-bordered profile-imge" @if(Auth::User()->profile->img_path != null && Auth::User()->profile->img_path != '' )  src="{{asset('profile_img/'.Auth::User()->profile->img_path)}}" @else src="{{asset('assets/img/team/img32-md.jpg')}}" @endif alt="">
    @else
        <img id="image-profile" class="img-responsive md-margin-bottom-10 img img-thumbnail img-bordered profile-imge" src="{{asset('assets/img/team/img32-md.jpg')}}" alt="">
    @endif

        <ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
        <li class="list-group-item">
            <a href="{{route('profileOverall')}}"><i class="fa fa-bar-chart-o"></i> Overall</a>
        </li>
        <li class="list-group-item">
            <a href="{{route('myProfile')}}"><i class="fa fa-user"></i> Profile</a>
        </li>
      <li class="list-group-item list-toggle">
        <a data-toggle="collapse" data-parent="#sidebar-nav" href="#collapse-buttons"><i class="fa fa-cubes"></i>My Project</a>
        <ul id="collapse-buttons" class="collapse">
            <li>
                <a href="{{route('projectsList')}}">Project List </a>
            </li>
            @if(Auth::User()->user_type == 'employer')
            <li>
                <a href="{{route('projectApprovedList')}}"> Project Approved List</a>
            </li>
            <li>
                <a href="{{route('projectDisapprovedList')}}"> Project Disapproved List</a>
            </li>
            @endif
            <li>
                <a href="{{route('projectDoneList')}}"> Project Done List</a>
            </li>
            @if(Auth::User()->user_type == 'freelancer')
            <li>
                <a href="{{route('projectInterestedList')}}"> Project Interested List</a>
            </li>
            @endif
            <li>
                <a href="{{route('projectOngoingList')}}"> Project Ongoing List</a>
            </li>
        </ul>
    </li>


        <li class="list-group-item">
            <a href="{{route('profileSettings')}}"><i class="fa fa-cog"></i> Settings</a>
        </li>
    </ul>

    <div class="panel-heading-v2 overflow-h">
        <h2 class="heading-xs pull-left"><i class="fa fa-bar-chart-o"></i> Task Progress</h2>
        <a href="#"><i class="fa fa-cog pull-right"></i></a>
    </div>
    <h3 class="heading-xs">Web Design <span class="pull-right">92%</span></h3>
    <div class="progress progress-u progress-xxs">
        <div style="width: 92%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="92" role="progressbar" class="progress-bar progress-bar-u">
        </div>
    </div>
    <h3 class="heading-xs">Unify Project <span class="pull-right">85%</span></h3>
    <div class="progress progress-u progress-xxs">
        <div style="width: 85%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="85" role="progressbar" class="progress-bar progress-bar-blue">
        </div>
    </div>
    <h3 class="heading-xs">Sony Corporation <span class="pull-right">64%</span></h3>
    <div class="progress progress-u progress-xxs margin-bottom-40">
        <div style="width: 64%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="64" role="progressbar" class="progress-bar progress-bar-dark">
        </div>
    </div>

    <hr>

    <!--Notification-->
    <div class="panel-heading-v2 overflow-h">
        <h2 class="heading-xs pull-left"><i class="fa fa-bell-o"></i> Notification</h2>
        <a href="#"><i class="fa fa-cog pull-right"></i></a>
    </div>
    <ul class="list-unstyled mCustomScrollbar margin-bottom-20" data-mcs-theme="minimal-dark">
        <li class="notification">
            <i class="icon-custom icon-sm rounded-x icon-bg-red icon-line icon-envelope"></i>
            <div class="overflow-h">
                <span><strong>Albert Heller</strong> has sent you email.</span>
                <small>Two minutes ago</small>
            </div>
        </li>
        <li class="notification">
            <img class="rounded-x" src="{{asset('assets/img/testimonials/img6.jpg')}}" alt="">
            <div class="overflow-h">
                <span><strong>Taylor Lee</strong> started following you.</span>
                <small>Today 18:25 pm</small>
            </div>
        </li>
        <li class="notification">
            <i class="icon-custom icon-sm rounded-x icon-bg-yellow icon-line fa fa-bolt"></i>
            <div class="overflow-h">
                <span><strong>Natasha Kolnikova</strong> accepted your invitation.</span>
                <small>Yesterday 1:07 pm</small>
            </div>
        </li>
        <li class="notification">
            <img class="rounded-x" src="{{asset('assets/img/testimonials/img1.jpg')}}" alt="">
            <div class="overflow-h">
                <span><strong>Mikel Andrews</strong> commented on your Timeline.</span>
                <small>23/12 11:01 am</small>
            </div>
        </li>
        <li class="notification">
            <i class="icon-custom icon-sm rounded-x icon-bg-blue icon-line fa fa-comments"></i>
            <div class="overflow-h">
                <span><strong>Bruno Js.</strong> added you to group chating.</span>
                <small>Yesterday 1:07 pm</small>
            </div>
        </li>
        <li class="notification">
            <img class="rounded-x" src="{{asset('assets/img/testimonials/img6.jpg')}}" alt="">
            <div class="overflow-h">
                <span><strong>Taylor Lee</strong> changed profile picture.</span>
                <small>23/12 15:15 pm</small>
            </div>
        </li>
    </ul>
    <button type="button" class="btn-u btn-u-default btn-u-sm btn-block">Load More</button>
    <!--End Notification-->
</div>
<!--End Left Sidebar-->
