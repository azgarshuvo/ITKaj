<?php
/**
 * Created by PhpStorm.
 * User: Shuvo
 * Date: 11-Oct-17
 * Time: 04:46 PM
 */
?>
@extends('layouts.front.profileMaster')

@section('title', 'Job Approve List')

@section('content')
   <div class="col-md-9">
    <div class="profile-body">
    <div class="content-sm">
        <!-- Begin Table Search Panel v1 -->
        <div class="table-search-v1 panel panel-dark margin-bottom-40" >
            <div class="panel-heading jobApprovedTableHeadingBlack">
                <h3 class="panel-title"><i class="fa fa-globe"></i> Approved Job Search Results</h3>
            </div>
            <div class="panel-body">
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
                    @foreach($approveProjectList as $approveProject)
                        <tr>
                            <td>{{$approveProject->name}}</td>
                            <td>{{substr($approveProject->description, 0, 90)}}...</td>
                            <td>{{$approveProject->project_cost}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a class="btn btn-success color-white" href="{{route('setupMilestone',['jobid'=>$approveProject->id])}}">Milestone</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('MyJobDescription',['jobId'=>$approveProject->id])}}" class="btn-success btn color-white">Details</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
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

