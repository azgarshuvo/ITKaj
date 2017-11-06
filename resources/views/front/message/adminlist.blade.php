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
            @if($adminList->count()>0)
                <ul class="list-unstyled blog-trending margin-bottom-50">
                    @foreach($adminList as $admin)
                        <li class="sender_p active-li">
                            <h3><a href="{{route('getMessage',['adminId'=>$admin->id])}}">{{$admin->fname}} {{$admin->lname}}</a></h3>
                            {{-- <small>23 Jan, 2015</small>--}}
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

    </div>
@endsection

