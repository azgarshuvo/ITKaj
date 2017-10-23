<?php
/**
 * Created by PhpStorm.
 * User: shuvo
 * Date: 07-Oct-17
 * Time: 12:54 PM
 */
?>
@extends('layouts.front.master')

@section('title', 'Registration')

@section('content')

        <div class="breadcrumbs">
            <div class="container">
                <h1 class="pull-left">Job Description</h1>
                
            </div>
        </div>
        <div class="container text-center">
        @if(session()->has('message'))
            <p class="alert alert-success">
                {{ session()->get('message') }}
            </p>
        @endif
        @if (count($errors) > 0)
            <p class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br/>
                @endforeach
            </p>
        @endif
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
                            @if($skills)
                            <h2>Skill Needed</h2>
                            {{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis varius hendrerit nisl id condimentum. Sed bibendum ultricies erat a vulputate. Curabitur id ultricies eros, at ultricies dui.</p>--}}
                            <ul class="list-unstyled">
                               {{--  //json_encode($jobDetails->skill_needed)--}}
                                @foreach($skills as $value)
                                    <li><i class="fa fa-check color-green"></i> {{ ucfirst($value->name)}} </li>
                                @endforeach
                            </ul>

                            <hr>
                            @endif
                            <h2>Project Cost</h2>
                            {{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis varius hendrerit nisl id condimentum. Sed bibendum ultricies erat a vulputate. Curabitur id ultricies eros, at ultricies dui.</p>--}}
                            <h4 class="">Tk. {{$jobDetails->project_cost}}/=</h4>

                            <hr>
                            <h2>Attachment</h2>
                            {{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis varius hendrerit nisl id condimentum. Sed bibendum ultricies erat a vulputate. Curabitur id ultricies eros, at ultricies dui.</p>--}}
                            <ul class="list-unstyled">
                                {{--  //json_encode($jobDetails->skill_needed)--}}
                                <?php $i=1; ?>
                                @if($jobDetails->job_attachment)
                                @foreach(json_decode($jobDetails->job_attachment, true) as $value)

                                    <li><i class="fa fa-check color-green"></i> <a href="{{ route('attachmentDownload',['attachment'=>$value]) }}" target="_blank">Attachment no . {{$i++}} </a></li>
                                @endforeach
                                @else
                                    <div class="alert alert-success">
                                        No Attachment Found
                                    </div>
                                @endif
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
                            <h3>Posted by</h3>
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
                            @if($jobDetails->selected_for_job!=null||$jobDetails->selected_for_job>0)
                                @if($jobDetails->selected_for_job==Auth::user()->id)
                                    <h5 class="text-center col-md-offset-1 alert alert-success">You are selected for this job</h5>
                                @else
                                    <h5 class="text-center col-md-offset-1 alert alert-success">Freelancer already selected for this job</h5>
                                @endif
                            @else
                                <button data-toggle="modal" data-target="#responsive" type="button" class="btn-u btn-block"> Apply with Resume</button>
                            @endif
                        <div class="modal fade" id="responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel4">Apply form</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <form action="{{route('freelancerJobApply')}}" enctype="multipart/form-data" method="post" id="sky-form5" class="sky-form">
                                                {{csrf_field()}}
                                              <fieldset>
                                                    <div class="row">
                                                        <section class="col col-6">
                                                            <label class="label">Project Duration (Days)</label>
                                                            <label class="input">
                                                                <input name="projectDuration" type="text">
                                                                <input type="hidden" name="job_id" value="{{$jobDetails->id}}">
                                                            </label>
                                                        </section>
                                                        <section class="col col-6">
                                                            <label class="label">Project Cost</label>
                                                            <label class="input">
                                                                <input name="projectCost" type="text">
                                                            </label>
                                                        </section>

                                                    </div>

                                                    <section>
                                                        <label class="label">Comment</label>
                                                        <label class="textarea">
                                                            <textarea rows="4" name="comment"></textarea>
                                                        </label>
                                                    </section>
                                                  <section>
                                                      <label class="label">Attachment</label>
                                                      <label class="textarea">
                                                          <input class="form-control" name="file[]" type="file"  multiple />
                                                      </label>
                                                  </section>
                                                </fieldset>


                                    <div class="modal-footer">
                                        <button type="submit" class="btn-u btn-u-primary">Save changes</button>

                                    </div>
                                            </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Right Inner -->
                </div>
            </div>
        </div>
        <!--=== End Job Description ===-->    

@endsection

