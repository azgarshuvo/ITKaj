<?php
/**
 * Created by PhpStorm.
 * User: Shuvo
 * Date: 14-Oct-17
 * Time: 04:46 PM
 */
?>
@extends('layouts.front.profileMaster')

@section('title', 'Job Interested List')

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
            <div class="panel-heading jobInterestedTableHeadingBlack">
                <h3 class="panel-title"><i class="fa fa-globe"></i> Interested Projects List</h3>
            </div>
            <div class="panel-body">
                <table id="jobSearchDataTable" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Job Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Job Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @if($interestedJobList != null && $interestedJobList != '')
                        @foreach($interestedJobList as $interestedJob)
                        <tr>
                            <td>{{$interestedJob->name}}</td>
                            <td>{{substr($interestedJob->description, 0, 100)}}...</td>
                            @if($category != null && $category != "")
                                @foreach($category as $cat)
                                    @if($cat->id == $interestedJob->category_id)
                                        <td>{{$cat->category_name}}</td>
                                    @endif
                                @endforeach
                            @endif
                            @if($interestedJob->admin_approve == 0)
                                <td><span class="label label-info">Pending..</span></td>
                            @endif
                            @if($interestedJob->admin_approve == 1)
                                <span class="label label-success">Approve</span>
                            @endif
                            <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button class="btn btn-danger btn-xs" onclick="deleteInterest({{$interestedJob->id}})"><i class="fa fa-trash-o"></i> Delete</button>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-info btn-xs"><i class="fa fa-share"></i> View</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                        @endforeach
                    @endif
                </table>
            </div>
        </div>
        <!-- End Table Search Panel v1 -->
    </div>
    </div>
    </div>
    <input type="hidden" value="{{route('freelancerJobInterestRemove')}}" id="deleteInterest">
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#jobSearchDataTable').DataTable();
        } );

        $('#jobSearch').on('keyup', function(){
            var search = $('#jobSearch').val();
            $('input[type=search]').val(search);
        });


        function deleteInterest(id){
            var URL = $('#deleteInterest').val();
            $.ajax({
                url: URL,
                type: "POST",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {jobid: id},
                success: function (data) {
                    console.log(data);
                    location.reload();
                }
            })
        }
    </script>
@endsection

