<?php
/**
 * Created by PhpStorm.
 * User: zakariya
 * Date: 09-Oct-17
 * Time: 2:19 PM
 */
?>
@extends('layouts.admin.master')

@section('title', 'Admin Details')

@section('content')
    <div class="wrapper wrapper-content">
      <div class="col-md-6 col-md-offset-3">
        @if(!empty($users))
        <div class="ibox float-e-margins">
          <div class="ibox-title">
              <h5>{{$users->fname." ".$users->lname}} Details</h5>

              <div class="ibox-tools">
                  <a class="collapse-link">
                      <i class="fa fa-chevron-up"></i>
                  </a>
              </div>
          </div>
          <?php
            $user_profile = App\UserProfile::where('user_id', $users->id)->get();
          ?>
          @foreach($user_profile as $up)

          <div class="ibox-content no-padding border-left-right">
              <img alt="image" class="img-responsive" src="{{ asset('uploads/admin/' . $up->img_path) }}">
          </div>
          <div class="ibox-content profile-content">
            <h4><strong>{{$users->fname." ".$users->lname}}</strong><span> ({{$users->username}})</span></h4>
            <h5>
              <span>
                <i>
                  @if($users->admin_user_type == 1)
                    Super Admin
                  @elseif($users->admin_user_type == 2)
                    Mid Level Admin
                  @elseif($users->admin_user_type == 3)
                    Third Level Admin
                  @else
                    Something went wrong
                  @endif
                </i>
              </span>
            </h5>
            <p><i class="fa fa-map-marker"></i> {{$up->city}}, {{$up->country}}</p>
            <p><i class="fa fa-envelope"></i> {{$users->email}}</p>
            <p><i class="fa fa-phone"></i> {{$up->phone_number}}</p>

            <div class="user-button">
                <div class="row">
                    <div class="col-md-6">
                        <a type="button" href="{{ route('adminEdit',$users->id)}}"  data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                        <a type="button" class="btn btn-danger" href="javascript:void()" data-href="{{ route('adminDelete', $users->id)}}"  data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-times"></i>Delete</a>
                    </div>
                </div>
            </div>
          </div>
        </div>
        @endforeach
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
