<?php
/**
 * Created by PhpStorm.
 * User: Polash
 * Date: 31-Oct-17
 * Time: 03:03 PM
 */
?>
@extends('layouts.admin.master')

@section('title', 'View Exam List')

@section('content')
    <div class="wrapper wrapper-content">
        <div class="message_show"></div>
        @if(Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach()
            </div>
        @endif
        <div class="ibox float-e-margins">
            <!-- Job list -->
            @if(!empty($questionList))
                <div class="ibox-title">
                    <h5>Total Question: {{$questionList->count()}}</h5>
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
                            <th>Question</th>
                            <th>Right Answer</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php  $count = 1; ?>
                        @foreach($questionList as $question)
                            <tr class="gradeX row_{{$question->id}}">
                                <td>{{$count++}}</td>
                                <td id="questionName{{$question->id}}">{{$question->question}}</td>
                                <td id="rightAnswer{{$question->id}}">{{$question->right_answer}}</td>
                                <td class="center text-center">
                                    <button class="btn btn-sm btn-primary" onclick="updateQuestion({{$question->id}})"  data-toggle="tooltip" title="{{$question->name}} Exam Edit"><i class="fa fa-edit"></i></button>
                                    <button  class="btn btn-sm btn-danger" onclick="openDeleteModal({{$question->id}})"  data-toggle="tooltip" title="{{$question->name}} Exam Delete"><i class="fa fa-times" ></i></button>


                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
            {{--Delete Modal button start--}}
            <button type="button" id="openModalDelete" class="hidden" data-toggle="modal" data-target="#deleteModal">
                Launch demo modal
            </button>
            {{--Delete Modal button end--}}

            {{--Delete Modal Body Start--}}
            <div class="modal inmodal" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            {{--<i class="fa fa-laptop modal-icon"></i>--}}
                            <h4 class="modal-title">Update Exam</h4>

                        </div>
                        {{--Edit Form Start--}}
                        <div class="modal-body">
                            <h3>Are you want to delete the question???</h3>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white close-modal" data-dismiss="modal">Cancel</button>
                            <button type="button" onclick="DeleteExam()" class="btn btn-danger">Yes</button>
                        </div>
                        {{--Edit form End--}}
                        {{--Delete Modal Body End--}}



                        {{--Modal button start--}}
                        <button type="button" id="openModal" class="hidden" data-toggle="modal" data-target="#myModal">
                            Launch modal
                        </button>
                        {{--Modal button end--}}

                        {{--Modal body Start Here--}}
                        <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        {{--<i class="fa fa-laptop modal-icon"></i>--}}
                                        <h4 class="modal-title">Update Question And Answer</h4>

                                    </div>
                                    {{--Edit Form Start--}}
                                    <form class="form-horizontal" action="{{route('updateQuestion')}}" method="post" enctype="multipart/form-data">
                                        <div id="appendForm" class="modal-body">
                                            {{ csrf_field() }}
                                            <input name="questionId" type="hidden" id="questionIdhidden" value="0">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Question</label>
                                                <div class="col-lg-10">
                                                    <input id="inputName" type="text" name="questionName" placeholder="Exam Name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Right Answer</label>
                                                <div class="col-lg-10">
                                                    <input type="text" id="inputDescription" class="form-control" placeholder="Exam Description" name="rightAnswer">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white close-modal" data-dismiss="modal">Close</button>
                                            <button type="button" onclick="addAnsRow()" class="btn btn-success">Add Field</button>
                                            <input type="submit"  class="btn btn-primary" value="Update">
                                        </div>
                                    </form>
                                    {{--Edit form End--}}
                                </div>
                            </div>
                        </div>
                        {{--Modal Body End Here--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">

        /*Get anser list of question*/
        function getAnswerList(questionId){
            $.ajax({
                type:'POST',
                url:'{{route('answerList')}}',

                data:{'_token': '<?php echo csrf_token() ?>','questionId':questionId },
                success:function(data){
                   $('#appendForm').append(data);
                }
            });
        }

        /*Open modal and set value*/
        function updateQuestion(questionId){
            $('.old-data').remove();
            getAnswerList(questionId);
            $("#openModal").click();
            var questionName = $("#questionName"+questionId+"").text();
            var description = $("#rightAnswer"+questionId+"").text();

            $("#inputName").val(questionName);
            $("#inputDescription").val(description);
            $("#questionIdhidden").val(questionId);

        }

        /*Add answer row*/
        function addAnsRow(){
            var row = '<div class="form-group old-data"><div class="col-lg-10 col-lg-offset-2">\n' +
                '                <input id="inputName"  type="text" name="answer[]" class="form-control">\n' +
                '                </div></div>';
            $('#appendForm').append(row);
        }



        /*opent delte alert Modal*/
        function openDeleteModal(questionId){
            $("#openModalDelete").click();
            $("#questionIdhidden").val(questionId);
        }
        /*Delete question*/
        function DeleteExam(){
           var questionId = $("#questionIdhidden").val();
            $.ajax({
                type:'POST',
                url:'{{route('deleteQuestion')}}',

                data:{'_token': '<?php echo csrf_token() ?>','questionId':questionId },
                success:function(data){
                    $(".close-modal").click();
                    var message = '<div class="alert alert-success">Question Delete Success</div>';
                    $(".message_show").html(message);
                    $("#questionName"+questionId+"").parent().hide('slow');;
                }
            });
        }

    </script>
@endsection

