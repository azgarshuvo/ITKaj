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
      <div class="ibox">
        <div class="ibox-title">
            <h5>Category List</h5>
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
            <th>Category</th>
            <th>Sub Category</th>
            <th>Action</th>
        </tr>
        </thead>
          <tbody>
            <?php  $count = 1;
            $parent_category_id = App\Categories::where('is_parent', 1)->where('parent_category_id', 0)->orderBy('id','dsc')->get();
            ?>
            @foreach($parent_category_id as $pc)
            <tr class="gradeX">
              <td>{{$count++}}</td>
              <td>{{$pc->category_name}}</td>
              <td>
                <table class="table table-striped table-bordered table-hover table-responsive">
                  <tr>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                  <?php $sub_category = App\Categories::where('parent_category_id', $pc->id)->where('is_parent', 0)->orderBy('category_name')->get(); ?>
                  @foreach($sub_category as $sc)
                  <tr>
                    <td>{{$sc->category_name}}</td>
                    <td>
                      <a class="btn btn-sm btn-primary" href="{{ route('categoryEdit', $sc->id)}}"  data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                      <a class="btn btn-sm btn-danger" href="" data-href="{{ route('categoryDelete', $sc->id)}}"  data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-times"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </table>
              </td>
              <td class="center">
                <a class="btn btn-sm btn-primary"  href="{{ route('categoryEdit', $pc->id)}}"  data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                <a class="btn btn-sm btn-danger" href="" data-href="{{ route('categoryDelete', $pc->id)}}"  data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-times"></i></a>
              </td>
            </tr>
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
