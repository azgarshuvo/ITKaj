<?php
/**
 * Created by PhpStorm.
 * User: zakariya
 * Date: 05-Oct-17
 * Time: 5:00 PM
 */
$count = 0;
?>
<html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <title>ItKaj - Home</title>

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
    <link rel="stylesheet" href="{{asset('assets/css/one.style.css')}}">


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
    <link rel="stylesheet" href="{{asset('assets/plugins/pace/pace-flash.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/scrollbar/css/jquery.mCustomScrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/owl-carousel/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/cube-portfolio/cubeportfolio/custom/custom-cubeportfolio.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/revolution-slider/rs-plugin/css/settings.css')}}" type="text/css" media="screen">
    <!--[if lt IE 9]><link rel="stylesheet" href="{{asset('assets/plugins/revolution-slider/rs-plugin/css/settings-ie8.css')}}" type="text/css" media="screen"><![endif]-->
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
    <script type="text/javascript" src="{{asset('assets/js/plugins/revolution-slider.js')}}"></script>
</head>
<body class="demo-lightbox-gallery" id="body" data-spy="scroll" data-target=".one-page-header">
<div class="wrapper">
    <!--=== Header ===-->
    <nav class="one-page-header navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="menu-container page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Navbar Brand -->
                <a href="{{route('home')}}" class="navbar-brand">
                    {{--<img class="default-logo" src="" alt="ITKAJ">--}}
                    <span>I</span>TKAJ
                </a>
                <!-- ENd Navbar Brand -->
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <div class="menu-container">
                    <ul class="nav navbar-nav">
                        <li class="page-scroll home">
                            <a href="{{route('home')}}" class="dropdown-toggle">Home</a>
                        </li>
                    @if (Auth::check())
                        <!-- Profile -->
                            <li>
                                <a href="{{route('myProfile')}}" class="dropdown-toggle">Profile</a>
                            </li>
                            <!-- End Profile -->
                        @if(Auth::user()->user_type=="employer")
                            <!-- Create project -->
                                <li>
                                    <a href="{{route('JobPost')}}" class="dropdown-toggle">Create Project</a>
                                </li>
                                <!-- End Create Project -->
                        @endif
                        @if(Auth::user()->user_type=="freelancer")
                            <!-- Search for Project -->
                                <li>
                                    <a href="{{route('jobSearch')}}" class="dropdown-toggle" >Search for Project</a>
                                </li>
                                <!-- End Search for Project -->
                        @endif
                        @if(Auth::user()->user_type=="employer")
                            <!-- Search For Freelancer -->
                                <li>
                                    <a href="{{route('freelancerSearch')}}" class="dropdown-toggle">Search For Freelancer</a>
                                </li>
                                <!-- End Search For Freelancer -->
                        @endif

                        <!-- Logout -->
                            <li>
                                <a href="{{route('logout')}}" class="dropdown-toggle">Logout</a>
                            </li>
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
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!--=== End Header ===-->
    <!-- Intro Section -->
    <section id="intro" class="intro-section">
        <div class="fullscreenbanner-container">
            <div class="fullscreenbanner">
                <ul>
                    <!-- SLIDE 1 -->
                    <li data-transition="curtain-1" data-slotamount="5" data-masterspeed="700" data-title="Slide 1">
                        <!-- MAIN IMAGE -->
                        <img src="{{asset('assets/img/sliders/revolution/bg1.jpg')}}" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">

                        <!-- LAYERS -->
                        <div class="tp-caption rs-caption-1 sft start"
                             data-x="center"
                             data-hoffset="0"
                             data-y="100"
                             data-speed="800"
                             data-start="2000"
                             data-easing="Back.easeInOut"
                             data-endspeed="300">
                            WE ARE ITKAJ COMPANY
                        </div>

                        <!-- LAYER -->
                        <div class="tp-caption rs-caption-2 sft"
                             data-x="center"
                             data-hoffset="0"
                             data-y="200"
                             data-speed="1000"
                             data-start="3000"
                             data-easing="Power4.easeOut"
                             data-endspeed="300"
                             data-endeasing="Power1.easeIn"
                             data-captionhidden="off"
                             style="z-index: 6">
                            Lorem Ipsum is simply dummy text of the printing <br>
                            and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                        </div>

                        <!-- LAYER -->
                        <div class="tp-caption rs-caption-3 sft"
                             data-x="center"
                             data-hoffset="0"
                             data-y="360"
                             data-speed="800"
                             data-start="3500"
                             data-easing="Power4.easeOut"
                             data-endspeed="300"
                             data-endeasing="Power1.easeIn"
                             data-captionhidden="off"
                             style="z-index: 6">
                            <span class="page-scroll">
                                <a href="#category" class="btn btn-circle btn-brd-hover btn-light"><i class="icon-custom icon-lg rounded-2x icon-bg-u fa fa-angle-double-down animated"></i></a>
                            </span>
                        </div>
                    </li>

                    <!-- SLIDE 2 -->
                    <li data-transition="slideup" data-slotamount="5" data-masterspeed="1000" data-title="Slide 2">
                        <!-- MAIN IMAGE -->
                        <img src="{{asset('assets/img/sliders/revolution/bg1.jpg')}}" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">

                        <!-- LAYERS -->
                        <div class="tp-caption rs-caption-1 sft start"
                             data-x="center"
                             data-hoffset="0"
                             data-y="100"
                             data-speed="800"
                             data-start="2000"
                             data-easing="Back.easeInOut"
                             data-endspeed="300">
                            WE ARE ITKAJ COMPANY
                        </div>

                        <!-- LAYER -->
                        <div class="tp-caption rs-caption-2 sft"
                             data-x="center"
                             data-hoffset="0"
                             data-y="200"
                             data-speed="1000"
                             data-start="3000"
                             data-easing="Power4.easeOut"
                             data-endspeed="300"
                             data-endeasing="Power1.easeIn"
                             data-captionhidden="off"
                             style="z-index: 6">
                            Lorem Ipsum is simply dummy text of the printing <br>
                            and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                        </div>

                        <!-- LAYER -->
                        <div class="tp-caption rs-caption-3 sft"
                             data-x="center"
                             data-hoffset="0"
                             data-y="360"
                             data-speed="800"
                             data-start="3500"
                             data-easing="Power4.easeOut"
                             data-endspeed="300"
                             data-endeasing="Power1.easeIn"
                             data-captionhidden="off"
                             style="z-index: 6">
                            <span class="page-scroll">
                                <a href="#category" class="btn btn-circle btn-brd-hover btn-light"><i class="icon-custom icon-lg rounded-2x icon-bg-u fa fa-angle-double-down animated"></i></a>
                            </span>

                        </div>
                    </li>

                    <!-- SLIDE 3 -->
                    <li data-transition="slideup" data-slotamount="5" data-masterspeed="700"  data-title="Slide 3">
                        <!-- MAIN IMAGE -->
                        <img src="{{asset('assets/img/sliders/revolution/bg1.jpg')}}" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">

                        <!-- LAYERS -->
                        <div class="tp-caption rs-caption-1 sft start"
                             data-x="center"
                             data-hoffset="0"
                             data-y="100"
                             data-speed="800"
                             data-start="2000"
                             data-easing="Back.easeInOut"
                             data-endspeed="300">
                            WE ARE ITKAJ COMPANY
                        </div>

                        <!-- LAYER -->
                        <div class="tp-caption rs-caption-2 sft"
                             data-x="center"
                             data-hoffset="0"
                             data-y="200"
                             data-speed="1000"
                             data-start="3000"
                             data-easing="Power4.easeOut"
                             data-endspeed="300"
                             data-endeasing="Power1.easeIn"
                             data-captionhidden="off"
                             style="z-index: 6">
                            Lorem Ipsum is simply dummy text of the printing <br>
                            and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                        </div>

                        <!-- LAYER -->
                        <div class="tp-caption rs-caption-3 sft"
                             data-x="center"
                             data-hoffset="0"
                             data-y="360"
                             data-speed="800"
                             data-start="3500"
                             data-easing="Power4.easeOut"
                             data-endspeed="300"
                             data-endeasing="Power1.easeIn"
                             data-captionhidden="off"
                             style="z-index: 6">
                            <span class="page-scroll">
                                <a href="#category" class="btn btn-circle btn-brd-hover btn-light"><i class="icon-custom icon-lg rounded-2x icon-bg-u fa fa-angle-double-down animated"></i></a>
                            </span>
                        </div>
                    </li>
                </ul>
                <div class="tp-bannertimer tp-bottom"></div>
                <div class="tp-dottedoverlay twoxtwo"></div>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Intro Section -->
    <!--=== Content ===-->
    <div class="container content" id="category">
        <!-- Top Categories -->
        <div class="headline"><h2>Categories</h2></div>
        <div class="row category margin-bottom-20">
        @if($categories != null && $categories != '')
            @foreach ($categories as $category)
                @if($category->is_parent == 1)
                    <!-- Category Blocks -->
                        <div class="col-md-4 col-sm-6">
                            <div class="content-boxes-v3 margin-bottom-10 md-margin-bottom-20">
                                <i class="icon-custom icon-sm rounded-x icon-bg-brown fa fa-desktop"></i>
                                <div class="content-boxes-in-v3">
                                    <h3><a href="#">{{$category->category_name}}</a> <!--<small>(462)</small>--></h3>
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium</p>
                                </div>
                            </div>
                        </div>
                        <!-- Category Blocks -->
                    @endif
                @endforeach
            @endif
        </div>
        <!-- End Top Categories -->
    </div><!--/container-->
    <!--=== End Content ===-->
    <!--=== Container Part ===-->
    <div class="bg-grey">
        <div class="container content-md">
            <div class="headline"><h2>Recent Projects</h2></div>
            <ul class="row list-row margin-bottom-30">
                @if($projects != null && $projects != '')
                    @foreach($projects as $project)
                        <li class="col-md-4 md-margin-bottom-30 md-margin-top-20">
                            <div class="content-boxes-v3 block-grid-v1 rounded">
                                {{--@if($employers != null && $employers != '')--}}
                                {{--@foreach($employers as $employer)--}}
                                {{--@if($project->user_id == $employer->id) <img class="pull-left rounded-x block-grid-v1-img" src="{{$employer->img_path}}" alt="">@endif--}}
                                {{--@endforeach--}}
                                {{--@endif--}}
                                <div class="content-boxes-in-v3">
                                    <h3><a href="{{route('JobDescription', ['job_number' => $project->id])}}">{{$project->name}}</a></h3>
                                    {{--<ul class="star-vote">--}}
                                    {{--<li><i class="fa fa-star"></i></li>--}}
                                    {{--<li><i class="fa fa-star"></i></li>--}}
                                    {{--<li><i class="fa fa-star-half-o"></i></li>--}}
                                    {{--<li><i class="fa fa-star-o"></i></li>--}}
                                    {{--<li><i class="fa fa-star-o"></i></li>--}}
                                    {{--</ul>--}}
                                    <ul class="list-inline margin-bottom-5">
                                        @if($employers != null && $employers != '')
                                            @foreach($employers as $employer)
                                                <li>By <a class="color-green" href="javascript:void(0)">@if($project->user_id == $employer->id){{$employer->fname}} {{$employer->lname}}@endif</a></li>
                                                <li><i class="fa fa-clock-o"></i> {{date("d F Y", strtotime($project->created_at))}}</li>
                                            @endforeach
                                        @endif
                                    </ul>
                                    <p>{{substr($project->description, 0, 100)}}...</p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>
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
    <script type="text/javascript" src="{{asset('assets/plugins/bootstrap-3.3.7/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/bootstrap-3.3.7/js/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/jquery/jquery-migrate.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/bootstrap-3.3.7/js/bootstrap.min.js')}}"></script>

    <!-- JS Implementing Plugins -->

    <script type="text/javascript" src="{{asset('assets/plugins/back-to-top.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/smoothScroll.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/jquery.easing.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/pace/pace.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/sky-forms-pro/skyforms/js/jquery.maskedinput.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/jquery.parallax.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/counter/waypoints.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/counter/jquery.counterup.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/owl-carousel/owl-carousel/owl.carousel.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/sky-forms-pro/skyforms/js/jquery.form.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/cube-portfolio/cubeportfolio/js/jquery.cubeportfolio.min.js ')}}"></script>
    <!-- JS Customization -->
    <script type="text/javascript" src="{{asset('assets/js/custom.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/dropzone.js')}}"></script>
    <!-- JS Page Level -->
    <script type="text/javascript" src="{{asset('assets/js/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/one.app.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/forms/login.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/forms/contact.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/plugins/pace-loader.js')}}"></script>
    {{--<script type="text/javascript" src="{{asset('assets/js/plugins/revolution-slider.js')}}"></script>--}}
    <script type="text/javascript" src="{{asset('assets/js/plugins/cube-portfolio/cube-portfolio-lightbox.js')}}"></script>
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
            LoginForm.initLoginForm();
            ContactForm.initContactForm();
            OwlCarousel.initOwlCarousel();
            StyleSwitcher.initStyleSwitcher();
            OrderForm.initOrderForm();
            ReviewForm.initReviewForm();
            CheckoutForm.initCheckoutForm();
            RevolutionSlider.initRSfullScreen();
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