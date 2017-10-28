<?php
/**
 * Created by PhpStorm.
 * User: zakariya
 * Date: 05-Oct-17
 * Time: 5:00 PM
 */
$count = 0;
?>
@extends('layouts.front.master')

@section('title', 'Home Page')

@section('content')
    <!--=== Job Img ===-->
    <div class="job-img margin-bottom-30">
        <div class="job-banner">
            <h2>Discover the Employer You would love to Work for ...</h2>
        </div>
    </div>
    <!--=== End Job Img ===-->

    <!--=== Content ===-->
    <div class="container content">
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
@endsection