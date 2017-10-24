<?php
/**
 * Created by PhpStorm.
 * User: Shuvo
 * Date: 10/24/2017
 * Time: 12:23 AM
 */
?>
@extends('layouts.admin.master')

@section('title', 'Employeer Approve List')

@section('content')
    <div class="wrapper wrapper-content">
        @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Employeer Approve List</h5>
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
                        <th>Company Name</th>
                        <th>Professional Title</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count =1; ?>
                    @foreach($employerApproveList as $employer)
                        @if($employer->profile != null && $employer->profile != "")
                            <tr class="gradeX">
                                <td>{{$count++}}</td>
                                <td>{{$employer->fname}}{{$employer->lname}}</td>
                                <td>{{$employer->profile->company_name}}</td>
                                <td>{{$employer->profile->professional_title}}</td>
                                <td class="center">
                                    <a class="btn btn-sm btn-danger" href="" data-href="{{ route('employeerApproveDelete', $employer->id)}}" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-times"></i></a>
                                    <a class="btn btn-sm btn-info" href="#" data-toggle="tooltip" data-placement="left" title="Freelancer Details"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
                <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                            </div>

                            <div class="modal-body">
                                <p>You are about to delete one track, this procedure is irreversible.</p>
                                <p>Do you want to proceed?</p>
                                <p class="debug-url"></p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-danger btn-ok">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
