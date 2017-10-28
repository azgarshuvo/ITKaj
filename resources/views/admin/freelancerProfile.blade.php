<?php
/**
 * Created by PhpStorm.
 * User: shuvo
 * Date: 09-Oct-17
 * Time: 5:57 PM
 */
?>
@extends('layouts.admin.master')

@section('title', 'Freelancer List')

@section('content')
    <div class="wrapper wrapper-content">
        @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
            <div class="col-md-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Profile Detail</h5>
                    </div>
                    <div>
                        <div class="ibox-content no-padding border-left-right text-center">
                            {{--<img alt="image" class="img-responsive" src="img/profile_big.jpg">--}}

                            @if($user->profile!=null)
                                <img width="200" id="image-profile" class="img-responsive md-margin-bottom-10 img img-thumbnail img-bordered profile-imge" @if(strlen($user->profile->img_path)>3)  src="{{asset('profile_img/'.$user->profile->img_path)}}" @else src="{{asset('assets/img/team/img32-md.jpg')}}" @endif alt="">
                            @else
                                <img width="200" id="image-profile" class="img-responsive md-margin-bottom-10 img img-thumbnail img-bordered profile-imge" src="{{asset('assets/img/team/img32-md.jpg')}}" alt="">
                            @endif
                        </div>
                        @if($user->profile)
                        <div class="ibox-content profile-content">
                            <h4><strong>{{$user->fname." ".$user->lname}}</strong></h4>
                            <p><i class="fa fa-map-marker"></i> {{$user->profile->address}}</p>
                            <h5>
                                About me
                            </h5>
                            <p>
                                {{$user->profile->professional_overview}}
                            </p>

                            <h5>
                                Profession Title
                            </h5>
                            <p>
                                {{$user->profile->professional_title}}
                            </p>
                            <h5>
                                Phone
                            </h5>
                            <p>
                                {{$user->profile->phone_number}}
                            </p>
                            <div class="row m-t-lg text-center">
                                <div class="col-md-6">
                                    <h5><strong>{{$user->job()->count()}}</strong> Job Done</h5>
                                </div>
                                <div class="col-md-6">
                                    <h5><strong>{{$user->jobInterested()->count()}}</strong> Interested Job</h5>
                                </div>

                            </div>
                            <div class="user-button">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-primary btn-sm btn-block"><i class="fa fa-envelope"></i> Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Selected for jobs</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link binded">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link binded">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                            <tr>
                                <th>SL No.</th>
                                <th>Job Title</th>
                                <th>Description</th>
                                <th>Project Cost</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php  $count = 1; ?>
                            @foreach($user->job as $job)
                                <tr class="gradeX">
                                    <td>{{$count++}}</td>
                                    <td>{{$job->name}}</td>
                                    <td>{{$job->description}}</td>
                                    <td>{{$job->project_cost}}</td>
                                    <td class="center">
                                        <a class="btn btn-sm btn-info" href="{{ route('jobDetails', [$job->id])}}" data-toggle="tooltip" data-placement="left" title="Job Details"><i class="fa fa-eye"></i></a>
                                        <a onclick="return confirm('Are you sure to delete?')" class="btn btn-sm btn-danger" href="{{ route('jobApproveDelete', [$job->id])}}"  data-toggle="tooltip" title="Job Delete"><i class="fa fa-times" ></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>

                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Job Interested</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link binded">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link binded">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                            <tr>
                                <th>SL No.</th>
                                <th>Job Title</th>
                                <th>Description</th>
                                <th>Project Cost</th>
                                <th>Freelancer Offer Cost</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($interestJobList->count() > 0)
                            <?php  $count = 1; ?>
                            @foreach($interestJobList as $job)

                                <tr class="gradeX">
                                    <td>{{$count++}}</td>
                                    <td>{{$job->name}}</td>
                                    <td>{{$job->description}}</td>
                                    <td>{{$job->interested->project_cost}}</td>
                                    <td>{{$job->project_cost}}</td>
                                    <td class="center">
                                        <a class="btn btn-sm btn-info" href="{{ route('jobDetails', [$job->id])}}" data-toggle="tooltip" data-placement="left" title="Job Details"><i class="fa fa-eye"></i></a>

                                        <a onclick="return confirm('Are you sure to delete?')" class="btn btn-sm btn-danger" href="{{ route('jobApproveDelete', [$job->id])}}"  data-toggle="tooltip" title="Job Delete"><i class="fa fa-times" ></i></a>
                                    </td>
                                </tr>
                            @endforeach
                                @endif
                            </tbody>
                        </table>

                    </div>

                </div>

            </div>

    </div>
@endsection
