<?php
/**
 * Created by PhpStorm.
 * User: Polash
 * Date: 01-Nov-17
 * Time: 11:58 AM
 */
//dd($resultData);
?>
@extends('layouts.front.master')

@section('title', 'Exam Info')

@section('content')
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Exam Information</h1>
        </div><!--/container-->
    </div><!--/breadcrumbs-->

    <div class="container content-sm">
        @if($examInfo)
            <table class="table table-bordered table-responsive table-hover">
                <tr>
                    <td>
                        Exam Name
                    </td>
                    <td>
                        {{$examInfo->name}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Exam Description
                    </td>
                    <td>
                        {{$examInfo->description}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Total Question
                    </td>
                    <td>
                        {{$examInfo->question->count()}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Right Answer
                    </td>
                    <td>
                        {{$resultData['right_ans']}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Wrong Answer
                    </td>
                    <td>
                        {{$resultData['wrong_ans']}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Result
                    </td>
                    <td>
                       {{$resultData['result']}}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="text-center">
                            <a href="{{route('ExamList')}}" class="btn btn-success margin-9">Back to Test List</a>
                        </div>
                    </td>
                </tr>
            </table>
        @endif
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {

        } );

        $('#examSearch').on('keyup', function(){
            var search = $('#examSearch').val();
            $('input[type=search]').val(search);
        });
    </script>
@endsection
