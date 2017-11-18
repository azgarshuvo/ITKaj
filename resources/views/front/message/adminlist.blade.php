<?php
/**
 * Created by PhpStorm.
 * User: Polash
 * Date: 01-Nov-17
 * Time: 11:58 AM
 */

?>
@extends('layouts.front.master')

@section('title', 'Message')

@section('content')
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Message</h1>
            <p class="message_show pull-right"></p>
        </div><!--/container-->
    </div><!--/breadcrumbs-->

    <div class="container content-sm">
        <div class="col-md-6 col-md-offset-3">
            <div class="headline-v2"><h2>Admin List</h2></div>
            @if($unreadConversion->count()>0)
                <?php $admin =array(); ?>
                <ul class="list-unstyled blog-trending margin-bottom-50">
                    @foreach($unreadConversion as $conversion)
                        @if(!in_array($conversion->getAdmin->id,$admin))
                        <?php array_push($admin,$conversion->getAdmin->id) ;?>

                        <li class="sender_p active-li">
                            <h3>
                                <a href="javascript:void(0);" class="addClass" onclick="getMessage({{$conversion->getAdmin->id}})">
                                    {{$conversion->getAdmin->fname}} {{$conversion->getAdmin->lname}}
                                    <span class="badge badge-dark rounded">{{$conversion->UserUnreadMessage->count()}}</span>
                                </a>
                                @if($conversion->UserUnreadMessage->count()>0)
                                    <span class="pull-right">{{$conversion->UserUnreadMessage[0]->time}}</span>
                                @endif
                            </h3>
                            {{-- <small>23 Jan, 2015</small>--}}
                        </li>
                        @endif
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection
<input type="hidden" value="{{route('getMessage')}}" id="messageGetURL">
@section('script')
    <script>
        function getMessage(adminId){
            $('.qnimate').addClass('popup-box-on');
            var URL = $('#messageGetURL').val();
            $.ajax({
                method: "GET",
                url: URL,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {adminId:adminId},
                success: function(data){
                    $('#qnimate').html(data);
//                   console.log(data);
                }
            });
        }

    </script>
@endsection
