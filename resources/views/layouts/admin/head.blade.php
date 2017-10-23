Z<?php
/**
 * Created by PhpStorm.
 * User: zakariya
 * Date: 09-Oct-17
 * Time: 2:22 PM
 */
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Admin | @yield('title')</title>

<link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('admin/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
{{--<link href="{{asset('admin/css/plugins/iCheck/custom.css')}}" rel="stylesheet">--}}
{{--<link href="{{asset('admin/css/plugins/chosen/chosen.css')}}" rel="stylesheet">--}}
{{--<link href="{{asset('admin/css/plugins/colorpicker/bootstrap-colorpicker.min.css')}}" rel="stylesheet">--}}

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
{{--<link href="{{asset('admin/<link href="css/plugins/switchery/switchery.css" rel="stylesheet">')}}" rel="stylesheet">--}}
{{--<link href="{{asset('admin/css/plugins/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">--}}
{{--<link href="{{asset('admin/css/plugins/nouslider/jquery.nouislider.css')}}" rel="stylesheet">--}}
<link href="{{asset('admin/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
{{--<link href="{{asset('admin/css/plugins/ionRangeSlider/ion.rangeSlider.css')}}" rel="stylesheet">--}}
{{--<link href="{{asset('admin/css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">--}}

