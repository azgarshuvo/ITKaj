<?php
/**
 * Created by PhpStorm.
 * User: Shuvo
 * Date: 14-Oct-17
 * Time: 04:46 PM
 */

?>
@extends('layouts.front.profileMaster')

@section('title', 'Freelancer Job Ongoing List')

@section('content')
    <div class="col-md-9">
        <div class="profile-body">
            <div class="content-sm">
                <!-- Begin Table Search Panel v1 -->
                <div class="table-search-v1 panel panel-dark margin-bottom-40" >
                    <div class="panel-heading jobOngoingTableHeadingBlack">
                        <h3 class="panel-title"><i class="fa fa-globe"></i> Freelancer Ongoing Job Search Results</h3>
                    </div>
                    <div class="panel-body font-size-13">

                        <table id="jobSearchDataTable" class="table table-striped table-bordered font-size-13" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Job Title</th>
                                <th>Description</th>
                                <th>Project Cost</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Job Title</th>
                                <th>Description</th>
                                <th>Project Cost</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @if($jobList)
                                @foreach($jobList as $job)
                                    <tr>
                                        <td>{{$job->name}}</td>
                                        <td>{{substr($job->description, 0, 90)}}...</td>
                                        <td>{{$job->project_cost}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a href="{{route('getMilestone',['jobId'=>$job->id])}}" class="btn-success btn color-white">Milestone</a>
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="{{route('JobDescription',['jobId'=>$job->id])}}" class="btn-success btn color-white">Details</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>

                    </div>
                </div>
                <!-- End Table Search Panel v1 -->
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#jobSearchDataTable').DataTable();
        } );

        $('#jobSearch').on('keyup', function(){
            var search = $('#jobSearch').val();
            $('input[type=search]').val(search);
        });
    </script>
@endsection

