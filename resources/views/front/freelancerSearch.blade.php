<?php
/**
 * Created by PhpStorm.
 * User: zakariya
 * Date: 11-Oct-17
 * Time: 1:00 PM
 */
?>
@extends('layouts.front.master')

@section('title', '')

@section('content')
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Freelancer Search</h1>
        </div><!--/container-->
    </div><!--/breadcrumbs-->
    <!--=== Search Block Version 2 ===-->
    <div class="search-block">
        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <h2>Search again</h2>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search words with regular expressions ...">
                    <span class="input-group-btn">
							<button class="btn-u" type="button"><i class="fa fa-search"></i></button>
						</span>
                </div>
            </div>
        </div>
    </div><!--/container-->
    <!--=== End Search Block Version 2 ===-->
    <div class="container content-sm">
        <!-- Begin Table Search Panel v1 -->
        <div class="table-search-v1 panel panel-dark margin-bottom-50 freelancerSearchDataTable" >
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-globe"></i> Table Search Results</h3>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th class="hidden-sm">Short Description</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <a href="#">HP Enterprise Service</a>
                        </td>
                        <td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu vel fringilla tincidunt.</td>
                        <td>
                            <div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> View Profile</button></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#">HP Enterprise Service</a>
                        </td>
                        <td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu vel fringilla tincidunt.</td>
                        <td>
                            <div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> View Profile</button></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#">HP Enterprise Service</a>
                        </td>
                        <td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu vel fringilla tincidunt.</td>
                        <td>
                            <div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> View Profile</button></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#">HP Enterprise Service</a>
                        </td>
                        <td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu vel fringilla tincidunt.</td>
                        <td>
                            <div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> View Profile</button></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#">HP Enterprise Service</a>
                        </td>
                        <td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu vel fringilla tincidunt.</td>
                        <td>
                            <div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> View Profile</button></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#">HP Enterprise Service</a>
                        </td>
                        <td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu vel fringilla tincidunt.</td>
                        <td>
                            <div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> View Profile</button></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#">HP Enterprise Service</a>
                        </td>
                        <td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu vel fringilla tincidunt.</td>
                        <td>
                            <div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> View Profile</button></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#">HP Enterprise Service</a>
                        </td>
                        <td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu vel fringilla tincidunt.</td>
                        <td>
                            <div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> View Profile</button></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#">HP Enterprise Service</a>
                        </td>
                        <td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu vel fringilla tincidunt.</td>
                        <td>
                            <div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> View Profile</button></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#">HP Enterprise Service</a>
                        </td>
                        <td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu vel fringilla tincidunt.</td>
                        <td>
                            <div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> View Profile</button></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#">HP Enterprise Service</a>
                        </td>
                        <td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu vel fringilla tincidunt.</td>
                        <td>
                            <div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> View Profile</button></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#">HP Enterprise Service</a>
                        </td>
                        <td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu vel fringilla tincidunt.</td>
                        <td>
                            <div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> View Profile</button></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#">HP Enterprise Service</a>
                        </td>
                        <td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu vel fringilla tincidunt.</td>
                        <td>
                            <div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> View Profile</button></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#">HP Enterprise Service</a>
                        </td>
                        <td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu vel fringilla tincidunt.</td>
                        <td>
                            <div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> View Profile</button></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#">HP Enterprise Service</a>
                        </td>
                        <td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu vel fringilla tincidunt.</td>
                        <td>
                            <div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> View Profile</button></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#">HP Enterprise Service</a>
                        </td>
                        <td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu vel fringilla tincidunt.</td>
                        <td>
                            <div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> View Profile</button></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#">HP Enterprise Service</a>
                        </td>
                        <td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu vel fringilla tincidunt.</td>
                        <td>
                            <div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> View Profile</button></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#">HP Enterprise Service</a>
                        </td>
                        <td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu vel fringilla tincidunt.</td>
                        <td>
                            <div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> View Profile</button></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#">HP Enterprise Service</a>
                        </td>
                        <td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu vel fringilla tincidunt.</td>
                        <td>
                            <div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> View Profile</button></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#">HP Enterprise Service</a>
                        </td>
                        <td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu vel fringilla tincidunt.</td>
                        <td>
                            <div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> View Profile</button></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#">HP Enterprise Service</a>
                        </td>
                        <td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu vel fringilla tincidunt.</td>
                        <td>
                            <div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> View Profile</button></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#">HP Enterprise Service</a>
                        </td>
                        <td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porttitor arcu vel fringilla tincidunt.</td>
                        <td>
                            <div class="col-md-4"><button class="btn-u btn-brd rounded-2x btn-u-aqua btn-u-xs" type="button"> View Profile</button></div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- End Table Search Panel v1 -->
    </div>
@endsection

