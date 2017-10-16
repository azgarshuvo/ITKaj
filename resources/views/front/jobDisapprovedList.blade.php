<?php
/**
 * Created by PhpStorm.
 * User: Shuvo
 * Date: 11-Oct-17
 * Time: 05:00 PM
 */
?>
@extends('layouts.front.profileMaster')

@section('title', 'Job Approved List')

@section('content')
   <div class="col-md-9">
    <div class="profile-body">
    <div class="content-sm">
        <!-- Begin Table Search Panel v1 -->
        <div class="table-search-v1 panel panel-dark margin-bottom-40" >
            <div class="panel-heading jobDisapprovedTableHeadingBlack">
                <h3 class="panel-title"><i class="fa fa-globe"></i> Disapproved Job Search Results</h3>
            </div>
            <div class="panel-body">
                <table id="jobSearchDataTable" class="table table-striped table-bordered" width="100%" cellspacing="0">
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
                    @foreach($disapproveProjectList as $disapproveProject)
                        <tr>
                            <td>{{$disapproveProject->name}}</td>
                            <td>{{$disapproveProject->description}}</td>
                            <td>{{$disapproveProject->category_id}}</td>
                            <td></td>
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

