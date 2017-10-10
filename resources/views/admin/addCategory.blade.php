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
      <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Add Admin</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <form class="form-horizontal">
                <div class="form-group">
                    <label class="col-lg-2 control-label">Category Name</label>
                    <div class="col-lg-10"><input type="text" name="category_name" placeholder="Category Name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Parent Category</label>
                    <div class="col-lg-10"><input type="text" name="parent_category" placeholder="Parent Category" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-2">
                        <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                    </div>
                    <div class="col-lg-2">
                        <button class="btn btn-sm btn-white" type="reset">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
