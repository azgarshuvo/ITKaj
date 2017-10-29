<?php
/**
 * Created by PhpStorm.
 * User: Polash
 * Date: 07-Oct-17
 * Time: 6:19 PM
 */
?>
@extends('layouts.front.master')

@section('title', 'Job Edit')

@section('content')

    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Job Edit</h1>
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
                <form enctype="multipart/form-data" action="{{route('editJobPost',['jobid'=>$jobDetails->id])}}" method="post" class="reg-page">

                    {{csrf_field()}}
                    <div class="reg-header">
                        <h2>Edit the Bellow Field to Update the Job</h2>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label>Job title <span class="color-red">*</span></label>
                            <input value="{{$jobDetails->name}}"  type="text" class="form-control margin-bottom-20" name="title">
                        </div>
                        <div class="col-sm-6">
                            <label>Category<span class="color-red">*</span></label>
                            <select class="form-control margin-bottom-20 category" name="category">
                                @foreach($categories as $cate)
                                    @if($cate->is_parent!=0)

                                        @if($cate->id == $parentCateId)
                                            <option selected="selected" value="{{$cate->id}}">{{$cate->category_name}}</option>
                                        @else
                                            @if($cate->id == $jobDetails->category_id)
                                                <option selected="selected" value="{{$cate->id}}">{{$cate->category_name}}</option>
                                            @else
                                                <option value="{{$cate->id}}">{{$cate->category_name}}</option>
                                            @endif
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label>Duration<span class="color-red">*</span></label>
                            {{--<input value="{{old('duration')}}"  type="text" class="form-control margin-bottom-20" name="duration">--}}
                            <select class="form-control margin-bottom-20" name="duration">
                                @if($jobDetails->project_time == 1)
                                    <option selected="selected" value="1">More Then 1 Month</option>
                                    <option value="2">Less Then 1 Month</option>
                                    <option value="3">I don't know</option>
                                @elseif($jobDetails->project_time == 2)
                                    <option value="1">One Time Project</option>
                                    <option selected="selected" value="2">Less Then 1 Month</option>
                                    <option value="3">I don't know</option>

                                @elseif($jobDetails->project_time == 3)
                                    <option value="1">One Time Project</option>
                                    <option value="2">Less Then 1 Month</option>
                                    <option selected="selected" value="3">I don't know</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label >Sub Category <span class="color-red">*</span></label>
                            <select class="form-control margin-bottom-20 subCategory" name="subCategory">
                                <option value="">Select One</option>
                                @foreach($categories as $cate)
                                    @if($cate->is_parent==0 && $cate->parent_category_id == $parentCateId)
                                        @if($cate->id == $jobDetails->category_id)
                                            <option selected="selected" value="{{$cate->id}}">{{$cate->category_name}}</option>
                                        @else
                                            <option value="{{$cate->id}}">{{$cate->category_name}}</option>
                                        @endif
                                    @endif
                                @endforeach
                                {{--@foreach($categories as $category)--}}
                                {{--@if($category->is_parent == 0)--}}
                                {{--<option value="{{$category->id}}">{{$category->category_name}}</option>--}}
                                {{--@endif--}}
                                {{--@endforeach--}}

                            </select>
                        </div>
                    </div>

                    <div class="row">
                        @if($jobDetails->selected_for_job==null)
                        <div class="col-sm-6">
                            <label>Project Cost <span class="color-red">*</span></label>

                                <input value="{{$jobDetails->project_cost}}" type="text" name="projectCost" class="form-control">

                        </div>
                        @endif
                        <div class="col-sm-6">
                            <label>Project Type <span class="color-red">*</span></label>
                            <select class="form-control margin-bottom-20" name="projectType">
                                @if($jobDetails->type == 1)
                                    <option selected="selected" value="1">One Time Project</option>
                                    <option value="2">On going</option>
                                    <option value="3">I don't know</option>
                                @elseif($jobDetails->type == 2)
                                    <option value="1">One Time Project</option>
                                    <option selected="selected" value="2">On going</option>
                                    <option value="3">I don't know</option>

                                @elseif($jobDetails->type == 3)
                                    <option value="1">One Time Project</option>
                                    <option value="2">On going</option>
                                    <option selected="selected" value="3">I don't know</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Skills <span class="color-red">*</span></label>
                            <select id="skill" name="skill[]" multiple  class="form-control margin-bottom-20">
                                @foreach($skills as $skill)
                                    @if(is_array(json_decode($jobDetails->skill_needed, false)))
                                        @if(in_array($skill->id,json_decode($jobDetails->skill_needed, false)))
                                            <option selected="selected" value="{{$skill->id}}">{{$skill->name}}</option>
                                        @else
                                            <option value="{{$skill->id}}">{{$skill->name}}</option>
                                        @endif
                                    @else
                                        <option value="{{$skill->id}}">{{$skill->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Job Description</label>
                            <textarea class="form-control margin-bottom-20" rows="4" name="description">{{$jobDetails->description}}</textarea>
                        </div>
                    </div>





                    <div class="row">
                        <div class="col-lg-6">
                            <button class="btn-u" type="submit">Confirm Job Post</button>
                        </div>
                    </div>
                </form>

                    <h4>Add Attachment</h4>
                    <form action="{{route('addAttachment',['job_id'=>$jobDetails->id])}}" class="dropzone">
                        {{csrf_field()}}
                        <div class="dropzone-previews" id="dropzonePreview"></div>

                        <div class="fallback">
                            <input name="file[]" type="file" multiple />
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

        });



        $('.category').change(function(){
            $('.subCategory').children('option:not(:first)').remove();
            var selectedCategoryId = parseInt($('.category option:selected').val());
            var Categories = JSON.parse($('#categories').val());
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
