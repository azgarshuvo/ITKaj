<?php
/**
 * Created by PhpStorm.
 * User: shuvo
 * Date: 10/17/2017
 * Time: 11:10 PM
 */
?>
@extends('layouts.admin.master')

@section('title', 'Add Skill')

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
                <h5>Add Skill</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>

            <div class="ibox-content">
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach()
                    </div>
                @endif
                <form class="form-horizontal" action="{{route('skillInsert')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Skill Name</label>
                        <div class="col-lg-10"><input type="text" name="name" placeholder="Skill Name" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Description</label>
                        <div class="col-lg-10"><textarea class="form-control" rows="3" name="description" placeholder="Write Something About Yours"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-2">
                            <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

