<?php
/**
 * Created by PhpStorm.
 * User: zakariya
 * Date: 09-Oct-17
 * Time: 2:19 PM
 */
?>
@extends('layouts.admin.master')

@section('title', 'Add Admin')

@section('content')
    <div class="wrapper wrapper-content">
      <div class="ibox">
        <div class="ibox-title">
            <h5>Category List</h5>
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
            <th>Category</th>
            <th>Sub Category</th>
            <th>Action</th>
        </tr>
        </thead>
          <tbody>
            <tr class="gradeX">
              <td>01</td>
              <td>Web Development</td>
              <td>
                <table class="table table-striped table-bordered table-hover">
                  <tr>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                  <tr>
                    <td>HTML</td>
                    <td>
                      <a class="btn btn-sm btn-info" href="" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></a>
                      <a class="btn btn-sm btn-primary" href=""  data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                      <a class="btn btn-sm btn-danger" href=""  data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i></a>
                    </td>
                  </tr>
                </table>
              </td>
              <td class="center">
                <a class="btn btn-sm btn-info" href=""  data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></a>
                <a class="btn btn-sm btn-primary" href=""  data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                <a class="btn btn-sm btn-danger" href=""  data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i></a>
              </td>
            </tr>

            <tr class="gradeX">
              <td>01</td>
              <td>Web Development</td>
              <td>
                <table class="table table-striped table-bordered table-hover">
                  <tr>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                  <tr>
                    <td>HTML</td>
                    <td>
                      <a class="btn btn-sm btn-info" href=""><i class="fa fa-eye"></i></a>
                      <a class="btn btn-sm btn-primary" href=""><i class="fa fa-edit"></i></a>
                      <a class="btn btn-sm btn-danger" href=""><i class="fa fa-times"></i></a>
                    </td>
                  </tr>
                  <tr>
                    <td>HTML</td>
                    <td>
                      <a class="btn btn-sm btn-info" href=""><i class="fa fa-eye"></i></a>
                      <a class="btn btn-sm btn-primary" href=""><i class="fa fa-edit"></i></a>
                      <a class="btn btn-sm btn-danger" href=""><i class="fa fa-times"></i></a>
                    </td>
                  </tr>
                  <tr>
                    <td>HTML</td>
                    <td>
                      <a class="btn btn-sm btn-info" href=""><i class="fa fa-eye"></i></a>
                      <a class="btn btn-sm btn-primary" href=""><i class="fa fa-edit"></i></a>
                      <a class="btn btn-sm btn-danger" href=""><i class="fa fa-times"></i></a>
                    </td>
                  </tr>
                  <tr>
                    <td>HTML</td>
                    <td>
                      <a class="btn btn-sm btn-info" href=""><i class="fa fa-eye"></i></a>
                      <a class="btn btn-sm btn-primary" href=""><i class="fa fa-edit"></i></a>
                      <a class="btn btn-sm btn-danger" href=""><i class="fa fa-times"></i></a>
                    </td>
                  </tr>
                  <tr>
                    <td>HTML</td>
                    <td>
                      <a class="btn btn-sm btn-info" href=""><i class="fa fa-eye"></i></a>
                      <a class="btn btn-sm btn-primary" href=""><i class="fa fa-edit"></i></a>
                      <a class="btn btn-sm btn-danger" href=""><i class="fa fa-times"></i></a>
                    </td>
                  </tr>
                </table>
              </td>
              <td class="center">
                <a class="btn btn-sm btn-info" href=""><i class="fa fa-eye"></i></a>
                <a class="btn btn-sm btn-primary" href=""><i class="fa fa-edit"></i></a>
                <a class="btn btn-sm btn-danger" href=""><i class="fa fa-times"></i></a>
              </td>
            </tr>

            <tr class="gradeX">
              <td>01</td>
              <td>Web Development</td>
              <td>
                <table class="table table-striped table-bordered table-hover">
                  <tr>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                  <tr>
                    <td>HTML</td>
                    <td>
                      <a class="btn btn-sm btn-info" href=""><i class="fa fa-eye"></i></a>
                      <a class="btn btn-sm btn-primary" href=""><i class="fa fa-edit"></i></a>
                      <a class="btn btn-sm btn-danger" href=""><i class="fa fa-times"></i></a>
                    </td>
                  </tr>
                  <tr>
                    <td>HTML</td>
                    <td>
                      <a class="btn btn-sm btn-info" href=""><i class="fa fa-eye"></i></a>
                      <a class="btn btn-sm btn-primary" href=""><i class="fa fa-edit"></i></a>
                      <a class="btn btn-sm btn-danger" href=""><i class="fa fa-times"></i></a>
                    </td>
                  </tr>
                  <tr>
                    <td>HTML</td>
                    <td>
                      <a class="btn btn-sm btn-info" href=""><i class="fa fa-eye"></i></a>
                      <a class="btn btn-sm btn-primary" href=""><i class="fa fa-edit"></i></a>
                      <a class="btn btn-sm btn-danger" href=""><i class="fa fa-times"></i></a>
                    </td>
                  </tr>
                  <tr>
                    <td>HTML</td>
                    <td>
                      <a class="btn btn-sm btn-info" href=""><i class="fa fa-eye"></i></a>
                      <a class="btn btn-sm btn-primary" href=""><i class="fa fa-edit"></i></a>
                      <a class="btn btn-sm btn-danger" href=""><i class="fa fa-times"></i></a>
                    </td>
                  </tr>
                  <tr>
                    <td>HTML</td>
                    <td>
                      <a class="btn btn-sm btn-info" href=""><i class="fa fa-eye"></i></a>
                      <a class="btn btn-sm btn-primary" href=""><i class="fa fa-edit"></i></a>
                      <a class="btn btn-sm btn-danger" href=""><i class="fa fa-times"></i></a>
                    </td>
                  </tr>
                </table>
              </td>
              <td class="center">
                <a class="btn btn-sm btn-info" href=""><i class="fa fa-eye"></i></a>
                <a class="btn btn-sm btn-primary" href=""><i class="fa fa-edit"></i></a>
                <a class="btn btn-sm btn-danger" href=""><i class="fa fa-times"></i></a>
              </td>
            </tr>

            <tr class="gradeX">
              <td>01</td>
              <td>Web Development</td>
              <td>
                <table class="table table-striped table-bordered table-hover">
                  <tr>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                  <tr>
                    <td>HTML</td>
                    <td>
                      <a class="btn btn-sm btn-info" href=""><i class="fa fa-eye"></i></a>
                      <a class="btn btn-sm btn-primary" href=""><i class="fa fa-edit"></i></a>
                      <a class="btn btn-sm btn-danger" href=""><i class="fa fa-times"></i></a>
                    </td>
                  </tr>
                  <tr>
                    <td>HTML</td>
                    <td>
                      <a class="btn btn-sm btn-info" href=""><i class="fa fa-eye"></i></a>
                      <a class="btn btn-sm btn-primary" href=""><i class="fa fa-edit"></i></a>
                      <a class="btn btn-sm btn-danger" href=""><i class="fa fa-times"></i></a>
                    </td>
                  </tr>
                  <tr>
                    <td>HTML</td>
                    <td>
                      <a class="btn btn-sm btn-info" href=""><i class="fa fa-eye"></i></a>
                      <a class="btn btn-sm btn-primary" href=""><i class="fa fa-edit"></i></a>
                      <a class="btn btn-sm btn-danger" href=""><i class="fa fa-times"></i></a>
                    </td>
                  </tr>
                  <tr>
                    <td>HTML</td>
                    <td>
                      <a class="btn btn-sm btn-info" href=""><i class="fa fa-eye"></i></a>
                      <a class="btn btn-sm btn-primary" href=""><i class="fa fa-edit"></i></a>
                      <a class="btn btn-sm btn-danger" href=""><i class="fa fa-times"></i></a>
                    </td>
                  </tr>
                  <tr>
                    <td>HTML</td>
                    <td>
                      <a class="btn btn-sm btn-info" href=""><i class="fa fa-eye"></i></a>
                      <a class="btn btn-sm btn-primary" href=""><i class="fa fa-edit"></i></a>
                      <a class="btn btn-sm btn-danger" href=""><i class="fa fa-times"></i></a>
                    </td>
                  </tr>
                </table>
              </td>
              <td class="center">
                <a class="btn btn-sm btn-info" href=""><i class="fa fa-eye"></i></a>
                <a class="btn btn-sm btn-primary" href=""><i class="fa fa-edit"></i></a>
                <a class="btn btn-sm btn-danger" href=""><i class="fa fa-times"></i></a>
              </td>
            </tr>
          </tbody>
        </table>

        </div>
    </div>
    </div>
@endsection
