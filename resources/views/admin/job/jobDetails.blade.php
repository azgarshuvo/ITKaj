<?php
/**
 * Created by PhpStorm.
 * User: Shuvo
 * Date: 10/18/2017
 * Time: 10:56 AM
 */
?>

@extends('layouts.admin.master')

@section('title', 'Edit Job')

@section('content')

    <div class="wrapper wrapper-content">
        <div class="row animated fadeInRight">
            <div class="col-md-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Job Detail</h5>
                    </div>
                    <div>
                        <div class="ibox-content no-padding border-left-right">
                            <img alt="image" class="img-responsive" src="'img/profile_big.jpg'">
                        </div>
                        <div class="ibox-content profile-content">
                            <h4><strong>{{$details->name}}</strong></h4>
                            <p><i class="fa fa-map-marker"></i> category and subcategory <p>
                            <h5>Description</h5>
                            <p>{{$details->description}}</p>
                            <h5>Skills</h5>
                            <p>{{$details->skill_needed}}</p>

                            <div class="row m-t-lg">
                                <div class="col-md-4">

                                    <h5><strong>Project cost </strong> {{$details->project_cost}} </h5>
                                </div>
                                <div class="col-md-4">

                                    <h5><strong>Duration</strong>{{$details->project_time}}</h5>
                                </div>
                                <div class="col-md-4">

                                    <h5><strong>Project Type </strong> {{$details->type}} </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                        <div class="ibox-title">
                            <h5>Freelancer List</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>SL No.</th>
                                    <th>Freelancer ID</th>
                                    <th>Name</th>
                                    <th>status</th>
                                    <th>Skills</th>
                                    <th>Experience Level</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php  $count = 1; ?>
                                    @foreach($selectedList as $list)
                                        @foreach($freelancerProfile as $profile)
                                     <tr class="gradeX">
                                        <td>{{$count++}}</td>
                                        <td>{{$list->freelancer_id}}</td>
                                        <td>{{$list->fname}}{{$list->lname}}</td>
                                        <td>{{$list->status}}</td>
                                        <td>{{$profile->skills}}</td>
                                        <td>{{$profile->experience_lavel}}</td>
                                        <td class="center">
                                            <a class="btn btn-sm btn-info" href="#" data-toggle="tooltip" data-placement="left" title="Job Details"><i class="fa fa-eye"></i></a>

                                        </td>
                                    </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>

        </div>



@endsection
