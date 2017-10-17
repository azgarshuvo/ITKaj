<?php
/**
 * Created by PhpStorm.
 * User: zakariya
 * Date: 09-Oct-17
 * Time: 2:19 PM
 */
?>
@extends('layouts.admin.master')

@section('title', 'Add Admin')

@section('content')
    <div class="wrapper wrapper-content">
      @if(Session::has('success'))
      <div class="alert alert-success">{{ Session::get('success') }}</div>
      @endif
      <div class="ibox float-e-margins">
        <!-- admin list -->
        @if(!empty($users))
        <div class="ibox-title">
            <h5>Admin List</h5>
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
                  <th>Admin Type</th>
                  <th>Created Date</th>
                  <th>Updated Date</th>
                  <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php  $count = 1; ?>
              @foreach($users as $user)
              <tr class="gradeX">
                  <td>{{$count++}}</td>
                  <td>{{$user->fname." ".$user->lname}}</td>
                  <td>
                    @if($user->admin_user_type == 1)
                      Super Admin
                    @elseif($user->admin_user_type == 2)
                      Mid Level Admin
                    @elseif($user->admin_user_type == 3)
                      Third Level Admin
                    @else
                      Something went wrong
                    @endif
                  </td>
                  <td>{{$user->created_at->diffForHumans()}}</td>
                  <td>{{$user->updated_at->diffForHumans()}}</td>
                  <td class="center">
                    <a class="btn btn-sm btn-info" href="{{ route('adminDetails', [$user->id])}}" data-toggle="tooltip" data-placement="left" title="View"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-sm btn-primary" href="{{ route('adminEdit', [$user->id])}}"  data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-sm btn-danger" href="javascript:void()" data-href="{{ route('adminDelete', $user->id)}}"  data-toggle="modal" data-target="#confirm-delete"  data-toggle="tooltip" title="Delete"><i class="fa fa-times" onclick="return confirm("Are you sure to delete?")"></i></a>
                  </td>
              </tr>
              @endforeach
            </tbody>
          </table>

        </div>
        @endif
    </div>
    </div>











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
@endsection
