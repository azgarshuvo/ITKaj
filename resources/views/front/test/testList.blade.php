<?php
/**
 * Created by PhpStorm.
 * User: Polash
 * Date: 01-Nov-17
 * Time: 11:58 AM
 */
?>
@extends('layouts.front.master')

@section('title', 'Test List')

@section('content')
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Exam List</h1>
        </div><!--/container-->
    </div><!--/breadcrumbs-->

    <div class="container content-sm">
        <!-- Begin Table Search Panel v1 -->
        <div class="table-search-v1 panel panel-dark margin-bottom-50" >
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-globe"></i>Exam List</h3>
            </div>
            <div class="panel-body">

                <table id="examDataTable" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Exam Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Exam Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @if($examList)
                        @foreach($examList as $exam)
                            <tr>
                                <td>{{$exam->name}}</td>
                                <td>{{$exam->description}}</td>
                                <td>
                                    {{--<a href="{{route('examInfo', ['examId' => $exam->id])}}" >--}}
                                    <a href="{{route('setList', ['examId' => $exam->id])}}" >
                                        <button type="button" class="btn btn-success btn-xs" name="showButton">
                                            <i class="fa fa-share"></i> Show</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!-- End Table Search Panel v1 -->
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#examDataTable').DataTable();
        } );

        $('#examSearch').on('keyup', function(){
            var search = $('#examSearch').val();
            $('input[type=search]').val(search);
        });
    </script>
@endsection
