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
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach()
                </div>
            @endif
        @if($setDetails)
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Add Question for {{$setDetails->name}} Exam</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>

            <div class="ibox-content wizard-card">
                <form class="form-horizontal" action="{{route('postQuestion')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <input type="hidden" name="questionSetId" value="{{$setDetails->id}}">
                    <div id="addQuestion">
                        <div class="answer" id="ansOption1">
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Question</label>
                                <div class="col-lg-10"><input type="text" name="question" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Right Answer</label>
                                <div class="col-lg-10"><input type="text" name="rightAnswer" class="form-control">
                                </div>
                            </div>
                            <div  class="form-group">
                                <label class="col-lg-2 control-label">Other Answer List</label>
                                <div class="col-lg-10">
                                    <input type="text" name="answer[]" class="form-control">
                                </div>
                            </div>
                        </div>
                        {{--<div  class="form-group">
                            <label class="col-lg-2 control-label">Add Answare</label>
                            <div class="col-lg-10">
                                <button onclick="addAnsware(1)" type="button" class="btn btn-default">Add</button>
                            </div>
                        </div>--}}
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-6">
                            <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                            <button onclick="addAnsware(1)" class="btn btn-sm btn-success" type="button">Add+</button>
                            <button onclick="removeAnsware()" class="btn btn-sm btn-danger" type="button">Remove-</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        @else
            <div class="alert alert-danger">
                <h3>Sorry, No Exam Found!!!</h3>
            </div>
        @endif
    </div>
    <script>
        function removeAnsware(){
            $(".ans-opt:last").remove();
        }
        /*Add answer input field*/
        function addAnsware(id){
            var row = ' <div class="form-group ans-opt">\n' +
                '                        <div class="col-lg-10 col-lg-offset-2">\n' +
                '                            <input type="text" name="answare[]" class="form-control">\n' +
                '                        </div>\n' +
                '                    </div>';
           $("#ansOption"+id).append(row);
        }

        /*Add question row */
        function addQuestion(){


            var i=2;

            $('.answer').each(function(){
                i++;
            });

            var quesRow = '<div class="answer" id="ansOption'+i+'">\n' +
                '                            <div class="form-group">\n' +
                '                                <label class="col-lg-2 control-label">Question</label>\n' +
                '                                <div class="col-lg-10"><input type="text" name="question[]" class="form-control">\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '                            <div class="form-group">\n' +
                '                                <label class="col-lg-2 control-label">Currect Answer</label>\n' +
                '                                <div class="col-lg-10"><input type="text" name="currectAnsware[]" class="form-control">\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '                            <div  class="form-group">\n' +
                '                                <label class="col-lg-2 control-label">Other Answer List</label>\n' +
                '                                <div class="col-lg-10">\n' +
                '                                    <input type="text" name="answare[]" class="form-control">\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                        <div  class="form-group">\n' +
                '                            <label class="col-lg-2 control-label">Add Answare</label>\n' +
                '                            <div class="col-lg-10">\n' +
                '                                <button onclick="addAnsware('+i+')" type="button" class="btn btn-default">Add</button>\n' +
                '                            </div>\n' +
                '                        </div>';
            $("#addQuestion").append(quesRow);
        }
    </script>
@endsection


