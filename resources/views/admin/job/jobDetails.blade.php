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

                        </div>

                        <div class="ibox-content profile-content">
                            <h4><strong>{{$jobDetails->name}}</strong></h4>
                            <input type="hidden" value="{{$jobDetails->id}}" id="jobId">
                            <div class="row m-t-lg">

                                <div class="col-md-12">
                                    <h5><strong>Category and Subcategory:  </strong>
                                        @foreach($category as $cat)
                                            {{$cat->category_name}}
                                        @endforeach
                                    </h5>
                                </div>

                                <div class="col-md-12">
                                    <h5><strong>Description: </strong>
                                        {{$jobDetails->description}}
                                    </h5>
                                </div>

                                <div class="col-md-12">
                                    <h5><strong>Skills: </strong>
                                            @foreach(json_decode($jobDetails->skill_needed) as $skill)
                                                {{$skill}}
                                            @endforeach
                                        </h5>
                                </div>

                                <div class="col-md-12">

                                    <h5><strong>Project cost: </strong> {{$jobDetails->project_cost}} </h5>
                                </div>

                                <div class="col-md-12">

                                    <h5><strong>Duration: </strong>@if($jobDetails->project_time == 1)More than 1 month @elseif($jobDetails->project_time == 2) Less than 1 month @else I don't know @endif</h5>
                                </div>

                                <div class="col-md-12">

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
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ Session::get('success') }}
                </div>
            @endif
            </div>

            <div class="col-md-8" id="alert" hidden="hidden">
                    <div class="alert alert-danger" role="alert">
                        <span aria-hidden="true"></span>
                        <h4>Can not Add Freelancer More than One</h4>
                    </div>
            </div>

            <div class="col-md-8">
                <div class="ibox-title">
                    <h5>Freelancer Selected for Job</h5>
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
                            <th>Name</th>
                            <th>Skills</th>
                            <th>Experience Level</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="rowBody" id="tableRow">
                        @foreach($selectedForJob as $select)
                            @if($select->id == $jobDetails->selected_for_job)
                            @if($select->profile != null || $select->profile != '')
                                <tr class="gradeX removeData{{$select->id}}">
                                    <td class="name{{$select->id}}">{{$select->fname}}{{$select->lname}}</td>
                                    <td class="skills{{$select->id}}">{{$select->profile->skills}}</td>
                                    <td class="experience_level{{$select->id}}">@if($select->profile->experience_level == 1) Beginner @elseif($select->profile->experience_level == 2)Intermediate Level @else Expert Level @endif</td>
                                    <td class="center">
                                        <a class="btn btn-sm btn-info" href="#" data-toggle="tooltip" data-placement="left" title="Job Details"><i class="fa fa-eye"></i></a>
                                        <a onclick="return confirm('Are you sure to delete?')" class="btn btn-sm btn-danger" href="#"  data-toggle="tooltip" title="Job Delete"><i class="fa fa-times" ></i></a>
                                    </td>
                                </tr>
                                @endif
                            @endif
                        @endforeach
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
                                        @if($select->id != $jobDetails->selected_for_job)
                                            @if($select->profile != null && $select->profile != '')
                                             <tr class="gradeX removeData{{$select->id}}">
                                                <td>{{$count++}}</td>
                                                <td class="name{{$select->id}}">{{$select->fname}}{{$select->lname}}</td>
                                                <td class="skills{{$select->id}}">{{$select->profile->skills}}</td>
                                                <td class="experience_level{{$select->id}}">@if($select->profile->experience_level == 1) Beginner @elseif($select->profile->experience_level == 2)Intermediate Level @else Expert Level @endif</td>
                                                <td class="center">
                                                    <a class="btn btn-sm btn-info" href="#" data-toggle="tooltip" data-placement="left" title="Job Details"><i class="fa fa-eye"></i></a>
                                                    {{--<button onclick="getSelectedFreelancer({{$select->id}})" type="button" class="btn btn-sm btn-info" name="addButton"><i class="fa fa-plus"></i> Add</button>--}}
                                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#firstModal">
                                                        Add
                                                    </button>
                                                </td>
                                            </tr>
                                             @endif
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
                                @if($list->id != $jobDetails->selected_for_job)
                                    @if($list->profile != null || $list->profile != '')
                                    <tr class="gradeX removeRow{{$list->id}}">
                                        <td>{{$count++}}</td>
                                        <td class="names{{$list->id}}">{{$list->fname}}{{$list->lname}}</td>
                                        <td class="skillss{{$list->id}}">{{$list->profile->skills}}</td>
                                        <td class="experience_levelss{{$list->id}}">@if($list->profile->experience_level == 1) Beginner @elseif($list->profile->experience_level == 2)Intermediate Level @else Expert Level @endif</td>
                                        <td class="center">
                                            <a class="btn btn-sm btn-info" href="#" data-toggle="tooltip" data-placement="left" title="Job Details"><i class="fa fa-eye"></i></a>
                                            {{--<button onclick="getFreelancer({{$list->id}})" type="button" class="btn btn-sm btn-info" name="addButton"><i class="fa fa-plus"></i> Add</button>--}}
                                            <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#secondModal">
                                                Add
                                            </button>
                                        </td>
                                    </tr>
                                     @endif
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            {{--First Modal Start Here--}}
            <div class="modal inmodal fade" id="firstModal" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title">Freelancer Select</h4>
                        </div>
                        <div class="modal-body">
                            <div class="ibox-content">

                                <div class="form-group">
                                    <label class="font-noraml">Contact Details</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group" id="data_2">
                                    <label class="font-noraml">One Year view</label>
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="08/25/2014">
                                    </div>
                                </div>

                                <div class="form-group" id="data_3">
                                    <label class="font-noraml">Decade view</label>
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="10/11/2013">
                                    </div>
                                </div>
                                {{--<div class="form-group" id="data_5">--}}
                                    {{--<label class="font-noraml">Range select</label>--}}
                                    {{--<div class="input-daterange input-group" id="datepicker">--}}
                                        {{--<input type="text" class="input-sm form-control" name="start" value="05/14/2014"/>--}}
                                        {{--<span class="input-group-addon">to</span>--}}
                                        {{--<input type="text" class="input-sm form-control" name="end" value="05/22/2014" />--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                            <button onclick="getSelectedFreelancer({{$select->id}})" type="button" class="btn btn-sm btn-info" name="addButton"><i class="fa fa-plus"></i> Add</button>
                        </div>
                    </div>
                </div>
            </div>
            {{--First Modal End Here--}}
            {{--Second Modal Start Here--}}
            <div class="modal inmodal fade" id="secondModal" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title">Freelancer Select</h4>
                        </div>
                        <div class="modal-body">
                            <div class="ibox-content">

                                <div class="form-group">
                                    <label class="font-noraml">Contact Details</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group" id="data_2">
                                    <label class="font-noraml">One Year view</label>
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="08/25/2014">
                                    </div>
                                </div>

                                <div class="form-group" id="data_3">
                                    <label class="font-noraml">Decade view</label>
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="10/11/2013">
                                    </div>
                                </div>
                                {{--<div class="form-group" id="data_5">--}}
                                {{--<label class="font-noraml">Range select</label>--}}
                                {{--<div class="input-daterange input-group" id="datepicker">--}}
                                {{--<input type="text" class="input-sm form-control" name="start" value="05/14/2014"/>--}}
                                {{--<span class="input-group-addon">to</span>--}}
                                {{--<input type="text" class="input-sm form-control" name="end" value="05/22/2014" />--}}
                                {{--</div>--}}
                                {{--</div>--}}
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            {{--Second Modal End Here--}}

            </div>
        </div>
    <script type="text/javascript">
        function getSelectedFreelancer(id){

            var x = document.getElementById("tableRow").rows.length;
//            alert("Number of rows in the table is " + x);

            var jobID = $("#jobId").val();
            var name = $(".name"+id).text();
            var updateName = name.trim();
            var skills = $(".skills"+id).text();
            var experience_level = $(".experience_level"+id).text();
            var row = '<tr>' +
                        '<td>'+updateName+'</td>' +
                        '<td>'+skills+'</td>' +
                        '<td>'+experience_level+'</td>' +
                        '<td><a class="btn btn-sm btn-info" href="#" data-toggle="tooltip" data-placement="left" title="Job Details"><i class="fa fa-eye"></i></a>\n' +
                '                                        <a class="btn btn-sm btn-danger" href="#"  data-toggle="tooltip" title="Freelancer Delete"><i class="fa fa-times" ></i></a></td>' +
                    '</tr>';

            if(x == 0){
                $(".rowBody").html(row);
                $(".removeData"+id).toggle();
            }
            else{
                $("#alert").show();
            }





            $.post("{{route('freelancerAssign')}}",
                {
                    _token: '{{csrf_token()}}',
                    id: id,
                    jobID: jobID
                },

                function(data) {
                });

        }

        function getFreelancer(id){
            var y = document.getElementById("tableRow").rows.length;
            var jobID = $("#jobId").val();
            var name = $(".names"+id).text();
            var updatedName = name.trim();
            var skill = $(".skillss"+id).text();
            var experience_level = $(".experience_levelss"+id).text();
            var row ='<tr>' +
                        '<td>'+updatedName+'</td>'+
                        '<td>'+skill+'</td>'+
                        '<td>'+experience_level+'</td>'+
                '<td><a class="btn btn-sm btn-info" href="#" data-toggle="tooltip" data-placement="left" title="Job Details"><i class="fa fa-eye"></i></a>\n' +
                '                                        <a class="btn btn-sm btn-danger" href="#"  data-toggle="tooltip" title="Freelancer Delete"><i class="fa fa-times" ></i></a></td>' +
                '</tr>';
            if(y == 0){
                $(".rowBody").html(row);
                $(".removeRow"+id).toggle();
            }
            else{
                $("#alert").show();
            }

            $.post("{{route('freelancerListAssign')}}",
                {
                    _token: '{{csrf_token()}}',
                    id: id,
                    jobID: jobID
                },

                function(data, status) {
                });


        }
    </script>
@endsection
