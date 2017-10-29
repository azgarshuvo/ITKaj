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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | @yield('title')</title>

    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <!-- Morris -->
    <link href="{{asset('admin/css/plugins/morris/morris-0.4.3.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/pages/shortcode_timeline2.css')}}">
    <link href="{{asset('admin/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">

    <!-- Data Tables -->
    <link href="{{asset('admin/css/plugins/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/plugins/dataTables/dataTables.responsive.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/plugins/dataTables/dataTables.tableTools.min.css')}}" rel="stylesheet">

    {{--chosen--}}
    <link href="{{asset('admin/css/plugins/chosen/chosen.css')}}" rel="stylesheet">



    {{--DropZone--}}
    <link href="{{asset('admin/css/plugins/dropzone/dropzone2.css')}}" rel="stylesheet">

    <link href="{{asset('admin/css/plugins/dropzone/basic.css')}}" rel="stylesheet">

    <!-- cropper -->
    <link href="{{asset('admin/css/plugins/cropper/cropper.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
    {{--Select 2--}}
</head>
<body>
<div id="wrapper">
    @include('layouts.admin.navBar')
    <div id="page-wrapper" class="gray-bg">
        @include('layouts.admin.topNavBar')
        @yield('content')
        @include('layouts.admin.footer')
    </div>
</div>
<?php
/**
 * Created by PhpStorm.
 * User: zakariya
 * Date: 09-Oct-17
 * Time: 2:39 PM
 */
?>

<!-- Mainly scripts -->
<script src="{{asset('admin/js/jquery-2.1.1.js')}}"></script>
<script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/js/plugins/chosen/chosen.jquery.js')}}"></script>
<script src="{{asset('admin/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('admin/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
{{--Select 2--}}
<script type="text/javascript" src="{{asset('assets/js/select2.min.js')}}"></script>


<script src="{{asset('admin/js/plugins/dropzone/dropzone.js')}}"></script>
<!-- Flot -->
<script src="{{asset('admin/js/plugins/flot/jquery.flot.js')}}"></script>
<script src="{{asset('admin/js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{asset('admin/js/plugins/flot/jquery.flot.spline.js')}}"></script>
<script src="{{asset('admin/js/plugins/flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('admin/js/plugins/flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('admin/js/plugins/flot/jquery.flot.symbol.js')}}"></script>
<script src="{{asset('admin/js/plugins/flot/curvedLines.js')}}"></script>

<!-- Peity -->
<script src="{{asset('admin/js/plugins/peity/jquery.peity.min.js')}}"></script>
<script src="{{asset('admin/js/demo/peity-demo.js')}}"></script>
<!-- Custom and plugin javascript -->
<script src="{{asset('admin/js/inspinia.js')}}"></script>
<script src="{{asset('admin/js/plugins/pace/pace.min.js')}}"></script>

<script src="{{asset('admin/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('admin/js/plugins/cropper/cropper.min.js')}}"></script>

<!-- jQuery UI -->
<script src="{{asset('admin/js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<!-- Jvectormap -->
<script src="{{asset('admin/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('admin/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>

<!-- Sparkline -->
<script src="{{asset('admin/js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>

<!-- Sparkline demo data  -->
<script src="{{asset('admin/js/demo/sparkline-demo.js')}}"></script>

<!-- ChartJS-->
<script src="{{asset('admin/js/plugins/chartJs/Chart.min.js')}}"></script>

<!-- Data Tables -->
<script src="{{asset('admin/js/plugins/dataTables/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin/js/plugins/dataTables/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('admin/js/plugins/dataTables/dataTables.responsive.js')}}"></script>
<script src="{{asset('admin/js/plugins/dataTables/dataTables.tableTools.min.js')}}"></script>
<!-- end of dataTables -->

<script>
    $(document).ready(function() {

        $('.dataTables-example').dataTable({
            responsive: true,
            "dom": 'T<"clear">lfrtip',
            "tableTools": {
                "sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
            }
        });

        $('#data_2 .input-group.date').datepicker({
            startView: 1,
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });

        $('#data_3 .input-group.date').datepicker({
            startView: 2,
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });


    });

</script>
{{--This script for chosen multi select--}}
<script type="text/javascript">
    var config = {
        '.chosen-select'           : {},
        '.chosen-select-deselect'  : {allow_single_deselect:true},
        '.chosen-select-no-single' : {disable_search_threshold:10},
        '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
        '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }
</script>

</body>
</html>

