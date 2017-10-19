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
            <h2 class="title text-center bg-primary">Milestone View</h2>
    </div>
    <div class="col-md-9 milestone-body">
        <p class="alert-danger alert hidden" id="error"></p>
        <div class="clearfix"></div>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            @foreach($milestone_list as $milestone_all)
            <div class="panel panel-default panel-custom">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            {{ $milestone_all->job->name }}
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body table-responsive">
                        <table class="table table-striped table-bordered table-hover table-condensed">
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
                                @foreach($milestone_all->millstone as $milestone )
                                <tr>

                                    <td class="text-center">{{$i++}}</td>
                                    <td class="text-center">{{$milestone->milestone_title}}</td>
                                    <td class="text-center">{{$milestone->milestone_description}}</td>
                                    <td class="text-center">{{$milestone->deadline}}</td>
                                    <td class="text-center">{{$milestone->fund_release}}</td>
                                    <td class="text-center">{{$milestone->status}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @endforeach
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

