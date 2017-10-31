<?php
/**
 * Created by PhpStorm.
 * User: Polash
 * Date: 31-Oct-17
 * Time: 01:27 PM
 */
?>

@extends('layouts.admin.master')

@section('title', 'Add Exam')

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
                <h5>Add Admin</h5>
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
            <div class="ibox-content wizard-card">
                <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div id="ansOption">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Question</label>
                        <div class="col-lg-10"><input type="text" name="question" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Currect Answer</label>
                        <div class="col-lg-10"><input type="text" name="question" class="form-control">
                        </div>
                    </div>
                    <div  class="form-group">
                        <label class="col-lg-2 control-label">Other Answer List</label>
                        <div class="col-lg-10">
                            <input type="text" name="answare[]" class="form-control">
                        </div>
                    </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-6">
                            <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                            <button onclick="addAnsware()" class="btn btn-sm btn-success" type="button">Add+</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function addAnsware(){
            var row = ' <div class="form-group">\n' +
                '                        <div class="col-lg-10 col-lg-offset-2">\n' +
                '                            <input type="text" name="answare[]" class="form-control">\n' +
                '                        </div>\n' +
                '                    </div>';
           $("#ansOption").append(row);
        }
    </script>
@endsection


