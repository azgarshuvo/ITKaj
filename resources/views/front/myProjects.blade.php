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
                <div class="col-md-9">
                    <div class="profile-body">
                       
                        @foreach ($job as $job) 
                        <div class="row">
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
                    </div>

                        <hr>    
                        <button type="button" class="btn-u btn-u-default btn-u-sm btn-block">Load More</button>
                    </div>
                </div>
               
@endsection

