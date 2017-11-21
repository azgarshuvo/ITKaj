<?php
/**
 * Created by PhpStorm.
 * User: Zakariya Omar Naseef
 * Date: 21-Nov-17
 * Time: 4:27 PM
 */
?>
@extends('layouts.admin.master')

@section('title', 'Dashboard')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @if(Session::has('fail'))
            <div class="alert alert-success">{{ Session::get('fail') }}</div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Message to All Users</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" action="{{route('adminMessageForAllUsersPost')}}">
                            <input type="hidden" value="{{csrf_token()}}" name="_token">
                            <div class="form-group"><label class="col-sm-2 control-label">Message to Users</label>

                                <div class="col-sm-10"><textarea rows="4" cols="140" style="resize: none;" name="message">{{$message->message}}</textarea></div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label text-navy">Live</label>
                                <div class="col-sm-10">
                                    <input name="is_live" type="checkbox" @if($message->is_live == 1)checked @endif class="js-switch_3"  />
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

