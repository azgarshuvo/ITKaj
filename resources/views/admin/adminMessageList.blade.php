<?php
/**
 * Created by PhpStorm.
 * User: Zakariya Omar Naseef
 * Date: 21-Nov-17
 * Time: 4:04 PM
 */
?>
@extends('layouts.admin.master')

@section('title', 'Dashboard')

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
                <h5>Admin All User Message List</h5>
            </div>
            <div class="ibox-content">

                <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($messages as $message)
                        <tr class="gradeX">
                            <td>{{$message->message}}</td>
                            <td>
                                @if($message->is_live == 1)
                                    Live
                                @elseif($message->is_live == 0)
                                    Not Live
                                @endif
                            </td>
                            <td class="center">
                                <a class="btn btn-sm btn-primary"  href="{{route('adminMessageForAllUsersEdit', [$message->id])}}"  data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-sm btn-danger" href=""  data-toggle="tooltip" title="Delete"><i class="fa fa-times" ></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
