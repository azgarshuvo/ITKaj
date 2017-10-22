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
                                        <span class="bg-color-blue padding-5-8">Released</span>
                                    @else
                                        <span class="bg-color-orange padding-5-8">Transferred</span>
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
    <!--=== Job Description ===-->

    <!--=== End Job Description ===-->
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
    </script>
@endsection
