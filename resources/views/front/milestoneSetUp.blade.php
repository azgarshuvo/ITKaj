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
            <div>
                <table class="table table-striped table-bordered table-hover table-condensed margin-top-20">
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
                    <?php $i=1; ?>
                    @foreach($milestone->millstone as $milestones )
                        <tr>

                            <td class="text-center">{{$i++}}</td>
                            <td class="text-center">{{$milestones->milestone_title}}</td>
                            <td class="text-center">{{$milestones->milestone_description}}</td>
                            <td class="text-center">{{$milestones->deadline}}</td>
                            <td class="text-center">{{$milestones->fund_release}}</td>
                            <td class="text-center">{{$milestones->status}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <form action="{{route('postSetupMilestone',['job_id'=>$milestone->job->id])}}" method="post" enctype="multipart/form-data" class="sky-form">
                <input type="hidden" name="_token" value="8xLi4VLcweka6RlT3fuCTocXiSQuoTH5iSodnjpr">

                    <div class="row">
                        <section class="col col-md-12">
                            <label class="input"> Milestone Title
                                <input value="{{old('milestone_title')}}" autocomplete="off" class="form-control" type="text" id="milestone_title" name="milestone_title" placeholder="">
                            </label>
                        </section>
                    </div>

                    <div class="">
                        <label class="textarea">
                            Description
                            <textarea rows="5" id="description" name="description" placeholder="">{{old('description')}}</textarea>
                        </label>
                    </div>

                    <div class="row">

                        <section class="col col-6">
                            <b>Deadline</b>
                            <label class="input">
                                <i class="icon-append fa fa-calendar"></i>
                                <input type="text" name="deadline" id="deadline" placeholder="" value="{{old('deadline')}}" class="hasDatepicker">
                            </label>
                        </section>
                        <section class="col col-6">
                            <b>Fund Release</b>
                            <label class="input">
                                <input type="text" name="fund_release" id="fund_release" placeholder="" value="{{old('fund_release')}}">
                            </label>
                        </section>
                    </div>
                    <input type="submit" id="addEducation" class="btn-u" value="Add Milestone" />
            </form>
        </div>
    </div>



    <!--=== Job Description ===-->

    <!--=== End Job Description ===-->
    <script type="text/javascript">
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

