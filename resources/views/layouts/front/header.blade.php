<?php
/**
 * Created by PhpStorm.
 * User: zakariya
 * Date: 07-Oct-17
 * Time: 4:53 PM
 */
//dd(Auth::check());
?>
<!--=== Header v6 ===-->
<div class="header-v6 header-classic-dark header-sticky">
    <!-- Navbar -->
    <div class="navbar mega-menu" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="menu-container">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Navbar Brand -->
                <div class="navbar-brand">
                    <a href="{{route('home')}}">
                        <img class="default-logo" src="" alt="ITKAJ">
                    </a>
                </div>
                <!-- ENd Navbar Brand -->

                <!-- Header Inner Right -->
                <div class="header-inner-right">
                    <ul class="menu-icons-list">
                        {{--<li class="menu-icons shopping-cart">--}}
                            {{--<i class="menu-icons-style radius-x fa fa-shopping-cart"></i>--}}
                            {{--<span class="badge">0</span>--}}
                            {{--<div class="shopping-cart-open">--}}
                                {{--<span class="shc-title">No products in the Cart</span>--}}
                                {{--<button type="button" class="btn-u"><i class="fa fa-shopping-cart"></i> Cart</button>--}}
                                {{--<span class="shc-total">Total: <strong>$0.00</strong></span>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="menu-icons">--}}
                            {{--<i class="menu-icons-style search search-close search-btn fa fa-search"></i>--}}
                            {{--<div class="search-open">--}}
                                {{--<input type="text" class="animated fadeIn form-control" placeholder="Start searching ...">--}}
                            {{--</div>--}}
                        {{--</li>--}}
                    </ul>
                </div>
                <!-- End Header Inner Right -->
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-responsive-collapse">
                <div class="menu-container">
                    <ul class="nav navbar-nav">
                        <!-- Home -->
                        <li class="active"><a href="{{route('home')}}" class="dropdown-toggle">Home</a></li>
                        <!-- End Home -->
                        @if (Auth::check())
                            <!-- Profile -->
                            <li><a href="{{route('myProfile')}}" class="dropdown-toggle">Profile</a></li>
                            <!-- End Profile -->
                            @if(Auth::user()->user_type=="employer")
                                <!-- Create project -->
                                <li><a href="{{route('JobPost')}}" class="dropdown-toggle">Create Project</a></li>
                                <!-- End Create Project -->
                            @endif
                            @if(Auth::user()->user_type=="freelancer")
                                <!-- Search for Project -->
                                <li><a href="{{route('jobSearch')}}" class="dropdown-toggle" >Search for Project</a></li>
                                <li><a href="{{route('ExamList')}}" class="dropdown-toggle" >Test</a></li>
                                <!-- End Search for Project -->
                            @endif
                            @if(Auth::user()->user_type=="employer")
                                <!-- Search For Freelancer -->
                                <li><a href="{{route('freelancerSearch')}}" class="dropdown-toggle">Search For Freelancer</a></li>
                                <!-- End Search For Freelancer -->
                            @endif
                            <!-- Logout -->
                                <li><a href="{{route('message')}}" class="dropdown-toggle">Message</a></li>
                                <!-- End Logout -->

                                <!-- Logout -->
                                <li><a href="{{route('logout')}}" class="dropdown-toggle">Logout</a></li>
                                <!-- End Logout -->
                        @else
                            <!-- Sign In -->
                            <li><a href="{{route('login')}}" class="dropdown-toggle">Login</a></li>
                            <!-- End Sign In -->
                            <!-- Sign Up -->
                            <li><a href="{{route('registration')}}" class="dropdown-toggle">SignUp</a></li>
                            <!-- End Sign Up -->
                        @endif

                    </ul>
                </div>
            </div><!--/navbar-collapse-->
        </div>
    </div>
    <!-- End Navbar -->
</div>
<!--=== End Header v6 ===-->