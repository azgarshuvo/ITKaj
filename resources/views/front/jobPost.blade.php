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
                <!-- @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif -->
                <form method="post" class="reg-page">

                    {{csrf_field()}}
                    <div class="reg-header">
                        <h2>Fill Up the Bellow Field to Post a New Job</h2>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label>Job title <span class="color-red">*</span></label>
                            <input type="text" class="form-control margin-bottom-20" name="title">
                        </div>
                        <div class="col-sm-6">
                        <label>Category<span class="color-red">*</span></label>
                                <select class="form-control margin-bottom-20" name="subCategory">
                                    <option value="">Select One</option>
                                    <option value="web">Web development</option>
                                    <option value="mobile">Mobile App Development</option>
                                    
                                </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label>Duration<span class="color-red">*</span></label>
                            <input type="number" class="form-control margin-bottom-20" name="duration">
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
                            <label>Payment <span class="color-red">*</span></label>
                            <select class="form-control margin-bottom-20" name="payment">
                                    <option value="">Select One</option>
                                    <option value="hour">Pay the hour</option>
                                    <option value="fixed time">Pay the fixed Time</option>
                                    <option value="dont know">I don't know</option>

                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label>Project Type <span class="color-red">*</span></label>
                            <select class="form-control margin-bottom-20" name="type">
                                    <option value="">Select One</option>
                                    <option value="one time">One Time Project</option>
                                    <option value="on going">On going</option>
                                    <option value="dont know">I don't know</option>
                            </select>
                        </div>
                    </div>

                    <label>Skills <span class="color-red">*</span></label>
                        <select id="skill" multiple  class="form-control margin-bottom-20">
                             
                        </select>

                    <label>Job Description</label>
                    <textarea class="form-control margin-bottom-20" rows="4" name="description"></textarea>

                    
                    <label>job Attachment</label>
                    <div class="col-md-6 form-control margin-bottom-20 dropzone"  action="/fileupload">

                        <div class="fallback">
                            <input name="file" type="file" multiple />
                          </div>
                    </div>
                        
                        <!--Top-->

                        
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
                                        <td>Mark</td>
                                        <td class="hidden-sm">Otto</td>
                                        
                                        <td>Active/Inactive</td>
                                        <td><button class="btn btn-info btn-xs" name="addButton"><i class="fa fa-plus"></i> Add</button>
                                            <button class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i> Show</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Jacob</td>
                                        <td class="hidden-sm">Thornton</td>
                                      
                                        <td>Active/Inactive</td>
                                        <td><button class="btn btn-info btn-xs" name="addButton"><i class="fa fa-plus"></i> Add</button>
                                            <button class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i> Show</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Larry</td>
                                        <td class="hidden-sm">the Bird</td>
                                 
                                        <td>Active/Inactive</td>
                                        <td><button class="btn btn-info btn-xs" name="addButton"><i class="fa fa-plus"></i> Add</button>
                                            <button class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i> Show</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>htmlstream</td>
                                        <td class="hidden-sm">Web Design</td>
                                       
                                        <td>Active/Inactive</td>
                                        <td><button class="btn btn-info btn-xs" name="addButton"><i class="fa fa-plus"></i> Add</button>
                                            <button class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i> Show</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--End Top-->


                    <!--Top-->

                    <div class="col-md-5 col-md-offset-7">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Intermediate Freelancer">
                            <span class="input-group-btn">
                                <button class="btn-u" type="button"><i class="fa fa-search"></i></button>
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
                                        <td>Mark</td>
                                        <td class="hidden-sm">Otto</td>
                                        
                                        <td>Active/Inactive</td>
                                        <td><button class="btn btn-info btn-xs" name="addButton"><i class="fa fa-plus"></i> Add</button>
                                            <button class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i> Show</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Jacob</td>
                                        <td class="hidden-sm">Thornton</td>
                                       
                                        <td>Active/Inactive</td>
                                        <td><button class="btn btn-info btn-xs" name="addButton"><i class="fa fa-plus"></i> Add</button>
                                            <button class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i> Show</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Larry</td>
                                        <td class="hidden-sm">the Bird</td>
                                       
                                        <td>Active/Inactive</td>
                                        <td><button class="btn btn-info btn-xs" name="addButton"><i class="fa fa-plus"></i> Add</button>
                                            <button class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i> Show</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>htmlstream</td>
                                        <td class="hidden-sm">Web Design</td>
                                       
                                        <td>Active/Inactive</td>
                                        <td><button class="btn btn-info btn-xs" name="addButton"><i class="fa fa-plus"></i> Add</button>
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
@endsection
