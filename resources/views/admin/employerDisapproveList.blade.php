<?php
/**
 * Created by PhpStorm.
 * User: Shuvo
 * Date: 10/24/2017
 * Time: 12:26 AM
 */
?>
@extends('layouts.admin.master')

@section('title', 'Employeer Disapprove List')

@section('content')
    <div class="wrapper wrapper-content">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Employeer Disapprove List</h5>
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
                        <th>Full Name</th>
                        <th>Company Name</th>
                        <th>Professional Title</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count =1; ?>
                    @foreach($employerDisapproveList as $employer)
                        @if($employer->profile != null && $employer->profile != "")
                            <tr class="gradeX">
                                <td>{{$count++}}</td>
                                <td>{{$employer->fname}}{{$employer->lname}}</td>
                                <td>{{$employer->profile->company_name}}</td>
                                <td>{{$employer->profile->professional_title}}</td>
                                <td class="center">
                                    <a class="btn btn-sm btn-danger" href="#"><i class="fa fa-times"></i></a>
                                    <a class="btn btn-sm btn-info" href="#" data-toggle="tooltip" data-placement="left" title="Freelancer Details"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
