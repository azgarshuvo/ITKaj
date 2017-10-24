<?php
/**
 * Created by PhpStorm.
 * User: zakariya
 * Date: 09-Oct-17
 * Time: 2:17 PM
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | @yield('title')</title>

    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <!-- Morris -->
    <link href="{{asset('admin/css/plugins/morris/morris-0.4.3.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/pages/shortcode_timeline2.css')}}">
    <link href="{{asset('admin/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">

    <!-- Data Tables -->
    <link href="{{asset('admin/css/plugins/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/plugins/dataTables/dataTables.responsive.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/plugins/dataTables/dataTables.tableTools.min.css')}}" rel="stylesheet">

    <!-- cropper -->
    <link href="{{asset('admin/css/plugins/cropper/cropper.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
</head>
<body>
<div id="wrapper">
    @include('layouts.admin.navBar')
    <div id="page-wrapper" class="gray-bg">
        @include('layouts.admin.topNavBar')
        @yield('content')
        @include('layouts.admin.footer')
    </div>
</div>
    @include('layouts.admin.script')
</body>
</html>

