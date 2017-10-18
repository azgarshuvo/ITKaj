<?php
/**
 * Created by PhpStorm.
 * User: shuvo
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
        <p class="alert-danger alert hidden" id="error"></p>
        <div class="clearfix"></div>

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

