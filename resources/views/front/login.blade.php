<?php
/**
 * Created by PhpStorm.
 * User: zakariya
 * Date: 07-Oct-17
 * Time: 6:05 PM
 */
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <title>ItKaj - Login</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="javascript:void(0);">

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/one.style.css')}}">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{asset('assets/plugins/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/line-icons/line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/font-awesome/css/font-awesome.min.css')}}">

    <!-- CSS Page Style -->
    <link rel="stylesheet" href="{{asset('assets/css/pages/page_log_reg_v2.css')}}">

    <!-- CSS Theme -->
    <link rel="stylesheet" href="{{asset('assets/css/theme-colors/default.css')}}" id="style_color">
    <link rel="stylesheet" href="{{asset('assets/css/theme-skins/dark.css')}}">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body class="demo-lightbox-gallery" id="body" data-spy="scroll" data-target=".one-page-header">
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
<!--=== Content Part ===-->
<div class="container">
    <!--Reg Block-->
    <div class="reg-block md-margin-top-100">
        <div class="reg-block-header">
            <h2>Sign In</h2>
            {{--for social network login--}}
            {{--<ul class="social-icons text-center">--}}
                {{--<li><a class="rounded-x social_facebook" data-original-title="Facebook" href="#"></a></li>--}}
                {{--<li><a class="rounded-x social_twitter" data-original-title="Twitter" href="#"></a></li>--}}
                {{--<li><a class="rounded-x social_googleplus" data-original-title="Google Plus" href="#"></a></li>--}}
                {{--<li><a class="rounded-x social_linkedin" data-original-title="Linkedin" href="#"></a></li>--}}
            {{--</ul>--}}
            <p>Don't Have Account? Click <a class="color-green" href="{{route('registration')}}">Sign Up</a> to registration.</p>
        </div>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{route('postLogin')}}" class="reg-page">
            {{csrf_field()}}
            <div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input name="username" type="text" placeholder="Username / Email" class="form-control">
            </div>

            <div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input name="password" type="password" placeholder="Password" class="form-control">
            </div>
            <hr>

            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember">
                    <p>Always stay signed in</p>
                </label>
            </div>

            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <button type="submit" class="btn-u btn-block">Log In</button>
                </div>
            </div>
        </form>
    </div>
    <!--End Reg Block-->
</div><!--/container-->
<!--=== End Content Part ===-->

<!-- JS Global Compulsory -->
<script type="text/javascript" src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/jquery/jquery-migrate.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="{{asset('assets/plugins/back-to-top.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/backstretch/jquery.backstretch.min.js')}}"></script>
<!-- JS Customization -->
<script type="text/javascript" src="{{asset('assets/js/custom.js')}}"></script>
<!-- JS Page Level -->
<script type="text/javascript" src="{{asset('assets/js/app.js')}}"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
    });
</script>
<script type="text/javascript">
    $.backstretch([
        "{{asset('assets/img/bg/11.jpg')}}",
        "{{asset('assets/img/bg/3.jpg')}}",
    ], {
        fade: 1000,
        duration: 7000
    });
</script>
<!--[if lt IE 9]>
<script src="{{asset('assets/plugins/respond.js')}}"></script>
<script src="{{asset('assets/plugins/html5shiv.js')}}"></script>
<script src="{{asset('assets/plugins/placeholder-IE-fixes.js')}}"></script>
<![endif]-->

</body>
</html>
