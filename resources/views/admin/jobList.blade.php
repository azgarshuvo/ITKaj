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
                            <tr class="gradeX">
                                <td>{{$count++}}</td>
                                <td>{{$job->name}}</td>
                                <td>{{$job->description}}</td>
                                <td>{{$job->category_id}}</td>
                                <td>@if($job->approved==0) Approved @else Not Approve @endif</td>
                                <td class="center">
                                    <a class="btn btn-sm btn-info" href="{{ route('jobDetails', [$job->id])}}" data-toggle="tooltip" data-placement="left" title="Job Details"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-sm btn-primary" href="{{ route('jobEdit', [$job->id])}}"  data-toggle="tooltip" title="Job Edit"><i class="fa fa-edit"></i></a>
                                    <a onclick="return confirm('Are you sure to delete?')" class="btn btn-sm btn-danger" href="{{ route('jobDelete', [$job->id])}}"  data-toggle="tooltip" title="Job Delete"><i class="fa fa-times" ></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection

