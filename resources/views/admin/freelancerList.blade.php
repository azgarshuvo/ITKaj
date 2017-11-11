<?php
/**
 * Created by PhpStorm.
 * User: shuvo
 * Date: 09-Oct-17
 * Time: 5:57 PM
 */
?>
@extends('layouts.admin.master')

@section('title', 'Freelancer List')

@section('content')
    <div class="wrapper wrapper-content">
        @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Freelancer List</h5>
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
                        <th>Full Name</th>
                        <th>Skill</th>
                        <th>Professional Title</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count=1; ?>
                    @foreach($freelancerList as $freelancer)
                        @if($freelancer->profile != null && $freelancer->profile != "")
                            <tr class="gradeX">
                                <td>{{$count++}}</td>
                                <td>{{$freelancer->fname}}{{$freelancer->lname}}</td>
                                <td>
                                    @foreach(json_decode($freelancer->profile->skills) as $skill)
                                        {{$skill}}
                                    @endforeach
                                </td>
                                <td>{{$freelancer->profile->professional_title}}</td>
                                <td class="center">
                                    <a onclick="return confirm('Are you sure to delete?')" class="btn btn-sm btn-danger" href="{{ route('freelancerDelete', $freelancer->id)}}"  data-toggle="tooltip" title="Job Delete"><i class="fa fa-times" ></i></a>
                                    {{--<a class="btn btn-sm btn-danger" href="" data-href="{{ route('freelancerDelete', $freelancer->id)}}" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-times"></i></a>--}}
                                    <a class="btn btn-sm btn-info" href="{{route('freelancerDetails', $freelancer->id)}}" data-toggle="tooltip" data-placement="left" title="Freelancer Details"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>

                {{--<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
                    {{--<div class="modal-dialog">--}}
                        {{--<div class="modal-content">--}}

                            {{--<div class="modal-header">--}}
                                {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
                                {{--<h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>--}}
                            {{--</div>--}}

                            {{--<div class="modal-body">--}}
                                {{--<p>You are about to delete one track, this procedure is irreversible.</p>--}}
                                {{--<p>Do you want to proceed?</p>--}}
                                {{--<p class="debug-url"></p>--}}
                            {{--</div>--}}

                            {{--<div class="modal-footer">--}}
                                {{--<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>--}}
                                {{--<a class="btn btn-danger btn-ok">Delete</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

            </div>
        </div>
    </div>
@endsection
