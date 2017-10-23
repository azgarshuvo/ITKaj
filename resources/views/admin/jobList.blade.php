<?php
/**
 * Created by PhpStorm.
 * User: Polash
 * Date: 16-Oct-17
 * Time: 11:10 AM
 */
?>
@extends('layouts.admin.master')

@section('title', 'View Job List')

@section('content')
    <div class="wrapper wrapper-content">
        <div class="message_show"></div>
        @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="ibox float-e-margins">
            <!-- Job list -->
            @if(!empty($jobList))
                <div class="ibox-title">
                    <h5>Job List</h5>
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
                            <th>Approve</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php  $count = 1; ?>
                        @foreach($jobList as $job)
                            <tr class="gradeX row_{{$job->id}}">
                                <td>{{$count++}}</td>
                                <td>{{$job->name}}</td>
                                <td>{{$job->description}}</td>
                                <td>{{$job->category_id}}</td>
                                <td>@if($job->approved==0) Not Approved @else Approve @endif</td>
                                <td class="center">
                                    <a class="btn btn-sm btn-info" href="{{ route('jobDetails', [$job->id])}}" data-toggle="tooltip" data-placement="left" title="Job Details"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-sm btn-primary" href="{{ route('jobEdit', [$job->id])}}"  data-toggle="tooltip" title="Job Edit"><i class="fa fa-edit"></i></a>
                                    <a onclick="return confirm('Are you sure to delete?')" class="btn btn-sm btn-danger" href="{{ route('jobDelete', [$job->id])}}"  data-toggle="tooltip" title="Job Delete"><i class="fa fa-times" ></i></a>
                                    <button onclick="jobApprove({{$job->id}})" class="btn btn-sm btn-primary"  data-toggle="tooltip" title="Job Approve"><i class="fa fa-check"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
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
                $('.message_show').html(msg);
            })
            .fail(function(response) {
                var error = "<p class='alert alert-danger'>Job approve doesn't complete</p>"
                $('.message_show').html(error);
            });
    }
</script>
@endsection
