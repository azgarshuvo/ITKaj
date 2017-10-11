<?php
/**
 * Created by PhpStorm.
 * User: Shuvo
 * Date: 11-Oct-17
 * Time: 04:46 PM
 */
?>
@extends('layouts.front.profileMaster')

@section('title', 'Job Approve List')

@section('content')
   <!--=== Breadcrumbs ===-->
   <div class="col-md-9">
    <div class="profile-body">

    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Approved Job Search</h1>
        </div><!--/container-->
    </div>

    <div class="search-block">
        <div class="container">
            <div class="col-md-4 col-md-offset-2">
                <h2>Search Here</h2>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search words with regular expressions ...">
                    <span class="input-group-btn">
                            <button class="btn-u" type="button"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!--Basic Table-->
                    <div class="panel panel-green margin-bottom-40 ">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-tasks"></i> Approved Job List Table</h3>
                        </div>
                        <div class="panel-body jobApproveListTable">
                            <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th class="hidden-sm">Short Description</th>
                                    <th>Action</th>  
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Mark</td>
                                    <td class="hidden-sm">Otto</td>
                                    <td>
                                        <div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> Details</button></div>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Jacob</td>
                                    <td class="hidden-sm">Thornton</td>
                                    
                                    <td>
                                        <div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> Details</button></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Larry</td>
                                    <td class="hidden-sm">the Bird</td>
                                    
                                    <td>
                                        <div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> Details</button></div>
                                    </td> 
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>htmlstream</td>
                                    <td class="hidden-sm">Web Design</td>
                                    
                                    <td>
                                        <div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> Details</button></div>
                                    </td>                                
                                </tr>

                                 <tr>
                                    <td>4</td>
                                    <td>htmlstream</td>
                                    <td class="hidden-sm">Web Design</td>
                                    
                                    <td>
                                        <div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> Details</button></div>
                                    </td>                                
                                </tr>

                                 <tr>
                                    <td>4</td>
                                    <td>htmlstream</td>
                                    <td class="hidden-sm">Web Design</td>
                                    
                                    <td>
                                        <div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> Details</button></div>
                                    </td>                                
                                </tr>

                                 <tr>
                                    <td>4</td>
                                    <td>htmlstream</td>
                                    <td class="hidden-sm">Web Design</td>
                                    
                                    <td>
                                        <div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> Details</button></div>
                                    </td>                                
                                </tr>

                                 <tr>
                                    <td>4</td>
                                    <td>htmlstream</td>
                                    <td class="hidden-sm">Web Design</td>
                                    
                                    <td>
                                        <div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> Details</button></div>
                                    </td>                                
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    </div>
                    <!--End Basic Table-->
    </div>
    </div>
@endsection

