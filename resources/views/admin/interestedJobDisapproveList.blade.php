<?php
/**
 * Created by PhpStorm.
 * User: Shuvo
 * Date: 10/25/2017
 * Time: 4:08 PM
 */
?>
@extends('layouts.admin.master')

@section('title', 'Interested Job List')

@section('content')
    <div style="margin-left: 85%;">
        <input type="button" value="Print Preview" class="btn btn-sm btn-info" onclick="PrintPreview()"/>
        <input type="button" value="Print" class="btn btn-sm btn-primary" onclick="PrintDoc()"/>
    </div>
    <div class="wrapper wrapper-content">
        @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="ibox float-e-margins" id="printarea">
            <div class="ibox-title">
                <h5>Interested Job Disapprove List</h5>
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
                        <th>Applicant Name</th>
                        <th>Job Name</th>
                        <th>Project Duration</th>
                        <th>Project Cost</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count =1; ?>
                    @foreach($disapproveInformation as $interested)
                        @foreach($interested->user as $user)

                            <tr class="gradeX">
                                <td>{{$count++}}</td>
                                <td><a href="{{ route('freelancerDetails', $user->id)}}">{{$user->fname}}{{$user->lname}}</a></td>
                                <td><a href="{{ route('jobDetails', [$interested->job->id])}}"> {{$interested->job->name}}</a></td>
                                <td>{{$interested->project_duration}}</td>
                                <td>{{$interested->project_cost}}</td>
                            </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
