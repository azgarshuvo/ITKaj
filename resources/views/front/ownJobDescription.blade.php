<?php
/**
 * Created by PhpStorm.
 * User: shuvo
 * Date: 07-Oct-17
 * Time: 12:54 PM
 */
//dd(strlen($jobDetails->job_attachment));
?>
@extends('layouts.front.master')

@section('title', 'Registration')

@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Job Description</h1>

        </div>
    </div>

    <!--=== Job Description ===-->
    <div class="job-description">
        <div class="container content">
            <div class="title-box-v2">
                <h2>Job Information</h2>
                <h3>{{$jobDetails->name}}</h3>
            </div>
            <div class="row">
                <!-- Left Inner -->
                <div class="col-md-7">
                    <div class="left-inner">


                        <h2>Job Description</h2>
                        <p>
                            {{$jobDetails->description}}
                        </p>

                        <hr>

                        <h2>Skill Needed</h2>
                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis varius hendrerit nisl id condimentum. Sed bibendum ultricies erat a vulputate. Curabitur id ultricies eros, at ultricies dui.</p>--}}
                        <ul class="list-unstyled">
                            {{--  //json_encode($jobDetails->skill_needed)--}}
                            @foreach(json_decode($jobDetails->skill_needed, true) as $value)
                                <li><i class="fa fa-check color-green"></i> {{ ucfirst($value)}} </li>
                            @endforeach
                        </ul>

                        <hr>

                        <h2>Project Cost</h2>
                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis varius hendrerit nisl id condimentum. Sed bibendum ultricies erat a vulputate. Curabitur id ultricies eros, at ultricies dui.</p>--}}
                        <h4 class="">Tk. {{$jobDetails->project_cost}}/=</h4>

                        <hr>
                        <h2>Attachment</h2>
                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis varius hendrerit nisl id condimentum. Sed bibendum ultricies erat a vulputate. Curabitur id ultricies eros, at ultricies dui.</p>--}}
                        <ul class="list-unstyled">
                            {{--  //json_encode($jobDetails->skill_needed)--}}
                            <?php $i=1; ?>
                            @foreach(json_decode($jobDetails->job_attachment, false) as $value)

                                <li><i class="fa fa-check color-green"></i> <a href="{{ route('attachmentDownload',['attachment'=>$value]) }}" target="_blank">Attachment no . {{$i++}} </a></li>
                            @endforeach
                        </ul>

                        {{--
                        <h2>Responsibility</h2>
                        <p>A Wal-Mart cashier is responsible for effectively executing and adhering to the “Basic Beliefs” of the founder, Sam Walton.</p>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-check color-green"></i> Nullam laoreet est sit amet felis tristique laoreet</li>
                            <li><i class="fa fa-check color-green"></i> The biggest problem was unreasonable expectations from management</li>
                            <li><i class="fa fa-check color-green"></i> Dealing with the customers was the other issue</li>
                        </ul>

                        <hr>

                        <h2>What We Offer</h2>
                        <p>Vestibulum justo est, pharetra fermentum justo in, tincidunt mollis turpis. Duis imperdiet non justo euismod semper. Nullam laoreet est sit amet felis tristique laoreet. Duis interdum laoreet enim, at adipiscing velit viverra id.</p>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-check color-green"></i> Nullam laoreet est sit amet felis tristique laoreet</li>
                            <li><i class="fa fa-check color-green"></i> The biggest problem was unreasonable expectations from management</li>
                            <li><i class="fa fa-check color-green"></i> Dealing with the customers was the other issue</li>
                        </ul>--}}
                    </div>
                </div>
                <!-- End Left Inner -->

                <!-- Right Inner -->
                <div class="col-md-5">
                    <div class="right-inner text-center">
                        @if($userInfo)
                        <h3>Assign To</h3>
                        {{--<img class="img-bordered img-center img-hover img img-responsive img-thumbnail job-owner" src="{{asset('assets/img/team/img32-md.jpg')}}" alt="Clint Img">--}}

                        @if($userInfo->profile)

                            <img id="image-profile" class="img-responsive md-margin-bottom-10 img img-thumbnail img-bordered profile-imge" @if(strlen($userInfo->profile->img_path)>3)  src="{{asset('profile_img/'.$userInfo->profile->img_path)}}" @else src="{{asset('assets/img/team/img32-md.jpg')}}" @endif alt="">
                        @else
                            <img id="image-profile" class="img-responsive md-margin-bottom-10 img img-thumbnail img-bordered profile-imge" src="{{asset('assets/img/team/img32-md.jpg')}}" alt="">
                        @endif
                        <div class="overflow-h">
                            <span class="font-s">{{$userInfo->fname." ".$userInfo->lname}}</span>

                        </div>

                        <hr>

                    </div>
                    <a href="{{route('setupMilestone',['jobid'=>$jobDetails->id])}}">
                        <button type="button" class="btn-u btn-block"> See or Setup Milestone</button>
                    </a>
                    @else
                         <h3 class="text-danger text-bold">Freelancer doesn't assign by Admin</h3>
                    @endif
                </div>
            </div>
            <!-- End Right Inner -->
        </div>
    </div>
    </div>
    <!--=== End Job Description ===-->

@endsection

