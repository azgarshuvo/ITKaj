<?php
/**
 * Created by PhpStorm.
 * User: zakariya
 * Date: 06-Nov-17
 * Time: 12:54 PM
 */
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <title>ItKaj - Coming Soon</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="javascript:void(0);">

    <!-- CSS Global Compulsory-->
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{asset('assets/plugins/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/line-icons/line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/font-awesome/css/font-awesome.css')}}">

    <!-- CSS Page Style -->
    <link rel="stylesheet" href="{{asset('assets/css/pages/page_coming_soon.css')}}">

    <!-- CSS Theme -->
    <link rel="stylesheet" href="{{asset('assets/css/theme-colors/default.css')}}" id="style_color">
</head>

<body class="coming-soon-page">
<div class="coming-soon-border"></div>
<div class="coming-soon-bg-cover"></div>

<!--=== Content Part ===-->
<div class="container cooming-soon-content valign__middle">
    <!-- Coming Soon Content -->
    <div class="row">
        <div class="col-md-12 coming-soon">
            <h1>Coming Soon</h1>
            <p>Dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi vehicula sem ut volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus.</p><br>
        </div>
    </div>

    <!-- Coming Soon Plugn -->
    <div class="coming-soon-plugin" style="height: 200px;">
        <div id="defaultCountdown"></div>
    </div>
</div><!--/container-->
<!--=== End Content Part ===-->

<!--=== Sticky Footer ===-->
<div class="sticky-footer">
    <p class="copyright-space">
        2017 &copy; ITKAJ. ALL Rights Reserved.
    </p>
</div>
<!--=== End Sticky-Footer ===-->

<!-- JS Global Compulsory -->
<script type="text/javascript" src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/jquery/jquery-migrate.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="{{asset('assets/plugins/back-to-top.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/smoothScroll.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/countdown/jquery.plugin.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/countdown/jquery.countdown.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/backstretch/jquery.backstretch.min.js')}}"></script>
<!-- JS Customization -->
<script type="text/javascript" src="{{asset('assets/js/custom.js')}}"></script>
<!-- JS Page Level -->
<script type="text/javascript" src="{{asset('assets/js/app.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/pages/page_coming_soon.js')}}"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
        PageComingSoon.initPageComingSoon();
    });
</script>

<!-- Background Slider (Backstretch) -->
<script>
    $.backstretch([
        "{{asset('assets/img/bg/14.jpg')}}",
        "{{asset('assets/img/bg/17.jpg')}}",
        "{{asset('assets/img/bg/2.jpg')}}"
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


