<?php
/**
 * Created by PhpStorm.
 * User: shuvo
 * Date: 08-Oct-17
 * Time: 4:33 PM
 */
// dd($user);

?>
@extends('layouts.front.profileMaster')

@section('title', 'Profile')

@section('content')
<!-- Profile Content -->
                <div class="col-md-9">
                    <div class="profile-body">
                        <!--Projects-->
                        @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                        @endif
                       
                        <div class="row">
                        @foreach ($job as $job) 

                            <div class="col-sm-6">
                                 <div class="projects">
                                    <h2><a class="color-dark" href="#">{{$job->name}}</a></h2>
                                    <ul class="list-unstyled list-inline blog-info-v2">
                                       
                                        <li>By: <a class="color-green" href="#">{{$user->fname}} {{$user->lname}}</a></li>

                                        <li><i class="fa fa-clock-o"></i> {{$job->created_at}}</li>
                                    </ul>
                                    <p>{{$job->description}}</p>
                                    <br>
                                </div>
                            </div>

                        @endforeach

                        </div><!--/end row--> 
                        <!--End Projects-->
                        
                        <hr>

                        <button type="button" class="btn-u btn-u-default btn-u-sm btn-block">Load More</button>
                    </div>
                </div>
                <!-- End Profile Content -->                 
@endsection







