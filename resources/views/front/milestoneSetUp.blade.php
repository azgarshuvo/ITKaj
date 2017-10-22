<?php
/**
 * Created by PhpStorm.
 * User: Polash
 * Date: 07-Oct-17
 * Time: 12:54 PM
 */

?>

@extends('layouts.front.profileMaster')

@section('title', 'Milestone Setup')

@section('content')

    <div class="breadcrumbs">
        <h2 class="title text-center bg-primary">Milestone Setup {{ $milestone->job->name }}</h2>
    </div>
    <div class="col-md-9 milestone-body">
        <p class="message_show"></p>
        @if(session()->has('message'))
            <p class="alert alert-success">
                {{ session()->get('message') }}
            </p>
        @endif
        @if (count($errors) > 0)
            <p class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br/>
                @endforeach
            </p>
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
                                        <button onclick="releaseFund({{$milestones->id.",".$milestones->fund_release}})"
                                                type="button" class="btn btn-success btn-xs" name="showButton"><i
                                                    class="fa fa-share"></i>Release
                                        </button>
                                    @elseif($milestones->status==1)
                                        <span class="bg-color-blue padding-5-8">Released</span>
                                    @else
                                        <span class="bg-color-orange padding-5-8">Transferred</span>
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
                                                        <input type="text" name="milestoneTitle" id="milestoneTitle"
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
                                                        <input type="text" name="mileStoneDeadline"
                                                               id="mileStoneDeadline" placeholder="" value=""
                                                               class="datepicker">
                                                    </label>
                                                </section>
                                                <section>
                                                    <label class="label">Deadline</label>
                                                    <label class="input">
                                                        <input type="text" name="fundRelease" id="fundRelease"
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
                                        <input type="text" name="deadline" id="deadline" placeholder=""
                                               value="{{old('deadline')}}" class="datepicker">
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <b>Fund Release</b>
                                    <label class="input">
                                        <input type="text" name="fund_release" id="fund_release" placeholder=""
                                               value="{{old('fund_release')}}">
                                    </label>
                                </section>
                            </div>
                            <input type="submit" class="btn-u" value="Add Milestone"/>
                        </form>
                    @endif
                </div>
        </div>
    </div>
        <!--=== Job Description ===-->

        <!--=== End Job Description ===-->
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

            function releaseFund(id, releaseAmount) {
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
                    })
                    .fail(function (response) {
                        var error = "<p class='alert alert-danger'>Milestone release doesn't complete</p>"
                        $('.message_show').html(error);
                    });

            }

            $(document).ready(function () {
                $(aId + ' .panel-collapse.in').collapse('hide');

                $(".toggle-accordion").on("click", function () {
                    var accordionId = $(this).attr("accordion-id"),
                        numPanelOpen = $(accordionId + ' .collapse.in').length;

                    $(this).toggleClass("");

                    if (numPanelOpen == 0) {
                        openAllPanels(accordionId);
                    } else {
                        closeAllPanels(accordionId);
                    }
                })

                openAllPanels = function (aId) {
                    console.log("setAllPanelOpen");
                    $(aId + ' .panel-collapse:not(".in")').collapse('show');
                }
                closeAllPanels = function (aId) {
                    console.log("setAllPanelclose");
                    $(aId + ' .panel-collapse.in').collapse('hide');
                }

            });

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

                    })
            }
        </script>
@endsection

