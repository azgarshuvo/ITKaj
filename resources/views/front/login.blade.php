<?php
/**
 * Created by PhpStorm.
 * User: zakariya
 * Date: 07-Oct-17
 * Time: 6:05 PM
 */
?>

@extends('layouts.front.master')

@section('title', 'Login')

@section('content')
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Login</h1>
        </div><!--/container-->
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->

    <!--=== Content Part ===-->
    <div class="container content">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{route('postLogin')}}" class="reg-page">
                    {{csrf_field()}}
                    <div class="reg-header">
                        <h2>Login to your account</h2>
                    </div>

                    <div class="input-group margin-bottom-20">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input name="username" type="text" placeholder="Username" class="form-control">
                    </div>
                    <div class="input-group margin-bottom-20">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input name="password" type="password" placeholder="Password" class="form-control">
                    </div>

                    <div class="row">
                        <div class="col-md-6 checkbox">
                            <label><input type="checkbox" name="remember"> Stay signed in</label>
                        </div>
                        <div class="col-md-6">
                            <button class="btn-u pull-right" type="submit">Login</button>
                        </div>
                    </div>

                    <hr>

                    <h4>Forget your Password ?</h4>
                    <p>no worries, <a class="color-green" href="#">click here</a> to reset your password.</p>
                </form>
            </div>
        </div><!--/row-->
    </div><!--/container-->
    <!--=== End Content Part ===-->
@endsection