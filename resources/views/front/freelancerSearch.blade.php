<?php
/**
 * Created by PhpStorm.
 * User: zakariya
 * Date: 11-Oct-17
 * Time: 1:00 PM
 */

//dd($freeLancerList[1]->profile);
?>
@extends('layouts.front.master')

@section('title', '')

@section('content')
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Freelancer Search</h1>
        </div><!--/container-->
    </div><!--/breadcrumbs-->
    {{--<!--=== Search Block Version 2 ===-->--}}
    {{--<div class="search-block">--}}
        {{--<div class="container">--}}
            {{--<div class="col-md-6 col-md-offset-3">--}}
                {{--<h2>Search again</h2>--}}
                {{--<div class="input-group">--}}
                    {{--<input type="text" class="form-control" placeholder="Search words with regular expressions ...">--}}
                    {{--<span class="input-group-btn">--}}
							{{--<button class="btn-u" type="button"><i class="fa fa-search"></i></button>--}}
						{{--</span>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div><!--/container-->--}}
    <!--=== End Search Block Version 2 ===-->
    <div class="container content-sm">
        <!-- Begin Table Search Panel v1 -->
        <div class="table-search-v1 panel panel-dark margin-bottom-50" >
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-globe"></i> Table Search Results</h3>
            </div>
            <div class="panel-body">

                <table id="freelancerSearchDataTable" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Skills</th>
                            <th class="text-center">Professional Title</th>
                            <th class="text-center">Experience Level</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Skills</th>
                            <th class="text-center">Professional Title</th>
                            <th class="text-center">Experience Level</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($freeLancerList as $freelancer)
                            <tr class="text-center">
                                <td>{{$freelancer->fname." ".$freelancer->lname}}</td>
                                @if($freelancer->profile!=null)
                                    <td>{{$freelancer->profile->skills}}</td>
                                    <td>{{$freelancer->profile->professional_title}}</td>
                                    <td>
                                        @if($freelancer->profile->experience_level=="1") Entry Level @endif
                                        @if($freelancer->profile->experience_level=="2") Intermediate Level @endif
                                        @if($freelancer->profile->experience_level=="3") Expart Level @endif
                                    </td>
                                @else
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                @endif
                                <td><a href="{{route('my_profile_view',[$freelancer->id])}}"><button type="button" class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i>Show</button></a></td>
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
            $('#freelancerSearchDataTable').DataTable();
        } );
    </script>
@endsection

