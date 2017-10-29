<?php
/**
 * Created by PhpStorm.
 * User: Shuvo
 * Date: 10/18/2017
 * Time: 3:14 AM
 */
?>

@extends('layouts.admin.master')

@section('title', 'Edit Job')

@section('content')
    <div class="wrapper wrapper-content">
        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible " role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ Session::get('success') }}
            </div>
        @endif
        <div id="msg"></div>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Edit Job</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>

                <div class="ibox-content">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach()
                        </div>
                    @endif
                    <form enctype="multipart/form-data" id="my-awesome-dropzone" class="form-horizontal" action="{{route('jobUpdate', $jobList->id)}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Job Title</label>
                            <div class="col-lg-10"><input type="text" name="name" value="{{$jobList->name}}" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Description</label>
                            <div class="col-lg-10">
                                {{--<input type="text" name="description" value="{{$jobList->description}}" class="form-control">--}}
                                <textarea rows="5" name="description" cols="133">{{$jobList->description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Category</label>
                            <div class="col-lg-4">
                                <select class="form-control m-b" name="category">
                                    @foreach($categories as $cate)
                                        @if($cate->is_parent!=0)

                                            @if($cate->id == $parentCateId)
                                                <option selected="selected" value="{{$cate->id}}">{{$cate->category_name}}</option>
                                            @else
                                                @if($cate->id == $jobList->category_id)
                                                    <option selected="selected" value="{{$cate->id}}">{{$cate->category_name}}</option>
                                                @else
                                                    <option value="{{$cate->id}}">{{$cate->category_name}}</option>
                                                @endif
                                            @endif
                                        @endif
                                    @endforeach
                                </select>
                                {{-- <input type="text" name="category_id" value="{{$jobList->category_id}}" class="form-control">--}}
                            </div>
                            <label class="col-lg-2 control-label">Sub Category</label>
                            <div class="col-lg-4">

                                <select class="form-control m-b" name="sub_categorie">
                                    <option value="0">Select One</option>
                                    @foreach($categories as $cate)
                                        @if($cate->is_parent==0 && $cate->parent_category_id == $parentCateId)
                                            @if($cate->id == $jobList->category_id)
                                                <option selected="selected" value="{{$cate->id}}">{{$cate->category_name}}</option>
                                            @else
                                                <option value="{{$cate->id}}">{{$cate->category_name}}</option>
                                            @endif
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        @if($jobList->selected_for_job==null)
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Project Cost</label>
                                <div class="col-lg-10">
                                    <input type="text" name="projectCost" value="{{$jobList->project_cost}}" class="form-control">
                                </div>
                            </div>
                        @endif
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Project Type</label>
                            <div class="col-lg-10" id="attachment">
                                <select class="form-control margin-bottom-20" name="projectType">
                                    @if($jobList->type == 1)
                                        <option selected="selected" value="1">One Time Project</option>
                                        <option value="2">On going</option>
                                        <option value="3">I don't know</option>
                                    @elseif($jobList->type == 2)
                                        <option value="1">One Time Project</option>
                                        <option selected="selected" value="2">On going</option>
                                        <option value="3">I don't know</option>

                                    @elseif($jobList->type == 3)
                                        <option value="1">One Time Project</option>
                                        <option value="2">On going</option>
                                        <option selected="selected" value="3">I don't know</option>
                                    @endif
                                </select>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Duration</label>
                            <div class="col-lg-10" id="attachment">
                                <select class="form-control margin-bottom-20" name="duration">
                                    @if($jobList->project_time == 1)
                                        <option selected="selected" value="1">More Then 1 Month</option>
                                        <option value="2">Less Then 1 Month</option>
                                        <option value="3">I don't know</option>
                                    @elseif($jobList->project_time == 2)
                                        <option value="1">One Time Project</option>
                                        <option selected="selected" value="2">Less Then 1 Month</option>
                                        <option value="3">I don't know</option>

                                    @elseif($jobList->project_time == 3)
                                        <option value="1">One Time Project</option>
                                        <option value="2">Less Then 1 Month</option>
                                        <option selected="selected" value="3">I don't know</option>
                                    @endif
                                </select>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Skills</label>
                            <div class="col-lg-10">
                                <div class="form-group">
                                    <select data-placeholder="Choose skills" name="skills[]" class="chosen-select" multiple style="" tabindex="4">
                                        @foreach($skills as $skill)
                                            @if(is_array(json_decode($jobList->skill_needed, true)))
                                                @if(in_array($skill->id,json_decode($jobList->skill_needed, true)))
                                                    <option selected value="{{$skill->id}}">{{$skill->name}}</option>
                                                @else
                                                    <option value="{{$skill->id}}">{{$skill->name}}</option>
                                                @endif
                                            @else
                                                <option value="{{$skill->id}}">{{$skill->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                        </div>



                        <div class="form-group">
                            <label class="col-lg-2 control-label">Approve</label>
                            <div class="col-lg-8" id="jobStatus">
                                @if($jobList->approved == 1)
                                    <button type="button" onclick="
                                            jobDisapprove({{$jobList->id}})" class="btn btn-danger">Disapprove</button>
                                @else
                                    <button type="button" onclick="jobApprove({{$jobList->id}})" class="btn btn-primary">Approve</button>
                                @endif
                            </div>
                            <div class=" col-lg-2">
                                <button class="btn btn-block btn-success" type="submit">Job Update</button>
                            </div>
                        </div>
                        {{--<div class="form-group">
                        <div class="col-lg-offset-10 col-lg-2">
                            <button class="btn btn-sm btn-success" type="submit">Job Update</button>
                        </div>
                    </div>--}}
                        @if(json_decode($jobList->job_attachment, true))
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Attachment Files</label>
                                <div class="col-lg-10" id="attachment">
                                    <?php $i=1; ?>
                                    <ul>

                                        @foreach(json_decode($jobList->job_attachment, true) as $value)

                                            <li>
                                                <i class="fa fa-check color-green"></i>
                                                <a href="{{ route('attachmentDownload',['attachment'=>$value]) }}" target="_blank">
                                                    Attachment no . {{$i++}}
                                                </a>

                                            </li>
                                        @endforeach
                                    </ul>

                                </div>

                            </div>
                        @endif
                    </form>
                </div>
            </div>
            <div>
                <form action="{{route('adminAddJobAttachment',['jobId'=>$jobList->id])}}" class="dropzone">
                    {{csrf_field()}}
                    <div class="fallback">
                        <input name="file" type="file" multiple />
                    </div>
                </form>
            </div>
    </div>
    {{--The script from dropzone--}}

    {{--This Script use for Job approve and disapprove--}}
    <script type="text/javascript">
        function jobApprove(jobId){
            $.post("{{route('postJobApprove')}}",
                {
                    _token: '{{csrf_token()}}',
                    jobId : jobId
                },

                function(data, status) {
                    $(".row_"+jobId).hide();
                    var msg = "<p class='alert alert-success'>Job has been approved</p>"
                    var btn = '<button type="button" onclick="jobDisapprove('+jobId+')" class="btn btn-danger">Disapprove</button>';
                    $('#msg').html(msg);
                    $("#jobStatus").html(btn);
                })
                .fail(function(response) {
                    var error = "<p class='alert alert-danger'>Job approve doesn't complete</p>"
                    $('#msg').html(error);
                });
        }
        function jobDisapprove(jobId){
            $.post("{{route('postJobDisapprove')}}",
                {
                    _token: '{{csrf_token()}}',
                    jobId : jobId
                },

                function(data, status) {
                    $(".row_"+jobId).hide();
                    var msg = "<p class='alert alert-success'>Job has been disapproved</p>"
                    var btn = '<button type="button" onclick="jobApprove('+jobId+')" class="btn btn-primary">Approve</button>';
                    $('#msg').html(msg);
                    $("#jobStatus").html(btn);
                })
                .fail(function(response) {
                    var error = "<p class='alert alert-danger'>Job Disapprove doesn't complete</p>"
                    $('#msg').html(error);
                });
        }
    </script>


@endsection
