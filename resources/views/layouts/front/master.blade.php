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
    @include('layouts.front.head')
</head>
<body class="header-fixed header-fixed-space">
<div class="wrapper">
    @include('layouts.front.header')
    @yield('content')
    @include('layouts.front.footer')
    @include('layouts.front.script')
    @yield('script')
</div>
</body>
</html>
