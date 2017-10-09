<?php
/**
 * Created by PhpStorm.
 * User: zakariya
 * Date: 07-Oct-17
 * Time: 4:53 PM
 */
?>
<!--=== End Header ===-->
<div class="header">
    <div class="container">
        <!-- Logo -->
        <a class="logo" href="{{route('home')}}">
            <img src="{{asset('assets/img/logo1-default.png')}}" alt="Logo">
        </a>
        <!-- End Logo -->

        <!-- Topbar -->
        <div class="topbar">
            <ul class="loginbar pull-right">
                @if (Auth::check())
                    <li><a href="{{route('logout')}}">Logout</a></li>
                @else
                    <li><a href="{{route('registration')}}">Signup</a></li>
                    <li class="topbar-devider"></li>
                    <li><a href="{{route('login')}}">Login</a></li>
                @endif
            </ul>
        </div>
        <!-- End Topbar -->

        <!-- Toggle get grouped for better mobile display -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="fa fa-bars"></span>
        </button>
        <!-- End Toggle -->
    </div><!--/end container-->

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">
        <div class="container">
            <ul class="nav navbar-nav">
                <!-- Profile -->
                <li><a href="{{route('profile')}}">Profile</a></li>
                <!-- End Profile -->
            </ul>
            <ul class="nav navbar-nav">
                <!-- Home -->
                <li><a href="{{route('home')}}">Home</a></li>
                <!-- End Home -->
            </ul>
        </div><!--/end container-->
    </div><!--/navbar-collapse-->
</div>
<!--=== End Header ===-->
