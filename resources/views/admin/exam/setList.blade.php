<?php
/**
 * Created by PhpStorm.
 * User: Polash
 * Date: 31-Oct-17
 * Time: 03:03 PM
 */
?>
@extends('layouts.admin.master')

@section('title', 'View Set List')

@section('content')
    <div class="wrapper wrapper-content">
        <div class="message_show"></div>
        @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="ibox float-e-margins">
            <!-- Exam list -->
            @if(!empty($setList))
                <div class="ibox-title">
                    <h5>Question Set List</h5>
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
                            <th>Exam Name</th>
                            <th>Description</th>
                            <th>Time</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php  $count = 1; ?>
                        @foreach($setList as $questionSet)
                            <tr class="gradeX row_{{$questionSet->id}}">
                                <td>{{$count++}}</td>
                                <td id="examName{{$questionSet->id}}">{{$questionSet->name}}</td>
                                <td id="examDescription{{$questionSet->id}}">{{$questionSet->description}}</td>
                                <td id="time{{$questionSet->id}}">{{$questionSet->time}}</td>
                                <td class="center">
                                    <a href="{{route('addQuestion',['quesSetId'=>$questionSet->id])}}" class="btn btn-sm btn-primary"  data-toggle="tooltip" title="Add Question to {{$questionSet->name}}"><i class="fa fa-plus"></i></a>
                                    <a href="{{route('questionList',['quesSetId'=>$questionSet->id])}}" class="btn btn-sm btn-primary"  data-toggle="tooltip" title="Question List of {{$questionSet->name}}"><i class="fa fa-list-alt"></i></a>
                                    <button class="btn btn-sm btn-primary" onclick="updateExam({{$questionSet->id}})"  data-toggle="tooltip" title="{{$questionSet->name}} Exam Edit"><i class="fa fa-edit"></i></button>
                                    <button  class="btn btn-sm btn-danger" onclick="openDeleteModal({{$questionSet->id}})"  data-toggle="tooltip" title="{{$questionSet->name}} Exam Delete"><i class="fa fa-times" ></i></button>

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
                            <h4 class="modal-title">Delete Question Set</h4>

                        </div>
                        {{--Edit Form Start--}}
                        <div class="modal-body">
                            <h3>Are you want to delete the Question Set???</h3>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white close-modal" data-dismiss="modal">Cancel</button>
                            <button type="button" onclick="DeleteExam()" class="btn btn-danger">Yes</button>
                        </div>
                        {{--Edit form End--}}
                        {{--Delete Modal Body End--}}



                        {{--Modal button start--}}
                        <button type="button" id="openModal" class="hidden" data-toggle="modal" data-target="#myModal">
                            Launch demo modal
                        </button>
                        {{--Modal button end--}}

                        {{--Modal body Start Here--}}
                        <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        {{--<i class="fa fa-laptop modal-icon"></i>--}}
                                        <h4 class="modal-title">Update Question Set</h4>

                                    </div>
                                    {{--Edit Form Start--}}
                                    <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            {{ csrf_field() }}
                                            <input type="hidden" id="questionSetId" value="0">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Exam Name</label>
                                                <div class="col-lg-10">
                                                    <input id="inputName" type="text" name="examName" placeholder="Exam Name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Exam Time</label>
                                                <div class="col-lg-10">
                                                    <input id="inputTime" type="text" name="examTime" placeholder="Exam Time" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Exam Description</label>
                                                <div class="col-lg-10">
                                                    <textarea id="inputDescription" class="form-control" placeholder="Exam Description" name="examDescription"></textarea>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white close-modal" data-dismiss="modal">Close</button>
                                            <button type="button" onclick="postUpdateExam()" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                    {{--Edit form End--}}
                                </div>
                            </div>
                        </div>
                        {{--Modal Body End Here--}}
                    </div>
                </div>
                <script type="text/javascript">
                    /*Open modal and set value*/
                    function updateExam(quesSetId){
                        $("#openModal").click();
                        var examName = $("#examName"+quesSetId+"").text();
                        var description = $("#examDescription"+quesSetId+"").text();
                        var time = $("#time"+quesSetId+"").text();
                        $("#inputName").val(examName);
                        $("#inputTime").val(time);
                        $("#inputDescription").val(description);
                        $("#questionSetId").val(quesSetId);

                    }

                    /*Send Ajax Request to update exam*/
                    function postUpdateExam(){
                        $("#loader").addClass("loading");
                        var name = $("#inputName").val();
                        var description =$("#inputDescription").val();
                        var quesSetId = $("#questionSetId").val();
                        var time = $("#inputTime").val();

                        $.ajax({
                            type:'POST',
                            url:'{{route('updateSet')}}',

                            data:{'_token': '<?php echo csrf_token() ?>','name':name,'time':time,'description':description,'quesSetId':quesSetId},
                            success:function(data){
                                $(".close-modal").click();
                                if (!$.trim(data)) {
                                    var message = '<div class="alert alert-success">Question Set Update Success</div>';
                                    $(".message_show").html(message);

                                    $("#examName"+quesSetId+"").text(name);
                                    $("#examDescription"+quesSetId+"").text(description);
                                    $("#time"+quesSetId+"").text(time);
                                }
                                else {
                                    $(".message_show").html(data);
                                }
                                $("#loader").removeClass("loading");
                            }
                        });
                    }

                    /*opent delte alert Modal*/
                    function openDeleteModal(quesSetId){
                        $("#openModalDelete").click();
                        $("#questionSetId").val(quesSetId);
                    }

                    /*Delte exam by ajax request*/
                    function DeleteExam(){
                        var quesSetId = $("#questionSetId").val();
                        $.ajax({
                            type:'POST',
                            url:'{{route('setDelete')}}',

                            data:{'_token': '<?php echo csrf_token() ?>','quesSetId':quesSetId},
                            success:function(data){
                                $(".close-modal").click();
                                var message = '<div class="alert alert-success">Question Set Delete Success</div>';
                                $(".message_show").html(message);
                                $("#examName"+quesSetId+"").parent().hide('slow');
                            }
                        });

                    }
                </script>
@endsection

