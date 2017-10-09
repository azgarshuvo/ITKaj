<?php
/**
 * Created by PhpStorm.
 * User: zakariya
 * Date: 09-Oct-17
 * Time: 2:17 PM
 */
?>
<!DOCTYPE html>
<html>
<head>
    @include('layouts.admin.head')
</head>
<body>
<div id="wrapper">
    @include('layouts.admin.navBar')
    <div id="page-wrapper" class="gray-bg">
        @include('layouts.admin.topNavBar')
        @yield('container')
        @include('layouts.admin.footer')
    </div>
</div>
    @include('layouts.admin.script')
</body>
</html>

