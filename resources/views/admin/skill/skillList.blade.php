<?php
/**
 * Created by PhpStorm.
 * User: Shuvo
 * Date: 10/18/2017
 * Time: 1:02 AM
 */
?>

@extends('layouts.admin.master')

@section('title', 'Skill List')

@section('content')
    <div style="margin-left: 85%;">
        <input type="button" value="Print Preview" class="btn btn-sm btn-info" onclick="PrintPreview()"/>
        <input type="button" value="Print" class="btn btn-sm btn-primary" onclick="PrintDoc()"/>
    </div>
    <div class="wrapper wrapper-content">
        @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="ibox" id="printarea">
            <div class="ibox-title">
                <h5>Skill List</h5>
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
                        <th>Skill Name</th>
                        <th>Description</th>
                        <th class="hd">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  $count = 1;
                    ?>

                    @foreach($lists as $list)
                        <tr class="gradeX">
                            <td>{{$count++}}</td>
                            <td>{{$list->name}}</td>
                            <td>{{$list->description}}</td>
                            <td class="center">
                                <a class="btn btn-sm btn-primary"  href="{{ route('skillEdit', $list->id)}}"  data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                                {{--<a class="btn btn-sm btn-danger" href="" data-href="{{ route('skillDelete', $list->id)}}" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-times"></i></a>--}}
                                <a onclick="return confirm('Are you sure to delete?')" class="btn btn-sm btn-danger" href="{{ route('skillDelete', [$list->id])}}"  data-toggle="tooltip" title="Job Delete"><i class="fa fa-times" ></i></a>
                            </td>
                        </tr>
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
