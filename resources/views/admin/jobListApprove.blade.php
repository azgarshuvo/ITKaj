<?php
/**
 * Created by PhpStorm.
 * User: Polash
 * Date: 16-Oct-17
 * Time: 11:10 AM
 */
?>
@extends('layouts.admin.master')

@section('title', 'View Approve Job List')

@section('content')
    <div class="wrapper wrapper-content">
        @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="ibox float-e-margins">
            <!-- Job list -->
            @if(!empty($jobList))
                <div class="ibox-title">
                    <h5>Approved Job List</h5>
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
                            <th>Job Title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php  $count = 1; ?>
                        @foreach($jobList as $job)
                            <tr class="gradeX">
                                <td>{{$count++}}</td>
                                <td>{{$job->name}}</td>
                                <td>{{$job->description}}</td>
                                <td>{{$job->category_id}}</td>
                                <td class="center">
                                    <a class="btn btn-sm btn-info" href="{{ route('jobDetails', [$job->id])}}" data-toggle="tooltip" data-placement="left" title="Job Details"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-sm btn-primary" href="{{ route('jobApproveEdit', [$job->id])}}"  data-toggle="tooltip" title="Job Edit"><i class="fa fa-edit"></i></a>
                                    <a onclick="return confirm('Are you sure to delete?')" class="btn btn-sm btn-danger" href="{{ route('jobApproveDelete', [$job->id])}}"  data-toggle="tooltip" title="Job Delete"><i class="fa fa-times" ></i></a>
                                    <button onclick="addFreelancer({{$job->id}})" type="button" class="btn btn-sm btn-primary" title="Add Freelancer" data-toggle="modal" data-target="#freelancer"><i class="fa fa-plus" ></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="modal inmodal fade" id="freelancer" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form role="form">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title">Assign Freelancer To Job</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                            <input type="hidden" name="job_id" id="job_id">
                                            <label for="freelancer">Freelancer Suggest from Employee</label>
                                            <select id="freelancerSelected" class="form-control m-b" name="freelancer">
                                                <option value="0">Select One</option>
                                            </select>

                                            <label for="freelancer">Freelancer List</label>
                                            <select id="" class="form-control m-b" name="freelancer">
                                                <option value="0">Select One</option>
                                                @foreach($freelancerList as $freelancer)
                                                    <option value="{{$freelancer->id}}">{{$freelancer->fname}} {{$freelancer->lname}}</option>
                                                @endforeach
                                            </select>

                                    </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <script type="text/javascript">
        function addFreelancer(jobId){
            $("#job_id").val(jobId);
            $.post("{{route('getFreelancerList')}}",
                {
                    _token: '{{csrf_token()}}',
                    jobId:jobId
                },

                function(data, status) {
                    $("#freelancerSelected").html(data);
                })
        }
    </script>
@endsection

