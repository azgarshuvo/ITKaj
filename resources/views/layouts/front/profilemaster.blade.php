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
<body>
<div class="wrapper">
    @include('layouts.front.header')
    @include('layouts.front.profileleftbar')
    @yield('content')
    @include('layouts.front.footer')
    @include('layouts.front.script')
</div>
</body>
</html>
