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
        @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="ibox float-e-margins">
            <!-- Job list -->
            @if(!empty($examList))
                <div class="ibox-title">
                    <h5>Job List</h5>
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
                        @foreach($examList as $exam)
                            <tr class="gradeX row_{{$exam->id}}">
                                <td>{{$count++}}</td>
                                <td id="examName{{$exam->id}}">{{$exam->name}}</td>
                                <td id="examDescription{{$exam->id}}">{{$exam->description}}</td>
                                <td id="time{{$exam->id}}">{{$exam->time}}</td>
                                <td class="center">
                                    <a href="{{route('addQuestion',['examId'=>$exam->id])}}" class="btn btn-sm btn-primary"  data-toggle="tooltip" title="Add Question"><i class="fa fa-plus"></i></a>
                                    <button class="btn btn-sm btn-primary" onclick="updateExam({{$exam->id}})"  data-toggle="tooltip" title="Exam Edit"><i class="fa fa-edit"></i></button>
                                    <button  class="btn btn-sm btn-danger" onclick="openDeleteModal({{$exam->id}})"  data-toggle="tooltip" title="Exam Delete"><i class="fa fa-times" ></i></button>

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
                               <h3>Are you want to delete the exam???</h3>


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
                            <h4 class="modal-title">Update Exam</h4>

                        </div>
                        {{--Edit Form Start--}}
                        <form class="form-horizontal" action="{{route('postAddExam')}}" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                                {{ csrf_field() }}
                            <input type="hidden" id="examIdhidden" value="0">
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
       function updateExam(examId){
           $("#openModal").click();
           var examName = $("#examName"+examId+"").text();
           var description = $("#examDescription"+examId+"").text();
           var time = $("#time"+examId+"").text();
           $("#inputName").val(examName);
           $("#inputTime").val(time);
           $("#inputDescription").val(description);
           $("#examIdhidden").val(examId);

       }

       /*Send Ajax Request to update exam*/
       function postUpdateExam(){
           $("#loader").addClass("loading");
           var name = $("#inputName").val();
           var description =$("#inputDescription").val();
           var examId = $("#examIdhidden").val();
           var time = $("#inputTime").val();

           $.ajax({
               type:'POST',
               url:'{{route('examUpdate')}}',

               data:{'_token': '<?php echo csrf_token() ?>','name':name,'time':time,'description':description,'examId':examId},
               success:function(data){
                   $(".close-modal").click();
                   if (!$.trim(data)) {
                       var message = '<div class="alert alert-success">Exam Update Success</div>';
                       $(".message_show").html(message);

                       $("#examName"+examId+"").text(name);
                       $("#examDescription"+examId+"").text(description);
                       $("#time"+examId+"").text(time);
                   }
                   else {
                       $(".message_show").html(data);
                   }
                   $("#loader").removeClass("loading");
               }
           });
       }

       /*opent delte alert Modal*/
        function openDeleteModal(examId){
            $("#openModalDelete").click();
            $("#examIdhidden").val(examId);
        }

        /*Delte exam by ajax request*/
        function DeleteExam(){
            var examId = $("#examIdhidden").val();
            $.ajax({
                type:'POST',
                url:'{{route('examDelete')}}',

                data:{'_token': '<?php echo csrf_token() ?>','examId':examId},
                success:function(data){
                    $(".close-modal").click();
                    var message = '<div class="alert alert-success">Exam Delete Success</div>';
                    $(".message_show").html(message);
                    $("#examName"+examId+"").parent().hide('slow');;

                }
            });

        }
    </script>
@endsection

