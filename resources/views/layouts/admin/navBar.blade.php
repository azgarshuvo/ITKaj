<?php
/**
 * Created by PhpStorm.
 * User: zakariya
 * Date: 09-Oct-17
 * Time: 2:37 PM
 */
?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="{{asset('admin/img/profile_small.jpg')}}" />
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li>
                <a href="{{route('dashboard')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Admin</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{route('adminAdd')}}">Add Admin</a></li>
                    <li><a href="{{route('adminList')}}">Admin List</a></li>
                </ul>
            </li>

            <li class="">
                <a href="#"><i class="fa fa-user"></i> <span class="nav-label">User</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{route('freelancerList')}}">Freelancer List</a></li>
                    <li><a href="{{route('freelancerApproveList')}}">Freelancer Approve List</a></li>
                    <li><a href="{{route('freelancerDisapproveList')}}">Freelancer Disapprove List</a></li>
                    <li><a href="{{route('employeerList')}}">Employer List</a></li>
                    <li><a href="{{route('employeerApproveList')}}">Employer Approve List</a></li>
                    <li><a href="{{route('employeerDisapproveList')}}">Employer Disapprove List</a></li>
                </ul>
            </li>


            <li>
                <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Category</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{route('categoryAdd')}}">Add Category</a></li>
                    <li><a href="{{route('categoryList')}}">Category List</a></li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Skill</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{route('skillAdd')}}">Add Skill</a></li>
                    <li><a href="{{route('skillList')}}">Skill List</a></li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Job</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{route('jobList')}}">Job List</a></li>
                    <li><a href="{{route('jobApproveList')}}">Job Approve List</a></li>
                    <li><a href="{{route('jobDisApproveList')}}">Job Disapprove List</a></li>
                    {{--<li><a href="{{route('categoryList')}}">Category List</a></li>--}}
                </ul>
            </li>
        </ul>

    </div>
</nav>
