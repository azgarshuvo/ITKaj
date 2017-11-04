<?php
/**
 * Created by PhpStorm.
 * User: polash
 * Date: 31-Oct-17
 * Time: 11:51 AM
 */
?>
@extends('layouts.admin.master')

@section('title', 'Add set')

@section('content')
    <div class="wrapper wrapper-content">
        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible " role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Add set</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content wizard-card">

                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach()
                    </div>
                @endif
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <form autocomplete="off" class="form-horizontal" action="{{route('postAddset')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{$examId}}" name="examId">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Set Name</label>
                        <div class="col-lg-10"><input type="text" name="setName" placeholder="Set Name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Time</label>
                        <div class="col-lg-10">
                            <input type="text" name="setTime" placeholder="Set Name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Set Description</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" placeholder="Set Description" name="setDescription"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

