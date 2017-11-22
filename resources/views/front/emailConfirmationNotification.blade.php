<?php
/**
 * Created by PhpStorm.
 * User: zakariya
 * Date: 05-Oct-17
 * Time: 4:15 PM
 */?>
<html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <title>ItKaj - Email Confirmation Notification</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="javascript:void(0);">

    <!-- Web Fonts -->
    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-3.3.7/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-3.3.7/css/dataTables.bootstrap.min.css')}}">


    <!-- CSS Header and Footer -->
    {{--<link rel="stylesheet" href="{{asset('assets/css/headers/header-default.css')}}">--}}
    <link rel="stylesheet" href="{{asset('assets/css/headers/header-v6.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/footers/footer-v1.css')}}">

    <!-- CSS Implementing Plugins -->

    <link rel="stylesheet" href="{{asset('assets/plugins/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/dropzone.css')}}">

    <link rel="stylesheet" href="{{asset('assets/plugins/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/line-icons/line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/scrollbar/css/jquery.mCustomScrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/owl-carousel/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css')}}">
    <!--[if lt IE 9]><link rel="stylesheet" href="{{asset('assets/plugins/sky-forms-pro/skyforms/css/sky-forms-ie8.css')}}"><![endif]-->

    <!-- CSS Page Style -->
    <link rel="stylesheet" href="{{asset('assets/css/pages/profile.css')}}">

    <!-- CSS Page Style -->
    <link rel="stylesheet" href="{{asset('assets/css/pages/page_search.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pages/shortcode_timeline2.css')}}">

    <!-- CSS Page Style -->
    <link rel="stylesheet" href="{{asset('assets/css/pages/page_job.css')}}">

    <!-- CSS Page Style -->
    <link rel="stylesheet" href="{{asset('assets/css/pages/page_log_reg_v1.css')}}">

    <!-- CSS Page Style -->
    <link rel="stylesheet" href="{{asset('assets/css/pages/page_search_inner_tables.css')}}">

    <!-- CSS Theme -->
    <link rel="stylesheet" href="{{asset('assets/css/theme-colors/default.css')}}" id="style_color">
    <link rel="stylesheet" href="{{asset('assets/css/theme-skins/dark.css')}}">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script type="text/javascript" src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
</head>
<body class="header-fixed header-fixed-space">

<div class="wrapper">

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
                            <!-- Message -->
                                @if(Auth::user()->user_type!="admin")
                                    <li>
                                        <a href="{{route('message')}}" class="dropdown-toggle">Message

                                        </a>

                                    </li>
                                    <!-- End Message -->
                                @endif
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

    <div class="container content">
        <div class="row">
            <div class="col-md-12">
                <div class="clearfix margin-bottom-30"></div>
                <div class="clearfix margin-bottom-30"></div>
                <div class="clearfix margin-bottom-15"></div>
                <div class="shadow-wrapper">
                    <blockquote class="hero box-shadow shadow-effect-2">
                        <p><em><h1>Please Confirm Your Email Address To Gain Full Access</h1></em></p>
                        <p><em><button class="btn-u btn-brd rounded btn-u-green btn-u-sm" type="button"><i class="fa fa-envelope-o"></i> Resend Confirmation Email</button></em></p>
                        <small><em>Company Name...</em></small>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
    <!--=== Footer Version 1 ===-->
    <div class="footer-v1">
        <div class="footer">
            <div class="container">
                <div class="row">
                    <!-- About -->
                    <div class="col-md-3 md-margin-bottom-40">
                        <a href="{{route('home')}}"><img  class="footer-logo" src="" alt="ITKAJ"></a>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets </p>
                        <p>containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    </div><!--/col-md-3-->
                    <!-- End About -->

                    <!-- Latest -->
                    <div class="col-md-3 md-margin-bottom-40">
                        <div class="posts">
                            <div class="headline"><h2>Latest Posts</h2></div>
                            {{--<ul class="list-unstyled latest-list">--}}
                            {{--<li>--}}
                            {{--<a href="#">Incredible content</a>--}}
                            {{--<small>May 8, 2014</small>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                            {{--<a href="#">Best shoots</a>--}}
                            {{--<small>June 23, 2014</small>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                            {{--<a href="#">New Terms and Conditions</a>--}}
                            {{--<small>September 15, 2014</small>--}}
                            {{--</li>--}}
                            {{--</ul>--}}
                        </div>
                    </div><!--/col-md-3-->
                    <!-- End Latest -->

                    <!-- Link List -->
                    <div class="col-md-3 md-margin-bottom-40">
                        <div class="headline"><h2>Useful Links</h2></div>
                        <ul class="list-unstyled link-list">
                            {{--<li><a href="#">About us</a><i class="fa fa-angle-right"></i></li>--}}
                            {{--<li><a href="#">Portfolio</a><i class="fa fa-angle-right"></i></li>--}}
                            {{--<li><a href="#">Latest jobs</a><i class="fa fa-angle-right"></i></li>--}}
                            {{--<li><a href="#">Community</a><i class="fa fa-angle-right"></i></li>--}}
                            {{--<li><a href="#">Contact us</a><i class="fa fa-angle-right"></i></li>--}}
                        </ul>
                    </div><!--/col-md-3-->
                    <!-- End Link List -->

                    <!-- Address -->
                    <div class="col-md-3 map-img md-margin-bottom-40">
                        <div class="headline"><h2>Contact Us</h2></div>
                        {{--<address class="md-margin-bottom-40">--}}
                        {{--25, Lorem Lis Street, Orange <br />--}}
                        {{--California, US <br />--}}
                        {{--Phone: 800 123 3456 <br />--}}
                        {{--Fax: 800 123 3456 <br />--}}
                        {{--Email: <a href="mailto:info@anybiz.com" class="">info@anybiz.com</a>--}}
                        {{--</address>--}}
                    </div><!--/col-md-3-->
                    <!-- End Address -->
                </div>
            </div>
        </div><!--/footer-->

        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>
                            2015 &copy; All Rights Reserved.
                            <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
                        </p>
                    </div>

                    <!-- Social Links -->
                    <div class="col-md-6">
                        <ul class="footer-socials list-inline">
                            <li>
                                <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Skype">
                                    <i class="fa fa-skype"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google Plus">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Linkedin">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pinterest">
                                    <i class="fa fa-pinterest"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dribbble">
                                    <i class="fa fa-dribbble"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Social Links -->
                </div>
            </div>
        </div><!--/copyright-->
    </div>
    <!--=== End Footer Version 1 ===-->


    <!-- JS Global Compulsory -->
    <script type="text/javascript" src="{{asset('assets/js/jquery.redirect.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.session.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.numeric.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/bootstrap-3.3.7/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/bootstrap-3.3.7/js/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/jquery/jquery-migrate.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/bootstrap-3.3.7/js/bootstrap.min.js')}}"></script>

    <!-- JS Implementing Plugins -->

    <script type="text/javascript" src="{{asset('assets/plugins/back-to-top.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/smoothScroll.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/sky-forms-pro/skyforms/js/jquery.maskedinput.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/jquery.parallax.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/counter/waypoints.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/counter/jquery.counterup.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/owl-carousel/owl-carousel/owl.carousel.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/counter/waypoints.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/counter/jquery.counterup.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/sky-forms-pro/skyforms/js/jquery.form.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <!-- JS Customization -->
    <script type="text/javascript" src="{{asset('assets/js/custom.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/dropzone.js')}}"></script>
    <!-- JS Page Level -->
    <script type="text/javascript" src="{{asset('assets/js/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/plugins/owl-carousel.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/forms/order.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/forms/review.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/forms/checkout.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/plugins/style-switcher.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/plugins/datepicker.js')}}"></script>

    <script type="text/javascript">
        jQuery(document).ready(function() {
            App.init();
            App.initCounter();
            App.initParallaxBg();
            OwlCarousel.initOwlCarousel();
            StyleSwitcher.initStyleSwitcher();
            OrderForm.initOrderForm();
            ReviewForm.initReviewForm();
            CheckoutForm.initCheckoutForm();
            Datepicker.initDatepicker()
        });
    </script>
    <!--[if lt IE 9]>
    <script src="{{asset('assets/plugins/respond.js')}}"></script>
    <script src="{{asset('assets/plugins/html5shiv.js')}}"></script>
    <script src="{{asset('assets/plugins/placeholder-IE-fixes.js')}}"></script>


    <![endif]-->

</div>
</body>
</html>






