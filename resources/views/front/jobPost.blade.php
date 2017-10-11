<?php
/**
 * Created by PhpStorm.
 * User: shuvo
 * Date: 07-Oct-17
 * Time: 6:19 PM
 */
?>
@extends('layouts.front.master')

@section('title', 'Job Post')

@section('content')

    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Job Post</h1>
        </div><!--/container-->
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->
    <!--=== Content Part ===-->
    <div class="container content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

                @if($errors->has())
                    <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}</br>
                    @endforeach
                    </div>
                @endif
                <form enctype="multipart/form-data" action="{{route('joabPost')}}" method="post" class="reg-page">

                    {{csrf_field()}}
                    <div class="reg-header">
                        <h2>Fill Up the Bellow Field to Post a New Job</h2>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label>Job title <span class="color-red">*</span></label>
                            <input value="{{old('title')}}"  type="text" class="form-control margin-bottom-20" name="title">
                        </div>
                        <div class="col-sm-6">
                        <label>Category<span class="color-red">*</span></label>
                                <select class="form-control margin-bottom-20" name="category">
                                    <option value="">Select One</option>
                                    <option value="1">Web development</option>
                                    <option value="2">Mobile App Development</option>
                                    
                                </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label>Duration<span class="color-red">*</span></label>
                            <input value="{{old('duration')}}"  type="number" class="form-control margin-bottom-20" name="duration">
                        </div>
                        <div class="col-sm-6">
                            <label >Sub Category <span class="color-red">*</span></label>
                                <select class="form-control margin-bottom-20" name="subCategory" disabled="disabled">
                                    <option value="">Select One</option>
                                    <option value="">Select1</option>
                                    <option value="">Select2</option>
                                    
                                </select>
                        </div>
                    </div>

                     <div class="row">
                        <div class="col-sm-6">
                            <label>Project Cost <span class="color-red">*</span></label>
                            <input value="{{old('projectCost')}}" type="number" name="projectCost" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label>Project Type <span class="color-red">*</span></label>
                            <select class="form-control margin-bottom-20" name="projectType">
                                    <option value="">Select One</option>
                                    <option value="1">One Time Project</option>
                                    <option value="2">On going</option>
                                    <option value="3">I don't know</option>
                            </select>
                        </div>
                    </div>

                    <label>Skills <span class="color-red">*</span></label>
                        <select value="{{old('skill[]')}}" id="skill" name="skill[]" multiple  class="form-control margin-bottom-20">
                        </select>

                    <label>Job Description</label>
                    <textarea class="form-control margin-bottom-20" rows="4" name="description">{{old('description')}}"</textarea>

                    
                    <label>job Attachment</label>
                   {{-- <div class="col-md-6 form-control margin-bottom-20 dropzone"  action="/fileupload">

                        <div class="fallback">--}}
                            <input class="form-control" name="file[]" type="file"  multiple />
                          {{--</div>
                    </div>--}}
                        
                        <!--Top-->
                    {{-- start div for selected freelancer list and add js hidden input type --}}

                    <div class="row">
                        <div class="col-md-12" id="freelancer_list">

                        </div>
                    </div>
                    {{--end div for selected freelancer list and add js hidden input type --}}
                        
                    <div class="col-md-5 col-md-offset-7">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Top Rated Freelancer">
                            <span class="input-group-btn">
                                <button class="btn-u" type="button"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </div>

                    <div class="panel panel-grey margin-bottom-40" >
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-globe"></i> Top Rated Freelancer</h3>
                        </div>
                        <div class="panel-body" style="height: 200px; width: 880px; overflow: scroll;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>Skill</th>
                                        <th>Hourly Rate</th>  
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td id="1_username">Mark</td>
                                        <td class="hidden-sm">Otto</td>
                                        
                                        <td>Active/Inactive</td>
                                        <td>
                                            <button type="button" onclick="getFreelancer(1)" class="btn btn-info btn-xs" name="addButton"><i class="fa fa-plus"></i> Add</button>
                                            <button type="button" class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i> Show</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td id="2_username">Jacob</td>
                                        <td class="hidden-sm">Thornton</td>
                                      
                                        <td>Active/Inactive</td>
                                        <td><button onclick="getFreelancer(2)" type="button" class="btn btn-info btn-xs" name="addButton"><i class="fa fa-plus"></i> Add</button>
                                            <button type="button" class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i> Show</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td id="3_username">Larry</td>
                                        <td class="hidden-sm">the Bird</td>
                                 
                                        <td>Active/Inactive</td>
                                        <td><button onclick="getFreelancer(3)" type="button" class="btn btn-info btn-xs" name="addButton"><i class="fa fa-plus"></i> Add</button>
                                            <button type="button" class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i> Show</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td id="4_username">htmlstream</td>
                                        <td class="hidden-sm">Web Design</td>
                                       
                                        <td>Active/Inactive</td>
                                        <td><button onclick="getFreelancer(4)" type="button" class="btn btn-info btn-xs" name="addButton"><i class="fa fa-plus"></i> Add</button>
                                            <button type="button" class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i> Show</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--End Top-->

                    {{-- start div for selected freelancer list and add js hidden input type --}}

                    <div class="row">
                        <div class="col-md-12" id="inter_freelancer_list">

                        </div>
                    </div>
                {{--end div for selected freelancer list and add js hidden input type --}}
                    <!--Top-->

                    <div class="col-md-5 col-md-offset-7">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Intermediate Freelancer">
                            <span class="input-group-btn">
                                <button type="button" class="btn-u" type="button"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </div>

                    <div class="panel panel-grey margin-bottom-40" >
                        <div class="panel-heading">



                            <h3 class="panel-title"><i class="fa fa-globe"></i> Intermediate Freelancer</h3>
                        </div>
                        <div class="panel-body" style="height: 200px; width: 880px; overflow: scroll;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>Skill</th>
                                        <th>Hourly Rate</th>  
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td id="1_username_inter">Mark</td>
                                        <td class="hidden-sm">Otto</td>
                                        
                                        <td>Active/Inactive</td>
                                        <td><button type="button" onclick="getInterFreelancer(1)" class="btn btn-info btn-xs" name="addButton"><i class="fa fa-plus"></i> Add</button>
                                            <button class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i> Show</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td id="2_username_inter">Jacob</td>
                                        <td class="hidden-sm">Thornton</td>
                                       
                                        <td>Active/Inactive</td>
                                        <td><button type="button" onclick="getInterFreelancer(2)" class="btn btn-info btn-xs" name="addButton"><i class="fa fa-plus"></i> Add</button>
                                            <button class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i> Show</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td id="3_username_inter">Larry</td>
                                        <td class="hidden-sm">the Bird</td>
                                       
                                        <td>Active/Inactive</td>
                                        <td><button class="btn btn-info btn-xs" onclick="getInterFreelancer(3)" type="button" name="addButton"><i class="fa fa-plus"></i> Add</button>
                                            <button class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i> Show</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td id="4_username_inter">htmlstream</td>
                                        <td class="hidden-sm">Web Design</td>
                                       
                                        <td>Active/Inactive</td>
                                        <td><button type="button" onclick="getInterFreelancer(4)" class="btn btn-info btn-xs" name="addButton"><i class="fa fa-plus"></i> Add</button>
                                            <button class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i> Show</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--End Top-->
                    <hr>

                    <div class="row">
                        <div class="col-lg-6">
                            <button class="btn-u" type="submit">Confirm Job Post</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><!--/container-->
    <!--=== End Content Part ===-->
@endsection

@section('script')
    <script type="text/javascript">

        $("#skill").select2({
            tags: true,
            tokenSeparators: [',', '.']
        });

    </script>

    {{--This script add by polash for add freelancer list--}}
    <script type="text/javascript">

        function getFreelancer(id){
        var input_field =   '<input id="freelancer_list" value="'+id+'" type="hidden" name="freelancer_list[]">';
        var username = $("#"+id+"_username").text();
            $("#freelancer_list").append(input_field);

            $("#freelancer_list").append(username);
           // alert(username);
        }

        function getInterFreelancer(id){

            var input_field =   '<input id="inter_freelancer_list" value="'+id+'" type="hidden" name="inter_freelancer_list[]">';
            var username = $("#"+id+"_username_inter").text();
            $("#inter_freelancer_list").append(input_field);

            $("#inter_freelancer_list").append(username);
            // alert(username);
        }
    </script>
@endsection
