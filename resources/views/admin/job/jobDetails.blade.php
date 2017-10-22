<?php
/**
 * Created by PhpStorm.
 * User: Shuvo
 * Date: 10/18/2017
 * Time: 10:56 AM
 */
//dd($selectedForJob);
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

                        </div>

                        <div class="ibox-content profile-content">
                            <h4><strong>{{$jobDetails->name}}</strong></h4>
                            <h5>Category and Subcategory</h5>
                            @foreach($category as $cat)
                            <p> {{$cat->category_name}} <p>
                            @endforeach
                            <h5>Description</h5>
                            <p>{{$jobDetails->description}}</p>
                            <h5>Skills</h5>
                            <p>
                                @foreach(json_decode($jobDetails->skill_needed) as $skill)
                                    {{$skill}}
                                @endforeach
                            </p>

                            <div class="row m-t-lg">
                                <div class="col-md-4">

                                    <h5><strong>Project cost: </strong> {{$jobDetails->project_cost}} </h5>
                                </div>
                                <div class="col-md-4">

                                    <h5><strong>Duration:</strong>@if($jobDetails->project_time == 1)More than 1 month @elseif($jobDetails->project_time == 2) Less than 1 month @else I don't know @endif</h5>
                                </div>
                                <div class="col-md-4">

                                    <h5><strong>Project Type: </strong> @if($jobDetails->type == 1)One time Project @elseif($jobDetails->type == 2) Ongoing @else I don't know @endif </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{--<div class="col-md-8" id="added_list">--}}
                    {{--<h3>Added Freelancer List</h3>--}}
            {{--</div>--}}


            <div class="col-md-8">
                <div class="ibox-title">
                    <h5>Added Freelancer By Employeer</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table table-striped table-bordered table-hover ">
                        <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="rowBody">
                        <?php  $count = 1; ?>

                                <tr class="gradeX">
                                    <td>{{$count++}}</td>
                                    <td></td>
                                    <td class="center">
                                    </td>
                                </tr>

                        </tbody>
                    </table>
                </div>
            </div>


            <div class="col-md-8">
                        <div class="ibox-title">
                            <h5>Selected Freelancer By Employeer</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <table class="table table-striped table-bordered table-hover " >
                                <thead>
                                <tr>
                                    <th>SL No.</th>
                                    <th>Name</th>
                                    <th>Skills</th>
                                    <th>Experience Level</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php  $count = 1; ?>
                                    @foreach($selectedForJob as $select)
                                        @if($select->profile != null || $select->profile != '')
                                             <tr class="gradeX removeData{{$select->id}}">
                                                <td>{{$count++}}</td>
                                                <td class="name{{$select->id}}">{{$select->fname}}{{$select->lname}}</td>
                                                <td >{{$select->profile->skills}}</td>
                                                <td>{{$select->profile->experience_level}}</td>
                                                <td class="center">
                                                    <a class="btn btn-sm btn-info" href="#" data-toggle="tooltip" data-placement="left" title="Job Details"><i class="fa fa-eye"></i></a>
                                                    <button onclick="getSelectedFreelancer({{$select->id}})" type="button" class="btn btn-sm btn-info" name="addButton"><i class="fa fa-plus"></i> Add</button>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>

            {{--Total Freelancer List--}}
                <div class="col-md-12">
                    <div class="ibox-title">
                        <h5>Freelancer List</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <table class="table table-striped table-bordered table-hover " >
                            <thead>
                            <tr>
                                <th>SL No.</th>
                                <th>Name</th>
                                <th>Skills</th>
                                <th>Experience Level</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php  $count = 1; ?>
                            @foreach($freelancerList as $list)
                                @if($list->profile != null || $list->profile != '')
                                    <tr class="gradeX">
                                        <td>{{$count++}}</td>
                                        <td>{{$list->fname}}{{$list->lname}}</td>
                                        <td>{{$list->profile->skills}}</td>
                                        <td>{{$list->profile->experience_level}}</td>
                                        <td class="center">
                                            <a class="btn btn-sm btn-info" href="#" data-toggle="tooltip" data-placement="left" title="Job Details"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    <script type="text/javascript">
        function getSelectedFreelancer(id){
            var name = $(".name"+id).text();
            var updateName = name.trim();
            var row = '<tr>' +
                        '<td></td>' +
                        '<td>'+updateName+'</td>' +
                        '<td><a class="btn btn-sm btn-info" href="#" data-toggle="tooltip" data-placement="left" title="Job Details"><i class="fa fa-eye"></i></a>\n' +
                '                                        <a class="btn btn-sm btn-danger" href="#"  data-toggle="tooltip" title="Freelancer Delete"><i class="fa fa-times" ></i></a></td>' +
                    '</tr>';
            $(".rowBody").html(row);

            $(".removeData"+id).toggle();

        }
    </script>
@endsection
