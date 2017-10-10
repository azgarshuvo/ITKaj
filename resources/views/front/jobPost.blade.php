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
                            <label>Category <span class="color-red">*</span></label>
                                <select class="form-control margin-bottom-20" name="user_type">
                                    <option value="">Select One</option>
                                    <option value="web">web development</option>
                                    <option value="desktop">Desktop Application</option>
                                    <option value="mobile">Mobile Application</option>
                                </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label>Duration<span class="color-red">*</span></label>
                            <input type="number" class="form-control margin-bottom-20" name="duration">
                        </div>
                        <div class="col-sm-6">
                            <label>Sub Category <span class="color-red">*</span></label>
                                <select class="form-control margin-bottom-20" name="subCategory">
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
                                    <option value="">Pay the hour</option>
                                    <option value="">Pay the fixed Time</option>
                                    
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label>Skills <span class="color-red">*</span></label>
                            <select multiple style="width: 20%;" class="form-control">
                                 <option>sh</option>
                            </select>
                        </div>
                    </div>

                    <label>Job Description</label>
                    <textarea class="form-control margin-bottom-20" rows="4" name="description"></textarea>

                        <!--Top-->
                    <div class="panel panel-grey margin-bottom-40">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-globe"></i> Top Rated Freelancer</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th class="hidden-sm">Last Name</th>
                                        <th>Username</th>
                                        <th>Status</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Mark</td>
                                        <td class="hidden-sm">Otto</td>
                                        <td>@mdo</td>
                                        <td>Active/Inactive</td>
                                        <td><button class="btn btn-info btn-xs" name="addButton"><i class="fa fa-plus"></i> Add</button>
                                            <button class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i> Show</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Jacob</td>
                                        <td class="hidden-sm">Thornton</td>
                                        <td>@fat</td>
                                        <td>Active/Inactive</td>
                                        <td><button class="btn btn-info btn-xs" name="addButton"><i class="fa fa-plus"></i> Add</button>
                                            <button class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i> Show</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Larry</td>
                                        <td class="hidden-sm">the Bird</td>
                                        <td>@twitter</td>
                                        <td>Active/Inactive</td>
                                        <td><button class="btn btn-info btn-xs" name="addButton"><i class="fa fa-plus"></i> Add</button>
                                            <button class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i> Show</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>htmlstream</td>
                                        <td class="hidden-sm">Web Design</td>
                                        <td>@htmlstream</td>
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
                    <div class="panel panel-grey margin-bottom-40">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-globe"></i> Top Rated Freelancer</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th class="hidden-sm">Last Name</th>
                                        <th>Username</th>
                                        <th>Status</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Mark</td>
                                        <td class="hidden-sm">Otto</td>
                                        <td>@mdo</td>
                                        <td>Active/Inactive</td>
                                        <td><button class="btn btn-info btn-xs" name="addButton"><i class="fa fa-plus"></i> Add</button>
                                            <button class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i> Show</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Jacob</td>
                                        <td class="hidden-sm">Thornton</td>
                                        <td>@fat</td>
                                        <td>Active/Inactive</td>
                                        <td><button class="btn btn-info btn-xs" name="addButton"><i class="fa fa-plus"></i> Add</button>
                                            <button class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i> Show</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Larry</td>
                                        <td class="hidden-sm">the Bird</td>
                                        <td>@twitter</td>
                                        <td>Active/Inactive</td>
                                        <td><button class="btn btn-info btn-xs" name="addButton"><i class="fa fa-plus"></i> Add</button>
                                            <button class="btn btn-success btn-xs" name="showButton"><i class="fa fa-share"></i> Show</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>htmlstream</td>
                                        <td class="hidden-sm">Web Design</td>
                                        <td>@htmlstream</td>
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
                        <div class="col-lg-6 checkbox">
                            <label>
                                <input name="terms" type="checkbox">
                                I read <a href="page_terms.html" class="color-green">Terms and Conditions</a>
                            </label>
                        </div>
                        <div class="col-lg-6 text-right">
                            <button class="btn-u" type="submit">Post</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><!--/container-->
    <!--=== End Content Part ===-->

    <script type="text/javascript">

        $("select").select2({
         tags: true,
        tokenSeparators: [',', '.']
        });

    </script>
@endsection

