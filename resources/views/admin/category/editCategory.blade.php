<?php
/**
 * Created by PhpStorm.
 * User: zakariya
 * Date: 09-Oct-17
 * Time: 2:19 PM
 */
 Use App\Categories;
?>
@extends('layouts.admin.master')

@section('title', 'Edit Category')

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
      @if($errors->any())
          <div class="alert alert-danger">
          @foreach($errors->all() as $error)
              <p>{{ $error }}</p>
          @endforeach()
          </div>
      @endif
      <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Edit Category</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content wizard-card">
          <form class="form-horizontal" action="{{route('categoryUpdate', $category->id)}}" method="post">
            {{ csrf_field() }}
              <div class="form-group">
                  <label class="col-lg-2 control-label">Category Name</label>
                  <div class="col-lg-10"><input type="text" name="category_name" placeholder="Category Name" value="{{ $category->category_name }}" class="form-control">
                  </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">Is have parent category?</label>
                <label class="checkbox-inline">
                  <input type="radio" value="1" name="is_parent" onclick="yesnoCheck(this);" id="yesCheck" {{($category->is_parent != "0" && $category->parent_category_id != "0") ? "checked" : ""}}> Yes
                </label>
                <label class="checkbox-inline">
                  <input type="radio" value="0" name="is_parent" onclick="yesnoCheck(this);" id="yesCheck" {{($category->is_parent == "0" && $category->parent_category_id == "0") ? "checked" : ""}}> No
                </label>
              </div>
              <div class="form-group">
                  <label class="col-lg-2 control-label">Parent Category</label>
                  <div class="col-lg-10">
                    <select class="form-control" name="parent_category_id">
                      <option value="0">Please Select</option>
                      <?php $items = Categories::where('is_parent', 0)->orderBy('category_name')->get(); ?>
                      @foreach($items as $item)
                      <option value="{{$item->id}}" {{($category->parent_category_id == $item->id  && $item->id == "$item->id") ? "selected" : ""}}>{{$item->category_name}}</option>
                      @endforeach
                    </select>
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
