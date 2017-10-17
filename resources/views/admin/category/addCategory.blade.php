<?php
/**
 * Created by PhpStorm.
 * User: zakariya
 * Date: 09-Oct-17
 * Time: 2:19 PM
 */
?>
@extends('layouts.admin.master')

@section('title', 'Add Category')

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
            <h5>Add Category</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>
        @if($errors->any())
            <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach()
            </div>
        @endif
        <div class="ibox-content">
            <form class="form-horizontal" action="{{'insertCategory'}}" method="post">
              {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-lg-2 control-label">Category Name</label>
                    <div class="col-lg-10"><input type="text" name="category_name" placeholder="Category Name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Is parent category?</label>
                  <label class="checkbox-inline">
                    <input type="radio" value="1" name="is_parent" onclick="yesnoCheck(this);" id="yesCheck"> Yes
                  </label>
                  <label class="checkbox-inline">
                    <input type="radio" value="0" name="is_parent" onclick="yesnoCheck(this);" id="yesCheck"> No
                  </label>
                </div>
                @if(!empty($items))
                <div class="form-group" id="ifYes" style="display:none;">
                    <label class="col-lg-2 control-label">Parent Category</label>
                    <div class="col-lg-10">
                      <select class="form-control" name="parent_category_id" id="mySelect">
                        @foreach($items as $item)
                        <option value="{{$item->id}}">{{$item->category_name}}</option>
                        @endforeach
                      </select>
                    </div>
                </div>
                @endif
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
