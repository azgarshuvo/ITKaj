<?php
/**
 * Created by PhpStorm.
 * User: zakariya
 * Date: 09-Oct-17
 * Time: 2:37 PM
 */
//dd(Auth::User())
?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                            {{--<img alt="image" class="img-circle" src="{{asset('admin/img/profile_small.jpg')}}" />--}}
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0);"><span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{Auth::User()->fname}}</strong></a>
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
                <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Skills</span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{route('skillAdd')}}">Add Skill</a></li>
                    <li><a href="{{route('skillList')}}">Skill List</a></li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Jobs</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{route('jobList')}}">Job List</a></li>
                    <li><a href="{{route('jobApproveList')}}">Job Approve List</a></li>
                    <li><a href="{{route('jobDisApproveList')}}">Job Disapprove List</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Interested Jobs</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{route('interestedList')}}">Interested Job List</a></li>
                    <li><a href="{{route('interestedApproveList')}}">Interested Job Approve List</a></li>
                    <li><a href="{{route('interestedDisapproveList')}}">Interested Job Disapprove List</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Exam</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{route('addExam')}}">Add Exam</a></li>
                    <li><a href="{{route('listExam')}}">Exam List</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-envelope"></i> <span class="nav-label">Message</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{route('admin-message')}}">User List</a></li>
                    {{--<li><a href="{{route('listExam')}}">Exam List</a></li>--}}
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-envelope"></i> <span class="nav-label">Message to All Users</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{route('adminMessageForAllUsers')}}">Message</a></li>
                    <li><a href="{{route('adminMessageForAllUsersList')}}">message List</a></li>
                </ul>
            </li>
        </ul>

    </div>
</nav>
