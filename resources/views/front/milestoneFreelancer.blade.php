<?php
/**
 * Created by PhpStorm.
 * User: Polash
 * Date: 07-Oct-17
 * Time: 12:54 PM
 */
//dd(intval($milestone->contact_status));

?>


@extends('layouts.front.profileMaster')

@section('title', 'Milestone Setup')

@section('content')

    <div class="breadcrumbs">
        <h2 class="title text-center">Milestone of {{ $milestone->job->name }} project</h2>
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
        <p class="alert milestoneRequestMessage" >
        </p>
        @if($milestone->millstone != null && $milestone->millstone != '')
            @if(intval($milestone->contact_status) == 0 )
                @if(intval($flag) == 1)
                    <div class="col-md-12">
                        <button class="btn-u btn-u-lg rounded btn-u-aqua" type="button" onclick="projectDoneRequest({{intval($milestone->id)}})">Project Done Request</button>
                    </div>
                @endif
            @endif
            @if(intval($milestone->contact_status) == 1 )
                    <p class="alert alert-success">Contact End, Project Successfully Done</p>
            @endif
            @if(intval($milestone->contact_status) == 2 )
                    <p class="alert alert-success">Project Finish Request Send</p>
            @endif
            @if(intval($milestone->contact_status) == 3 )
                    <p class="alert alert-success">Project Done Request Accept By Employer</p>
            @endif
            @if(intval($milestone->contact_status) == 4 )
                    <p class="alert alert-success">Project Done Request Deny By Employer</p>
            @endif
        @endif
        <div class="clearfix"></div>
        <div class="col-md-12">
            @if($milestone->millstone)
                <div>
                    <table id="milstone_table" class="table table-striped table-bordered table-hover table-condensed margin-top-20">
                        <thead>
                        <tr>
                            <th class="text-center">SL</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Dead Line</th>
                            <th class="text-center">Fund</th>
                            <th class="text-center">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; $fund =0; ?>
                        @foreach($milestone->millstone as $milestones )
                            <?php $fund+=$milestones->fund_release; ?>
                            <tr>
                                <td class="text-center">{{$i++}}</td>
                                <td class="text-center">{{$milestones->milestone_title}}</td>
                                <td class="text-center">{{$milestones->milestone_description}}</td>
                                <td class="text-center">{{$milestones->deadline}}</td>
                                <td class="text-center">{{$milestones->fund_release}}</td>
                                <td class="text-center {{$milestones->id."_release_status"}}">
                                    @if($milestones->status==0)
                                        <span class="bg-color-green padding-5-8">Not Release</span>
                                    @elseif($milestones->status==1)
                                        <div class="row">
                                            <div class="col-md-5"><span class="bg-color-blue padding-5-8">Released</span></div>
                                            @if($milestones->status == 1)
                                                <div class="col-md-7 freelancerMilestoneDoneButton"><button class="btn-u btn-u-sm btn-u-dark-blue" type="button" onclick="milestoneDone({{$milestones->id}})">Finished</button></div>
                                            @endif
                                        </div>
                                    @elseif($milestones->status == 2)
                                        <span class="label label-success">Milestone Done And Fund Transferred</span>
                                    @elseif($milestones->status == 3)
                                        <span class="label label-success">Milestone Done Requested</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
<input type="hidden" value="{{route('milestoneDoneRequest')}}" id="milestoneDoneRequest">
<input type="hidden" value="{{route('contactDoneRequestByFreelancer')}}" id="contactDoneRequestByFreelancer">
    <script type="text/javascript">
        function releaseFund(id,releaseAmount){
            $.post("{{route('releaseFund')}}",
                {
                    _token: '{{csrf_token()}}',
                    milestone_id : id,
                    release_amount:releaseAmount
                },

                function(data, status) {
                    var error = "<p class='alert alert-success'>Milestone release success</p>"
                    $('.message_show').html(error);
                    $("."+id+"_release_status").html('<span class="bg-color-blue padding-5-8">Released</span>');
                })
                .fail(function(response) {
                    var error = "<p class='alert alert-danger'>Milestone release doesn't complete</p>"
                    $('.message_show').html(error);
                });

        }

        $(document).ready(function() {
            $(aId + ' .panel-collapse.in').collapse('hide');

            $(".toggle-accordion").on("click", function() {
                var accordionId = $(this).attr("accordion-id"),
                    numPanelOpen = $(accordionId + ' .collapse.in').length;

                $(this).toggleClass("");

                if (numPanelOpen == 0) {
                    openAllPanels(accordionId);
                } else {
                    closeAllPanels(accordionId);
                }
            })

            openAllPanels = function(aId) {
                console.log("setAllPanelOpen");
                $(aId + ' .panel-collapse:not(".in")').collapse('show');
            }
            closeAllPanels = function(aId) {
                console.log("setAllPanelclose");
                $(aId + ' .panel-collapse.in').collapse('hide');
            }

        });

        function milestoneDone(milestoneId){
            var URL = $("#milestoneDoneRequest").val()
            $.ajax({
                method: "POST",
                url: URL,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: { milestoneId: milestoneId },
                success: function(data){
                    if(date = 'true'){
                        $('.milestoneRequestMessage').addClass('alert-success');
                        $('.milestoneRequestMessage').show(100, function(){
                         $(this).text('Milestone Done Request Send');
                        });
                        $('.milestoneRequestMessage').delay(3000).fadeOut(300);
                        location.reload();
                    }else if(data = 'false'){
                        $('.milestoneRequestMessage').addClass('alert-denger');
                        $('.milestoneRequestMessage').show(100, function(){
                            $(this).text('Milestone Done Request Send fail');
                        });
                        $('.milestoneRequestMessage').delay(3000).fadeOut(300);
                        location.reload();
                    }
                }
            });
        }

        function projectDoneRequest(contactId){
            var URL = $('#contactDoneRequestByFreelancer').val();

            $.ajax({
                method: "POST",
                url: URL,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: { contactId: contactId },
                success: function(data){
                    location.reload();
                }
            })
        }
    </script>
@endsection

