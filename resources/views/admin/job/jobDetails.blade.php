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
                                <div class="col-md-12" id="jobStatus">
                                    @if($jobDetails->approved == 1)
                                        <button onclick="jobDisapprove({{$jobDetails->id}})" class="btn btn-danger">Disapprove</button>
                                    @else
                                        <button onclick="jobApprove({{$jobDetails->id}})" class="btn btn-primary">Approve</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{--<div class="col-md-8" id="added_list">--}}
                    {{--<h3>Added Freelancer List</h3>--}}
            {{--</div>--}}
            <div class="col-md-8" class="msg">
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ Session::get('success') }}
                </div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissible " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ Session::get('error') }}
                </div>
            @endif
                <div id="msg"></div>
            <div id="error-alert" class="alert alert-danger hidden" role="alert">

                <p class="message_show"></p>
            </div>
            </div>

            <div class="col-md-8" id="alert" hidden="hidden">
                    <div class="alert alert-danger" role="alert">
                        <span aria-hidden="true"></span>
                        <h4>Can not Add Freelancer More than One</h4>
                    </div>
            </div>

            <div class="col-md-8">
                <div class="ibox-title">
                    <h5 class="">Freelancer Selected for Job</h5>
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

                            @if($assign)
                                <tr class="gradeX removeData{{$assign->id}}">
                                    <td class="name{{$assign->id}}">{{$assign->fname}}{{$assign->lname}}</td>
                                    <td class="skills{{$assign->id}}">{{$assign->profile->skills}}</td>
                                    <td class="experience_level{{$assign->id}}">@if($assign->profile->experience_level == 1) Beginner @elseif($assign->profile->experience_level == 2)Intermediate Level @else Expert Level @endif</td>
                                    <td class="center">
                                        <a class="btn btn-sm btn-info" href="#" data-toggle="tooltip" data-placement="left" title="Job Details"><i class="fa fa-eye"></i></a>
                                        <a onclick="return confirm('Are you sure to delete?')" class="btn btn-sm btn-danger"
                                           href="{{route('removeFreelancer',['jobId'=>$jobDetails->id])}}"  data-toggle="tooltip" title="Job Delete"><i class="fa fa-times" ></i></a>
                                    </td>
                                </tr>
                            @endif
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
                                                    <a class="btn btn-sm btn-info" href="javascript:void(0);" data-toggle="tooltip" data-placement="left" title="Job Details"><i class="fa fa-eye"></i></a>
                                                    <button onclick="openModal({{$select->id}})" type="button" class="btn btn-sm btn-info" name="addButton"><i class="fa fa-plus"></i> Add</button>
                                                    <button type="button" class="btn btn-sm btn-info hidden" data-toggle="modal" data-target="#firstModal">
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
            {{--Interested freelancer list start--}}

            <div class="col-md-12">
                <div class="ibox-title">
                    <h5>Interested Freelancer List</h5>
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
                        @foreach($interestUser as $list)
                            @if($list->id != $jobDetails->selected_for_job)
                                @if($list->profile != null || $list->profile != '')
                                    <tr class="gradeX removeData{{$list->id}}">
                                        <td>{{$count++}}</td>
                                        <td class="name{{$list->id}}">{{$list->fname}}{{$list->lname}}</td>
                                        <td class="skills{{$list->id}}">{{$list->profile->skills}}</td>
                                        <td class="experience_level{{$list->id}}">@if($list->profile->experience_level == 1) Beginner @elseif($list->profile->experience_level == 2)Intermediate Level @else Expert Level @endif</td>
                                        <td class="center">
                                            <a class="btn btn-sm btn-info" href="#" data-toggle="tooltip" data-placement="left" title="Job Details"><i class="fa fa-eye"></i></a>
                                            <button onclick="openModal({{$list->id}})" type="button" class="btn btn-sm btn-info" name="addButton"><i class="fa fa-plus"></i> Add</button>
                                            <button id="clickModal" type="button" class="hidden" data-toggle="modal" data-target="#secondModal">
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
            {{--Interested freelancer list end--}}

            {{--Total Freelancer List Start--}}
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
                                    <tr class="gradeX removeData{{$list->id}}">
                                        <td>{{$count++}}</td>
                                        <td class="name{{$list->id}}">{{$list->fname}}{{$list->lname}}</td>
                                        <td class="skills{{$list->id}}">{{$list->profile->skills}}</td>
                                        <td class="experience_level{{$list->id}}">@if($list->profile->experience_level == 1) Beginner @elseif($list->profile->experience_level == 2)Intermediate Level @else Expert Level @endif</td>
                                        <td class="center">
                                            <a class="btn btn-sm btn-info" href="#" data-toggle="tooltip" data-placement="left" title="Job Details"><i class="fa fa-eye"></i></a>
                                            <button onclick="openModal({{$list->id}})" type="button" class="btn btn-sm btn-info" name="addButton"><i class="fa fa-plus"></i> Add</button>
                                            <button id="clickModal" type="button" class="hidden" data-toggle="modal" data-target="#secondModal">

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

            {{--Total Freelancer List End--}}

            {{--Milestone List Start--}}
            @if($contact)
            <div class="col-md-12">
                <div class="ibox-title">
                    <h5>Milestone List for This Job</h5>
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
                            <th>Milestone Title</th>
                            <th>Description</th>
                            <th>Experience Level</th>
                            <th>Fund Release</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if(sizeof($contact)>=1)
                                <?php  $count = 1; ?>
                                @foreach($contact as $milestoneList)

                                    @foreach($milestoneList->milestone as $milestone)

                                    <tr class="gradeX removeData{{$milestone->id}}">
                                        <td>{{$count++}}</td>
                                        <td class="name{{$milestone->id}}">{{$milestone->milestone_title}}</td>
                                        <td class="skills{{$milestone->id}}">{{$milestone->milestone_description}}</td>
                                        <td class="experience_level{{$milestone->id}}">{{$milestone->deadline}}</td>
                                        <td class="fund_level{{$milestone->id}}">{{$milestone->fund_release}}</td>
                                        <td class="center td_{{$milestone->id}}">
                                            @if($milestone->status==0)
                                                <span class="bg-color-orange btn-primary padding-5-8">Not Released</span>

                                            @elseif($milestone->status==1)
                        <button onclick="transerFund({{$milestone->id.",".$milestone->fund_release.",".$milestone->contact_id}})"
                                                        type="button" class="btn btn-success btn-xs padding-5-8"  name="showButton">Transfer
                                                </button>
                                            @else
                                                <span class="btn-success padding-5-8">Transferred</span>
                                            @endif
                                        </td>
                                    </tr>
                                        @endforeach

                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
            {{--Milestone List End--}}


            {{--Second Modal Start Here--}}
            <div class="modal inmodal fade" id="secondModal" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form>
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title freelancerTitle">Freelancer Select</h4>
                        </div>
                        <div class="modal-body">
                            <div class="ibox-content">

                                <div class="form-group">
                                    <label class="font-noraml">Contact Details</label>
                                    <div class="input-group">
                                        <textarea id="contactDetails" cols="100" rows="6"></textarea>
                                        <input type="hidden" id="freelancerId">
                                    </div>
                                </div>

                                <div class="form-group" id="data_2">
                                    <label class="font-noraml">Start Date</label>
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input id="contactStart" type="text" class="form-control" value="{{date('Y-m-d')}}">
                                    </div>
                                </div>

                                <div class="form-group" id="data_3">
                                    <label class="font-noraml">End Date</label>
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input id="contactEnd" type="text" class="form-control" value="{{date('Y-m-d')}}">
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
                            <button onclick="SelectFreelancer()" type="button" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            {{--Second Modal End Here--}}

            </div>
        </div>
    <script type="text/javascript">
        /*This function add row to selected table*/
        function rowAdd(id){
            var contactDetails = $("#contactDetails").val();
            var contactStart = $("#contactStart").val();
            var contactEnd = $("#contactEnd").val();
            var jobId = $("#jobId").val();
            var name = $(".name"+id+":first").text();
            var updateName = name.trim();
            var skills = $(".skills"+id+":first").text();
            var experience_level = $(".experience_level"+id+":first").text();
            var url = '{{ route("removeFreelancer", ":id") }}';
            url = url.replace(':id', jobId);
            var row = '<tr>' +
                '<td>'+updateName+'</td>' +
                '<td>'+skills+'</td>' +
                '<td>'+experience_level+'</td>' +
                '<td><a class="btn btn-sm btn-info" href="#" data-toggle="tooltip" data-placement="left" title="Job Details"><i class="fa fa-eye"></i></a>\n' +
                '<a class="btn btn-sm btn-danger" href="'+url+'"  data-toggle="tooltip" title="Freelancer Delete"><i class="fa fa-times" ></i></a></td>' +
                '</tr>';

                $(".rowBody").html(row);
                $(".removeData"+id).toggle();
        }
        /*this function send ajax post request & call form SelectFreelancer*/
        function getSelectedFreelancer(id){

            var x = document.getElementById("tableRow").rows.length;
            if(x == 0){

                return true;
            }
            else{
                $("#alert").show();
                return false;
            }
        }

        /*This function for triger modal*/
        function openModal(id){
            var name = $('.names'+id).text();
            $(".freelancerTitle").html("Select "+name+" Freelancer for job");
            $("#freelancerId").val(id);
            $("#clickModal").click();
        }

        /*Fire when modal save change clicked*/
        function SelectFreelancer() {

            var id = $("#freelancerId").val();
            var jobID = $("#jobId").val();
            var contactDetails = $("#contactDetails").val();
            var contactStart = $("#contactStart").val();
            var contactEnd = $("#contactEnd").val();
            if (getSelectedFreelancer(id)==true){
                $.post("{{route('freelancerAssign')}}",
                    {
                        _token: '{{csrf_token()}}',
                        id: id,
                        jobID: jobID,
                        contactDetails: contactDetails,
                        contactStart: contactStart,
                        contactEnd: contactEnd
                    },

                    function (data) {
                        if (!$.trim(data)) {
                            rowAdd(id);
                            $('#error-alert').addClass('hidden');
                        }
                        else {
                            $('#error-alert').removeClass('hidden');
                            $('.message_show').html(data);
                        }

                    });
            }
            $('.close').click();
        }
    </script>
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
                    var btn = '<button onclick="jobDisapprove('+jobId+')" class="btn btn-danger">Disapprove</button>';
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
                    var btn = '<button onclick="jobApprove('+jobId+')" class="btn btn-primary">Approve</button>';
                    $('#msg').html(msg);
                    $("#jobStatus").html(btn);
                })
                .fail(function(response) {
                    var error = "<p class='alert alert-danger'>Job Disapprove doesn't complete</p>"
                    $('#msg').html(error);
                });
        }
    </script>

    {{--This script for transfer fund--}}
    <script type="text/javascript">
        function transerFund(milestoneId,fund,contactId){
            var request = $.ajax({
                url: '{{route('fundTransfer')}}',
                type: "POST",
                data: {milestoneId : milestoneId,fund:fund,contactId:contactId,_token:'{{ csrf_token() }}'},
                dataType: "text"
            });

            request.done(function(msg) {
                if (!$.trim(msg)) {
                    var mess = "<p class='alert alert-success'>Milestone Transfer Success</p>";
                    var html = '<span class="btn-success padding-5-8 padding-5-8">Transferred</span>';
                    $('#msg').html(mess);
                    $('.td_'+milestoneId).html(html);
                }
                else {
                    $('#msg').html(mess);
                }
            });

            request.fail(function(jqXHR, textStatus) {
                var error = "<p class='alert alert-danger'>Transfer request doesn't complete</p>"
                $('#msg').html(error);
            });
        }
    </script>
@endsection
