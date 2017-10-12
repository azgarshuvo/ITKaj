<?php
/**
 * Created by PhpStorm.
 * User: zakariya
 * Date: 11-Oct-17
 * Time: 12:00 PM
 */
?>
@extends('layouts.front.master')

@section('title', 'Job Search')

@section('content')
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Job Search</h1>
        </div><!--/container-->
    </div><!--/breadcrumbs-->
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
    <div class="container content-sm">
        <!-- Begin Table Search Panel v1 -->
        <div class="table-search-v1 panel panel-dark margin-bottom-50" >
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-globe"></i> Table Search Results</h3>
            </div>
            <div class="panel-body">
                {{--<table class="table table-bordered table-striped">--}}
                    {{--<thead>--}}
                    {{--<tr>--}}
                        {{--<th>Name</th>--}}
                        {{--<th class="hidden-sm">Short Description</th>--}}
                        {{--<th>Status</th>--}}
                        {{--<th>Action</th>--}}
                    {{--</tr>--}}
                    {{--</thead>--}}
                    {{--<tbody>--}}
                    {{--<tr>--}}
                        {{--<td>--}}
                            {{--<a href="#">HP Enterprise Service</a>--}}
                        {{--</td>--}}
                        {{--<td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu vel fringilla tincidunt.</td>--}}
                        {{--<td><button class="btn btn-block btn-success btn-xs"><i class="icon-graph"></i> High</button></td>--}}
                        {{--<td>--}}
                            {{--<div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> Description</button></div>--}}
                            {{--<div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> I'm Interested</button></div>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>--}}
                            {{--<a href="#">HP Enterprise Service</a>--}}
                        {{--</td>--}}
                        {{--<td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu vel fringilla tincidunt.</td>--}}
                        {{--<td><button class="btn btn-block btn-success btn-xs"><i class="icon-graph"></i> High</button></td>--}}
                        {{--<td>--}}
                            {{--<div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> Description</button></div>--}}
                            {{--<div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> I'm Interested</button></div>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>--}}
                            {{--<a href="#">HP Enterprise Service</a>--}}
                        {{--</td>--}}
                        {{--<td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu vel fringilla tincidunt.</td>--}}
                        {{--<td><button class="btn btn-block btn-success btn-xs"><i class="icon-graph"></i> High</button></td>--}}
                        {{--<td>--}}
                            {{--<div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> Description</button></div>--}}
                            {{--<div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> I'm Interested</button></div>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>--}}
                            {{--<a href="#">HP Enterprise Service</a>--}}
                        {{--</td>--}}
                        {{--<td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu vel fringilla tincidunt.</td>--}}
                        {{--<td><button class="btn btn-block btn-success btn-xs"><i class="icon-graph"></i> High</button></td>--}}
                        {{--<td>--}}
                            {{--<div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> Description</button></div>--}}
                            {{--<div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> I'm Interested</button></div>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>--}}
                            {{--<a href="#">HP Enterprise Service</a>--}}
                        {{--</td>--}}
                        {{--<td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu vel fringilla tincidunt.</td>--}}
                        {{--<td><button class="btn btn-block btn-success btn-xs"><i class="icon-graph"></i> High</button></td>--}}
                        {{--<td>--}}
                            {{--<div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> Description</button></div>--}}
                            {{--<div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> I'm Interested</button></div>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>--}}
                            {{--<a href="#">HP Enterprise Service</a>--}}
                        {{--</td>--}}
                        {{--<td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu vel fringilla tincidunt.</td>--}}
                        {{--<td><button class="btn btn-block btn-success btn-xs"><i class="icon-graph"></i> High</button></td>--}}
                        {{--<td>--}}
                            {{--<div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> Description</button></div>--}}
                            {{--<div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> I'm Interested</button></div>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>--}}
                            {{--<a href="#">HP Enterprise Service</a>--}}
                        {{--</td>--}}
                        {{--<td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu vel fringilla tincidunt.</td>--}}
                        {{--<td><button class="btn btn-block btn-success btn-xs"><i class="icon-graph"></i> High</button></td>--}}
                        {{--<td>--}}
                            {{--<div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> Description</button></div>--}}
                            {{--<div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> I'm Interested</button></div>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>--}}
                            {{--<a href="#">HP Enterprise Service</a>--}}
                        {{--</td>--}}
                        {{--<td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu vel fringilla tincidunt.</td>--}}
                        {{--<td><button class="btn btn-block btn-success btn-xs"><i class="icon-graph"></i> High</button></td>--}}
                        {{--<td>--}}
                            {{--<div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> Description</button></div>--}}
                            {{--<div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> I'm Interested</button></div>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>--}}
                            {{--<a href="#">HP Enterprise Service</a>--}}
                        {{--</td>--}}
                        {{--<td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu vel fringilla tincidunt.</td>--}}
                        {{--<td><button class="btn btn-block btn-success btn-xs"><i class="icon-graph"></i> High</button></td>--}}
                        {{--<td>--}}
                            {{--<div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> Description</button></div>--}}
                            {{--<div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> I'm Interested</button></div>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>--}}
                            {{--<a href="#">HP Enterprise Service</a>--}}
                        {{--</td>--}}
                        {{--<td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu vel fringilla tincidunt.</td>--}}
                        {{--<td><button class="btn btn-block btn-success btn-xs"><i class="icon-graph"></i> High</button></td>--}}
                        {{--<td>--}}
                            {{--<div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> Description</button></div>--}}
                            {{--<div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> I'm Interested</button></div>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>--}}
                            {{--<a href="#">HP Enterprise Service</a>--}}
                        {{--</td>--}}
                        {{--<td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu vel fringilla tincidunt.</td>--}}
                        {{--<td><button class="btn btn-block btn-success btn-xs"><i class="icon-graph"></i> High</button></td>--}}
                        {{--<td>--}}
                            {{--<div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> Description</button></div>--}}
                            {{--<div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> I'm Interested</button></div>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>--}}
                            {{--<a href="#">HP Enterprise Service</a>--}}
                        {{--</td>--}}
                        {{--<td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu vel fringilla tincidunt.</td>--}}
                        {{--<td><button class="btn btn-block btn-success btn-xs"><i class="icon-graph"></i> High</button></td>--}}
                        {{--<td>--}}
                            {{--<div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> Description</button></div>--}}
                            {{--<div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> I'm Interested</button></div>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>--}}
                            {{--<a href="#">HP Enterprise Service</a>--}}
                        {{--</td>--}}
                        {{--<td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu vel fringilla tincidunt.</td>--}}
                        {{--<td><button class="btn btn-block btn-success btn-xs"><i class="icon-graph"></i> High</button></td>--}}
                        {{--<td>--}}
                            {{--<div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> Description</button></div>--}}
                            {{--<div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> I'm Interested</button></div>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>--}}
                            {{--<a href="#">HP Enterprise Service</a>--}}
                        {{--</td>--}}
                        {{--<td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu vel fringilla tincidunt.</td>--}}
                        {{--<td><button class="btn btn-block btn-success btn-xs"><i class="icon-graph"></i> High</button></td>--}}
                        {{--<td>--}}
                            {{--<div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> Description</button></div>--}}
                            {{--<div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> I'm Interested</button></div>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    {{--</tbody>--}}
                {{--</table>--}}
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
                        @foreach($job_list as $job)
                            <tr>
                                <td>{{$job->name}}</td>
                                <td>{{$job->description}}</td>
                                <td>{{$job->category_id}}</td>
                                <td><a href="{{route('JobDescription', ['job_number' => $job->id])}}" ><button type="button" class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i> Show</button></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- End Table Search Panel v1 -->
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


