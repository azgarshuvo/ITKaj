<?php
/**
 * Created by PhpStorm.
 * User: zakariya
 * Date: 05-Oct-17
 * Time: 4:15 PM
 */
$messages = \App\AdminMessage::all();
$flag = 0;
foreach ($messages as $message){
    if($message->is_live == 1){
        $flag = 1;
    }else if($message->is_live == 0){
        if($flag != 1){
            $flag = 0;
        }
    }
}
?>
<html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    @include('layouts.front.head')
</head>
<body class="header-fixed header-fixed-space">
@if($messages != null && $messages != '')
    @if($flag == 1)
        <marquee id="adminMessage">@foreach($messages as $message) @if($message->is_live == 1){{$message->message}} &nbsp; || &nbsp; &nbsp; @endif @endforeach</marquee>
    @endif
@endif

<div id="loader"></div>
<div class="wrapper">

    @include('layouts.front.header')
    <div class="container content profile">



        <div class="row">
            @include('layouts.front.profileLeftBar')
            @yield('content')
        </div>
    </div>
    @include('layouts.front.footer')
    @include('layouts.front.script')
    @include('messaging.chatPopUp')
    @yield('script')
    {{--<div class="load">

        <img style="display: block" src="{{asset('assets/loading.gif')}}">
    </div>--}}

</div>
</body>
</html>
