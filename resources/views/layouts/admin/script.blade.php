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
<script src="{{asset('admin/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('admin/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

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



        // $().tooltip();
        // $(selector).on('click', function(){
        //   $(selector).removeClass('active');
        //   $(this).addClass('active');
        // });
        /* Init DataTables */
        // var oTable = $('#editable').dataTable();
        //
        // /* Apply the jEditable handlers to the table */
        // oTable.$('td').editable( '../example_ajax.php', {
        //     "callback": function( sValue, y ) {
        //         var aPos = oTable.fnGetPosition( this );
        //         oTable.fnUpdate( sValue, aPos[0], aPos[1] );
        //     },
        //     "submitdata": function ( value, settings ) {
        //         return {
        //             "row_id": this.parentNode.getAttribute('id'),
        //             "column": oTable.fnGetPosition( this )[2]
        //         };
        //     },
        //
        //     "width": "90%",
        //     "height": "100%"
        // } );

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


        //first update

//        var $image = $(".image-crop > img")
//        $($image).cropper({
//            aspectRatio: 1.618,
//            preview: ".img-preview",
//            done: function(data) {
//                // Output the result data for cropping image.
//            }
//        });
//
//        var $inputImage = $("#inputImage");
//        if (window.FileReader) {
//            $inputImage.change(function() {
//                var fileReader = new FileReader(),
//                    files = this.files,
//                    file;
//
//                if (!files.length) {
//                    return;
//                }
//
//                file = files[0];
//
//                if (/^image\/\w+$/.test(file.type)) {
//                    fileReader.readAsDataURL(file);
//                    fileReader.onload = function () {
//                        $inputImage.val("");
//                        $image.cropper("reset", true).cropper("replace", this.result);
//                    };
//                } else {
//                    showMessage("Please choose an image file.");
//                }
//            });
//        } else {
//            $inputImage.addClass("hide");
//        }
//
//        $("#download").click(function() {
//            window.open($image.cropper("getDataURL"));
//        });
//
//        $("#zoomIn").click(function() {
//            $image.cropper("zoom", 0.1);
//        });
//
//        $("#zoomOut").click(function() {
//            $image.cropper("zoom", -0.1);
//        });
//
//        $("#rotateLeft").click(function() {
//            $image.cropper("rotate", 45);
//        });
//
//        $("#rotateRight").click(function() {
//            $image.cropper("rotate", -45);
//        });
//
//        $("#setDrag").click(function() {
//            $image.cropper("setDragMode", "crop");
//        });


//
//        $('#data_1 .input-group.date').datepicker({
//            todayBtn: "linked",
//            keyboardNavigation: false,
//            forceParse: false,
//            calendarWeeks: true,
//            autoclose: true
//        });

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

//        $('#data_4 .input-group.date').datepicker({
//            minViewMode: 1,
//            keyboardNavigation: false,
//            forceParse: false,
//            autoclose: true,
//            todayHighlight: true
//        });
//
//        $('#data_5 .input-daterange').datepicker({
//            keyboardNavigation: false,
//            forceParse: false,
//            autoclose: true
//        });



//        var elem = document.querySelector('.js-switch');
//        var switchery = new Switchery(elem, { color: '#1AB394' });
//
//        var elem_2 = document.querySelector('.js-switch_2');
//        var switchery_2 = new Switchery(elem_2, { color: '#ED5565' });
//
//        var elem_3 = document.querySelector('.js-switch_3');
//        var switchery_3 = new Switchery(elem_3, { color: '#1AB394' });
//
//        $('.i-checks').iCheck({
//            checkboxClass: 'icheckbox_square-green',
//            radioClass: 'iradio_square-green',
//        });
//
//        $('.demo1').colorpicker();
//
//        var divStyle = $('.back-change')[0].style;
//        $('#demo_apidemo').colorpicker({
//            color: divStyle.backgroundColor
//        }).on('changeColor', function(ev) {
//            divStyle.backgroundColor = ev.color.toHex();
//        });

        //First Update End Here

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

    //Function to show image before upload
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
        });

</script>
