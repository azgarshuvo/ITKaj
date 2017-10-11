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
                  <td>{{$user->admin_user_type}}</td>
                  <td>{{$user->created_at->diffForHumans()}}</td>
                  <td>{{$user->updated_at->diffForHumans()}}</td>
                  <td class="center">
                    <a class="btn btn-sm btn-info" href="{{ route('adminDetails', [$user->id])}}" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-sm btn-primary" href="{{ route('adminEdit', [$user->id])}}"  data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-sm btn-danger" href="{{ route('adminDelete', [$user->id])}}"  data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i></a>
                  </td>
              </tr>
              @endforeach
            </tbody>
          </table>

        </div>
        @endif
    </div>
    </div>
@endsection
