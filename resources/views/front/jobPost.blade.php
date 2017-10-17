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
                                <select class="form-control margin-bottom-20 category" name="category">
                                    <option value="">Select One</option>
                                    @if($categories != null || $categories != '')
                                        @foreach($categories as $category)
                                            @if($category->is_parent == 1)
                                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <label>Duration<span class="color-red">*</span></label>
                                {{--<input value="{{old('duration')}}"  type="text" class="form-control margin-bottom-20" name="duration">--}}
                                <select class="form-control margin-bottom-20" name="duration">
                                    <option value="">Select One</option>
                                    <option value="1">More Then 1 Month</option>
                                    <option value="2">Less Then 1 Month</option>
                                    <option value="2">I Don't Know</option>

                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label >Sub Category <span class="color-red">*</span></label>
                                <select class="form-control margin-bottom-20 subCategory" name="subCategory">
                                    <option value="">Select One</option>
                                    {{--@foreach($categories as $category)--}}
                                        {{--@if($category->is_parent == 0)--}}
                                            {{--<option value="{{$category->id}}">{{$category->category_name}}</option>--}}
                                        {{--@endif--}}
                                    {{--@endforeach--}}
                                    
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <label>Project Cost <span class="color-red">*</span></label>
                                <input value="{{old('projectCost')}}" type="text" name="projectCost" class="form-control">
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
                        <div class="row">
                            <div class="col-md-12">
                                <label>Skills <span class="color-red">*</span></label>
                                <select value="{{old('skill[]')}}" id="skill" name="skill[]" multiple  class="form-control margin-bottom-20"></select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Job Description</label>
                                <textarea class="form-control margin-bottom-20" rows="4" name="description">{{old('description')}}</textarea>
                            </div>
                        </div>



                        <label>Attachment</label>
                        {{-- <div class="col-md-6 form-control margin-bottom-20 dropzone"  action="/fileupload">

                        <div class="fallback">--}}
                        <input class="form-control" name="file[]" type="file"  multiple />
                        {{--</div>
                    </div>--}}
                        
                    <!--Top-->
                        {{-- start div for selected freelancer list and add js hidden input type --}}

                        <div class="row">
                            <div class="col-md-12 margin-top-20" id="freelancer_list">

                            </div>
                        </div>
                        {{--end div for selected freelancer list and add js hidden input type --}}

                        {{--<div class="panel panel-grey margin-bottom-40" >--}}
                            {{--<div class="panel-heading">--}}
                                {{--<h3 class="panel-title"><i class="fa fa-globe"></i> Top Rated Freelancer</h3>--}}
                            {{--</div>--}}
                            {{--<div class="panel-body">--}}
                                {{--<table id="topRatedFreelancer" class="table table-striped table-bordered" width="100%" cellspacing="0">--}}
                                    {{--<thead>--}}
                                    {{--<tr>--}}
                                        {{--<th>Name</th>--}}
                                        {{--<th>Skill</th>--}}
                                        {{--<th>Hourly Rate</th>--}}
                                        {{--<th>Action</th>--}}
                                    {{--</tr>--}}
                                    {{--</thead>--}}
                                    {{--<tfoot>--}}
                                    {{--<tr>--}}
                                        {{--<th>Name</th>--}}
                                        {{--<th>Position</th>--}}
                                        {{--<th>Office</th>--}}
                                        {{--<th>Age</th>--}}
                                    {{--</tr>--}}
                                    {{--</tfoot>--}}
                                    {{--<tbody>--}}
                                    {{--<tr id="1_top_freelancer">--}}
                                        {{--<td id="1_username">Tiger Nixon</td>--}}
                                        {{--<td>System Architect</td>--}}
                                        {{--<td>Edinburgh</td>--}}
                                        {{--<td><button onclick="getFreelancer(1)" type="button" class="btn btn-info btn-xs" name="addButton"><i class="fa fa-plus"></i> Add</button>--}}
                                            {{--<button type="button" class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i> Show</button>--}}
                                        {{--</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr id="2_top_freelancer">--}}
                                        {{--<td id="2_username">Garrett Winters</td>--}}
                                        {{--<td>Accountant</td>--}}
                                        {{--<td>Tokyo</td>--}}
                                        {{--<td><button onclick="getFreelancer(2)" type="button" class="btn btn-info btn-xs" name="addButton"><i class="fa fa-plus"></i> Add</button>--}}
                                            {{--<button type="button" class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i> Show</button>--}}
                                        {{--</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr id="3_top_freelancer">--}}
                                        {{--<td id="3_username">Ashton Cox</td>--}}
                                        {{--<td>Junior Technical Author</td>--}}
                                        {{--<td>San Francisco</td>--}}
                                        {{--<td><button onclick="getFreelancer(3)" type="button" class="btn btn-info btn-xs" name="addButton"><i class="fa fa-plus"></i> Add</button>--}}
                                            {{--<button type="button" class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i> Show</button>--}}
                                        {{--</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr id="4_top_freelancer">--}}
                                        {{--<td id="4_username">Cedric Kelly</td>--}}
                                        {{--<td>Senior Javascript Developer</td>--}}
                                        {{--<td>Edinburgh</td>--}}
                                        {{--<td><button onclick="getFreelancer(4)" type="button" class="btn btn-info btn-xs" name="addButton"><i class="fa fa-plus"></i> Add</button>--}}
                                            {{--<button type="button" class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i> Show</button>--}}
                                        {{--</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr id="5_top_freelancer">--}}
                                        {{--<td id="5_username">Airi Satou</td>--}}
                                        {{--<td>Accountant</td>--}}
                                        {{--<td>Tokyo</td>--}}
                                        {{--<td><button onclick="getFreelancer(5)" type="button" class="btn btn-info btn-xs" name="addButton"><i class="fa fa-plus"></i> Add</button>--}}
                                            {{--<button type="button" class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i> Show</button>--}}
                                        {{--</td>--}}
                                    {{--</tr>--}}


                                    {{--</tbody>--}}
                                {{--</table>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <!--End Top-->

                        {{-- start div for selected freelancer list and add js hidden input type --}}

                        <div class="row">
                            <div class="col-md-12" id="inter_freelancer_list">

                            </div>
                        </div>
                    {{--end div for selected freelancer list and add js hidden input type --}}
                    <!--Top-->

                      {{--  <div class="col-md-5 col-md-offset-7">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search Intermediate Freelancer">
                                <span class="input-group-btn">
                                    <button type="button" class="btn-u" type="button"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </div>
--}}
                        <div class="panel panel-grey margin-bottom-40" >
                            <div class="panel-heading">



                            <h3 class="panel-title"><i class="fa fa-globe"></i>Freelancer List</h3>
                            </div>
                            <div class="panel-body">
                                <table id="freelancerDataTable" class="table table-striped table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Professional Title</th>
                                        <th>Experience Laval</th>
                                        <th>Skills</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Professional Title</th>
                                        <th>Experience Laval</th>
                                        <th>Skills</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @if($freelancers != null || $freelancers != '')
                                        @foreach($freelancers as $freelancer)
                                        <tr id="{{$freelancer->id}}_inter_freelancer">
                                            <td id="{{$freelancer->id}}_username_inter">{{$freelancer->fname}} {{$freelancer->lname}}</td>
                                            @if($freelancer->profile != null || $freelancer->profile != '')
                                                <td>{{$freelancer->profile->professional_title}}</td>
                                            @else
                                                <td></td>
                                            @endif
                                            @if($freelancer->profile != null || $freelancer->profile != '')
                                                @if($freelancer->profile->experience_level == 1)
                                                    <td>Entry</td>
                                                @endif
                                            @else
                                                <td></td>
                                            @endif
                                            @if($freelancer->profile != null || $freelancer->profile != '')
                                                @if($freelancer->profile->experience_level == 2)
                                                    <td>Intermediate</td>
                                                @endif
                                            @else
                                                <td></td>
                                            @endif
                                            @if($freelancer->profile != null || $freelancer->profile != '')
                                                @if($freelancer->profile->experience_level == 3)
                                                    <td>Expart</td>
                                                @endif
                                            @else
                                                <td></td>
                                            @endif
                                            @if($freelancer->profile != null || $freelancer->profile != '')
                                                <td>{{$freelancer->profile->skills}}</td>
                                            @else
                                                <td></td>
                                            @endif
                                            <td><button onclick="getInterFreelancer(1)" type="button" class="btn btn-info btn-xs" name="addButton"><i class="fa fa-plus"></i> Add</button>
                                                <button type="button" class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i> Show</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
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
    <input type="hidden" value="{{$categories}}" id="categories">
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#topRatedFreelancer').DataTable();
            $('#freelancerDataTable').DataTable();
        } );

        $("#skill").select2({
            tags: true,
            tokenSeparators: [',', '.']
        });

        $('.category').change(function(){
            $('.subCategory').children('option:not(:first)').remove();
            var selectedCategoryId = parseInt($('.category option:selected').val());
            var Categories = JSON.parse($('#categories').val());
//            console.log(Categories);
            if(Categories != null || Categories != ''){
                $.each(Categories, function( index, category ) {
                    if(category.id == selectedCategoryId){
                        $.each(category.subcategory, function(index, subCategory){
                            console.log(category);
                            $('.subCategory').append($('<option>', {
                                value: subCategory.id,
                                text : subCategory.category_name
                            }));
                        });
                    }
                });
            }

        });

    </script>

    {{--This script add by polash for add freelancer list--}}
    <script type="text/javascript">

        function getFreelancer(id){
            var input_field =   '<input id="freelancer_id_list_'+id+'" value="'+id+'" type="hidden" name="freelancer_list[]">';
            var username = $("#"+id+"_username").text();
            var add_style = '<b id="top_level_freelancer'+id+'" class="make_border">'+username+'<button type="button" class="remover" onclick="removeFreelancer('+id+')" aria-hidden="true">×</button></b>';
            $("#freelancer_list").append(input_field);

            $("#freelancer_list").append(add_style);
            $( "#"+id+"_top_freelancer" ).addClass( "hidden" );
        }

        function getInterFreelancer(id){

            var input_field =   '<input id="inter_freelancer_list_id'+id+'" value="'+id+'" type="hidden" name="inter_freelancer_list[]">';
            var username = $("#"+id+"_username_inter").text();
            var add_style = '<b id="int_level_freelancer'+id+'" class="make_border">'+username+'<button type="button" class="remover" onclick="removeInterFreelancer('+id+')" aria-hidden="true">×</button></b>';

            $( "#"+id+"_inter_freelancer" ).addClass( "hidden" );
            $("#inter_freelancer_list").append(input_field);

            $("#inter_freelancer_list").append(add_style);


        }
        function removeInterFreelancer(id){
            $( "#"+id+"_inter_freelancer" ).removeClass( "hidden" );
            $( "#inter_freelancer_list_id"+id ).remove();
            $( "#int_level_freelancer"+id ).remove();
        }
        function removeFreelancer(id){
            $( "#"+id+"_top_freelancer" ).removeClass( "hidden" );
            $( "#freelancer_id_list_"+id ).remove();
            $( "#top_level_freelancer"+id ).remove();
        }
    </script>
@endsection
