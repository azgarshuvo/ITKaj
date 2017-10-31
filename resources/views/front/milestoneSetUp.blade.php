<?php
/**
 * Created by PhpStorm.
 * User: Polash
 * Date: 07-Oct-17
 * Time: 12:54 PM
 */
//dd($milestone->job);
?>

@extends('layouts.front.profileMaster')

@section('title', 'Milestone Setup')

@section('content')

    @if($milestone->job != null && $milestone->job != '')
        <div class="breadcrumbs">
            <h2 class="title text-center bg-primary">Milestone Setup {{$milestone->job->name }}</h2>
        </div>
    @endif
    <div class="col-md-9 milestone-body">
        <p class="message_show"></p>
        @if(session()->has('message'))
            <p class="alert alert-success">
                {{ session()->get('message') }}
            </p>
        @endif
        @if(session()->has('success'))
            <p class="alert alert-success">
                {{ session()->get('success') }}
                <?php \Illuminate\Support\Facades\Session::forget('success')?>
            </p>
        @endif
        @if(session()->has('error'))
            <p class="alert alert-success">
                {{ session()->get('error') }}
                <?php \Illuminate\Support\Facades\Session::forget('error')?>
            </p>
        @endif

        @if (count($errors) > 0)
            <p class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br/>
                @endforeach
            </p>
        @endif


        <p class="alert" id="milestoneAcceptDeniRequest"></p>
        @if($milestone != null && $milestone != '')
            @if(intval($milestone->contact_status) == 1)
                <p class="alert alert-success">Contact End, Project Successfully Done</p>
            @elseif(intval($milestone->contact_status) == 3)
                    <p class="alert alert-success">Project Done Request Accept</p>
            @elseif(intval($milestone->contact_status) == 4)
                    <p class="alert alert-success">Project Done Request Deny</p>
            @elseif(intval($milestone->contact_status) == 2)
                <div class="col-md-12">
                    <button class="btn-u btn-u-lg rounded btn-u-aqua" type="button" onclick="acceptProjectDoneRequest({{$milestone->id.','. "true"}})">Accept Project Done Request</button>
                    <button class="btn-u btn-u-lg rounded btn-u-red" type="button" onclick="acceptProjectDoneRequest({{$milestone->id.','. "false"}})">Deny Project Done Request</button>
                </div>
            @endif
        @endif
        <div class="clearfix"></div>
        <div class="col-md-12">
            @if($milestone->millstone)
                <div>
                    <table id="milstone_table"
                           class="table table-striped table-bordered table-hover table-condensed margin-top-20">
                        <thead>
                        <tr>
                            <th class="text-center">SL</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Dead Line</th>
                            <th class="text-center">Fund</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; $fund = 0; ?>
                        @foreach($milestone->millstone as $milestones )
                            <?php $fund += $milestones->fund_release; ?>
                            <tr class="milestoneRow_{{$milestones->id}}">
                                <td class="text-center">{{$i++}}</td>
                                <td class="text-center milstoneTitle{{$milestones->id}}">{{$milestones->milestone_title}}</td>
                                <td class="text-cente milestoneDescription{{$milestones->id}}">{{$milestones->milestone_description}}</td>
                                <td class="text-center date-format milestoneDeadline{{$milestones->id}}">{{$milestones->deadline}}</td>
                                <td class="text-center melestoneFund{{$milestones->id}}">{{$milestones->fund_release}}</td>
                                <td class="text-center {{$milestones->id."_release_status"}}">
                                    @if($milestones->status==0)
                                        <button onclick="releaseFund({{$milestones->id.",".$milestones->fund_release.",". $milestone->job_id}})"
                                                type="button" class="btn btn-success btn-xs" name="showButton"><i
                                                    class="fa fa-share"></i>Release
                                        </button>
                                    @elseif($milestones->status==1)
                                        <span class="bg-color-blue padding-5-8">Released</span>
                                    @elseif($milestones->status==2)
                                        <span class="label label-success">Milestone Done And Fund transferred to Freelancer</span>
                                    @elseif($milestones->status==3)
                                        <button class="btn-u btn-u-blue" type="button" onclick="acceptDeniMilestoneDoneRequest({{$milestones->id.','."true"}})">Accept Done Request</button>
                                        <button class="btn btn-w-m btn-danger" type="button" onclick="acceptDeniMilestoneDoneRequest({{$milestones->id.','."false"}})">Deni Done Request</button>
                                    @elseif($milestones->status==4)
                                        <span class="label label-success">Milestone Done</span>
                                    @elseif($milestones->status==5)
                                        <span class="label label-danger">Milestone Done Deni</span>
                                    @endif
                                </td>
                                <td class="action-col">
                                    <button onclick="modalOpen({{$milestones->id.",'".$milestones->milestone_title."','".$milestones->milestone_description."','".$milestones->deadline."','".$milestones->fund_release."',".$milestones->contact_id}})"
                                            class="btn btn-warning"><i class="fa fa-edit"></i></button>
                                    <button onclick="deleteMilestone({{$milestones->id}})" class="btn btn-danger"><i class="fa fa-times"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{--This button for confirm modal--}}
                    <button id="deleteModal" data-toggle="modal" data-target="#confirm" type="button"  class="hidden"></button>
                    {{--modal body start--}}
                    <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        &times;
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel4">Confirmation Message</h4>
                                </div>
                                <div class="modal-body text-right">
                                    <h3>Are you sure to delete this milestone?</h3>
                                    <input id="dropId" type="hidden">
                                </div>
                                <div class="modal-footer">
                                    <button id="btn-close" data-dismiss="modal" aria-hidden="true" type="button" class="btn btn-default">Cancle</button>
                                    <button onclick="deleteMilestonebyID()" type="button" class="btn btn-danger">Yes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--Modal body end--}}

                    {{--This button for open modal--}}
                    <button id="modalClick" data-toggle="modal" data-target="#responsive" type="button"
                            class="hidden"></button>
                    {{--modal body start--}}
                    <div class="modal fade" id="responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        &times;
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel4">Apply form</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <p class="displayUpdateinfo">

                                        </p>
                                        <form enctype="multipart/form-data" method="post" id="sky-form5"
                                              class="sky-form">
                                            {{csrf_field()}}
                                            <input type="hidden" name="milestoneID" id="milestoneID">
                                            <input type="hidden" name="contact_id" id="contact_id">
                                            <input type="hidden" name="job_id" id="job_id"
                                                   value="{{$milestone->job->id}}">
                                            <fieldset>
                                                <section>
                                                    <label class="label">Title</label>
                                                    <label class="input">
                                                        <input autocomplete="off" type="text" name="milestoneTitle" id="milestoneTitle"
                                                               placeholder="" value="" class="">
                                                    </label>
                                                </section>
                                                <section>
                                                    <label class="label">Description</label>
                                                    <label class="textarea">
                                                        <textarea id="mileStoneDescription" rows="4"
                                                                  name="mileStoneDescription"></textarea>
                                                    </label>
                                                </section>
                                                <section>
                                                    <label class="label">Deadline</label>
                                                    <label class="input">
                                                        <i class="icon-append fa fa-calendar"></i>
                                                        <input autocomplete="off" type="text" name="mileStoneDeadline"
                                                               id="mileStoneDeadline" placeholder="" value=""
                                                               class="datepicker">
                                                    </label>
                                                </section>
                                                <section>
                                                    <label class="label">Deadline</label>
                                                    <label class="input">
                                                        <input autocomplete="off" type="text" name="fundRelease" id="fundRelease"
                                                               placeholder="" value="" class="hasDatepicker">
                                                    </label>
                                                </section>
                                            </fieldset>
                                            <div class="modal-footer">
                                                <button onclick="mileStoneUpdate()" type="button"
                                                        class="btn-u btn-u-primary">Milestone Update
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--Modal body end--}}
                    @endif
                    @if(intval($milestone->contact_status) == 0)
                        @if($milestone->job->project_cost>$fund)
                            <form action="{{route('postSetupMilestone',['job_id'=>$milestone->job->id])}}" method="post"
                                  enctype="multipart/form-data" class="sky-form">
                                {{csrf_field()}}
                                <div class="row">
                                    <section class="col col-md-12">
                                        <label class="input"> Milestone Title
                                            <input value="{{old('milestone_title')}}" autocomplete="off"
                                                   class="form-control" type="text" id="milestone_title"
                                                   name="milestone_title" placeholder="">
                                        </label>
                                    </section>
                                </div>

                                <div class="">
                                    <label class="textarea">
                                        Description
                                        <textarea rows="5" id="description" name="description"
                                                  placeholder="">{{old('description')}}</textarea>
                                    </label>
                                </div>

                                <div class="row">

                                    <section class="col col-6">
                                        <b>Deadline</b>
                                        <label class="input">
                                            <i class="icon-append fa fa-calendar"></i>
                                            <input autocomplete="off" type="text" name="deadline" id="deadline" placeholder=""
                                                   value="{{old('deadline')}}" class="datepicker">
                                        </label>
                                    </section>
                                    <section class="col col-6">
                                        <b>Fund Release</b>
                                        <label class="input">
                                            <input autocomplete="off" type="text" name="fund_release" id="fund_release" placeholder=""
                                                   value="{{old('fund_release')}}">
                                        </label>
                                    </section>
                                </div>
                                <input type="submit" class="btn-u" value="Add Milestone"/>
                            </form>
                        @endif
                    @endif
                </div>
        </div>
    </div>
<input type="hidden" value="{{route('milestoneDoneRequestByEmployer')}}" id="milestoneDoneRequestByEmployer">
<input type="hidden" value="{{route('contactDoneRequestByEmployer')}}" id="contactDoneRequestByEmployer">
        <script type="text/javascript">
            /*Delete milestone by id*/
            function deleteMilestonebyID(){
                var dropID = $("#dropId").val();

                $.post("{{route('deleteMilestone')}}",
                    {
                        _token: '{{csrf_token()}}',
                        dropID: dropID
                    },

                    function (data, status) {
                        if (!$.trim(data)) {
                            var mess = "<p class='alert alert-success'>Milestone Delete Success</p>";
                            $('.message_show').html(mess);
                            $(".milestoneRow_"+dropID).toggle();
                        }
                        else {
                            $('.message_show').html(data);
                        }

                    })
                    .fail(function (response) {
                        var error = "<p class='alert alert-danger'>Milestone delete failed</p>"
                        $('.message_show').html(error);


                    });
                $('#btn-close').click();
            }
            /*set input type hidden value to this id and confirm modal show*/
            function deleteMilestone(id){
                $("#deleteModal").click();
                $("#dropId").val(id);
            }

            function releaseFund(id, releaseAmount, jobId) {
                $("#loader").addClass("loading");
                $.post("{{route('releaseFund')}}",
                    {
                        _token: '{{csrf_token()}}',
                        milestone_id: id,
                        release_amount: releaseAmount
                    },

                    function (data, status) {
                        var error = "<p class='alert alert-success'>Milestone release success</p>"
                        $('.message_show').html(error);
                        $("." + id + "_release_status").html('<span class="bg-color-blue padding-5-8">Released</span>');

                        $.redirect('{{route("paypal")}}', {'amount': releaseAmount, 'jobId': jobId,  '_token': '{{ csrf_token()}}'});

                    })
                    .fail(function (response) {
                        var error = "<p class='alert alert-danger'>Milestone release doesn't complete</p>"
                        $('.message_show').html(error);
                    });

            }



            function modalOpen(id, title, description, deadline, fund, contact_id) {
                $('.displayUpdateinfo').html("");
                $("#modalClick").click();
                $("#milestoneID").val(id);
                $("#milestoneTitle").val(title);
                $("#mileStoneDescription").val(description);
                $("#mileStoneDeadline").val(deadline);
                $("#fundRelease").val(fund);
                $("#contact_id").val(contact_id);
            }

            function mileStoneUpdate() {
                $("#loader").addClass("loading");
                var id = $("#milestoneID").val();
                var title = $("#milestoneTitle").val();
                var description = $("#mileStoneDescription").val();
                var deadline = $("#mileStoneDeadline").val();
                var fundrelease = $("#fundRelease").val();
                var contact_id = $("#contact_id").val();
                var job_id = $("#job_id").val();

                $.post("{{route('updateMilestone')}}",
                    {
                        _token: '{{csrf_token()}}',
                        id: id,
                        title: title,
                        description: description,
                        deadline: deadline,
                        fundrelease: fundrelease,
                        contact_id: contact_id,
                        job_id: job_id
                    },

                    function (data, status) {
                        if (!$.trim(data)) {
                            var mess = "<p class='alert alert-success'>Milestone update success</p>";
                            $('.displayUpdateinfo').html(mess);
                            $(".milstoneTitle" + id).text(title);
                            $(".milestoneDescription" + id).text(description);
                            $(".milestoneDeadline" + id).text(deadline);
                            $(".melestoneFund" + id + "").text(fundrelease);
                        }
                        else {
                            $('.displayUpdateinfo').html(data);
                        }
                        $("#loader").removeClass("loading");
                    })
            }

            function acceptDeniMilestoneDoneRequest(milestoneId, status){
                var URL = $('#milestoneDoneRequestByEmployer').val();
                $.ajax({
                    method: "POST",
                    url: URL,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: { milestoneId: milestoneId, status:status },
                    success: function(data){
                        if(date = 'true'){
                            $('#milestoneAcceptDeniRequest').addClass('alert-success');
                            $('#milestoneAcceptDeniRequest').show(100, function(){
                                $(this).text('Milestone Accept Request Send');
                            });
                            $('#milestoneRequestMessage').delay(3000).fadeOut(300);
                            location.reload();
                        }else if(data = 'false'){
                            $('#milestoneAcceptDeniRequest').addClass('alert-denger');
                            $('#milestoneAcceptDeniRequest').show(100, function(){
                                $(this).text('Milestone Done Request Send fail');
                            });
                            $('#milestoneAcceptDeniRequest').delay(3000).fadeOut(300);
                            location.reload();
                        }
                    }
                });
            }

            function acceptProjectDoneRequest(contactId, status){
                var URL = $("#contactDoneRequestByEmployer").val();

                $.ajax({
                    method: "POST",
                    url: URL,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: { contactId: contactId, status: status},
                    success: function(data){
//                        console.log(data);
                        location.reload();
                    }
                });
            }

        </script>
@endsection

