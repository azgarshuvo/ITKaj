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
    {{--<link href="{{asset('admin/css/plugins/dropzone/dropzone.css')}}" rel="stylesheet">--}}
    {{--
    <link href="{{asset('admin/css/plugins/dropzone/basic.css')}}" rel="stylesheet">--}}

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

{{--<!-- Chosen -->--}}
{{--<script src="{{asset('admin/js/plugins/chosen/chosen.jquery.js')}}"></script>--}}
{{--<!-- JSKnob -->--}}
{{--<script src="{{asset('admin/js/plugins/jsKnob/jquery.knob.js')}}"></script>--}}
{{--<!-- Input Mask-->--}}
{{--<script src="{{asset('admin/js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>--}}
<!-- Data picker -->
<script src="{{asset('admin/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
{{--<!-- NouSlider -->--}}
{{--<script src="{{asset('admin/js/plugins/nouslider/jquery.nouislider.min.js')}}"></script>--}}
{{--<!-- Switchery -->--}}
{{--<script src="{{asset('admin/js/plugins/switchery/switchery.js')}}"></script>--}}
{{--<!-- IonRangeSlider -->--}}
{{--<script src="{{asset('admin/js/plugins/ionRangeSlider/ion.rangeSlider.min.js')}}"></script>--}}
{{--<!-- iCheck -->--}}
{{--<script src="{{asset('admin/js/plugins/iCheck/icheck.min.js')}}"></script>--}}
{{--<!-- Color picker -->--}}
{{--<script src="{{asset('admin/js/plugins/colorpicker/bootstrap-colorpicker.min.js')}}"></script>--}}
<!-- Image cropper -->
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

        var selector = '.nav li';
        var d1 = [[1262304000000, 6], [1264982400000, 3057], [1267401600000, 20434], [1270080000000, 31982], [1272672000000, 26602], [1275350400000, 27826], [1277942400000, 24302], [1280620800000, 24237], [1283299200000, 21004], [1285891200000, 12144], [1288569600000, 10577], [1291161600000, 10295]];
        var d2 = [[1262304000000, 5], [1264982400000, 200], [1267401600000, 1605], [1270080000000, 6129], [1272672000000, 11643], [1275350400000, 19055], [1277942400000, 30062], [1280620800000, 39197], [1283299200000, 37000], [1285891200000, 27000], [1288569600000, 21000], [1291161600000, 17000]];

        var data1 = [
            { label: "Data 1", data: d1, color: '#17a084'},
            { label: "Data 2", data: d2, color: '#127e68' }
        ];

        $('.dataTables-example').dataTable({
            responsive: true,
            "dom": 'T<"clear">lfrtip',
            "tableTools": {
                "sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
            }
        });




        $.plot($("#flot-chart1"), data1, {
            xaxis: {
                tickDecimals: 0
            },
            series: {
                lines: {
                    show: true,
                    fill: true,
                    fillColor: {
                        colors: [{
                            opacity: 1
                        }, {
                            opacity: 1
                        }]
                    },
                },
                points: {
                    width: 0.1,
                    show: false
                },
            },
            grid: {
                show: false,
                borderWidth: 0
            },
            legend: {
                show: false,
            }
        });

        var lineData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                {
                    label: "Example dataset",
                    fillColor: "rgba(220,220,220,0.5)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [65, 59, 40, 51, 36, 25, 40]
                },
                {
                    label: "Example dataset",
                    fillColor: "rgba(26,179,148,0.5)",
                    strokeColor: "rgba(26,179,148,0.7)",
                    pointColor: "rgba(26,179,148,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(26,179,148,1)",
                    data: [48, 48, 60, 39, 56, 37, 30]
                }
            ]
        };

        var lineOptions = {
            scaleShowGridLines: true,
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleGridLineWidth: 1,
            bezierCurve: true,
            bezierCurveTension: 0.4,
            pointDot: true,
            pointDotRadius: 4,
            pointDotStrokeWidth: 1,
            pointHitDetectionRadius: 20,
            datasetStroke: true,
            datasetStrokeWidth: 2,
            datasetFill: true,
            responsive: true,
        };


        var ctx = document.getElementById("lineChart").getContext("2d");
        var myNewChart = new Chart(ctx).Line(lineData, lineOptions);


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

    function yesnoCheck(rad){
        if(rad.value == "1"){
            document.getElementById("mySelect").disabled=true;
            document.getElementById('ifYes').style.display = 'none';
        }else{
            document.getElementById("mySelect").disabled=false;
            document.getElementById('ifYes').style.display = 'block';
        }
    }



    /*//Function to show image before upload
    function preview_image(event)
    {
        var reader = new FileReader();
        reader.onload = function()
        {
            var output = document.getElementById('output_image');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
    $(".alert").alert()

    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

        $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
    });*/


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

