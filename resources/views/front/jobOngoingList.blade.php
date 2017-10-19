<?php
/**
 * Created by PhpStorm.
 * User: Shuvo
 * Date: 14-Oct-17
 * Time: 04:46 PM
 */


?>
@extends('layouts.front.profileMaster')

@section('title', 'Job Ongoing List')

@section('content')
   <div class="col-md-9">
    <div class="profile-body">
        
    {{--<!--=== Search Block Version 2 ===-->--}}
    {{--<div class="search-block">--}}
        {{--<div class="container">--}}
            {{--<div class="col-md-12">--}}
                {{--<h2>Search again</h2>--}}
                {{--<div class="input-group">--}}
                    {{--<input type="text" class="form-control"  id="jobSearch" placeholder="Search words with regular expressions ...">--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div><!--/container-->--}}
    {{--<!--=== End Search Block Version 2 ===-->--}}
    <div class="content-sm">
        <!-- Begin Table Search Panel v1 -->
        <div class="table-search-v1 panel panel-dark margin-bottom-40" >
            <div class="panel-heading jobOngoingTableHeadingBlack">
                <h3 class="panel-title"><i class="fa fa-globe"></i> Ongoing Job Search Results</h3>
            </div>
            <div class="panel-body font-size-13">

                <table id="jobSearchDataTable" class="table table-striped table-bordered font-size-13" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Job Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Job Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @if(sizeof($jobList)>0)
                        @foreach($jobList as $job)
                            <tr>
                                <td>{{$job->job->name}}</td>
                                <td>{{$job->job->description}}</td>
                                <td>{{$job->job->name}}</td>
                                <td>
                                    <a href="{{route('getMilestone',['jobId'=>$job->job->id])}}" class="btn-success btn color-white">Milestone</a>
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

