<?php
/**
 * Created by PhpStorm.
 * User: zakariya
 * Date: 07-Oct-17
 * Time: 5:07 PM
 */
?>
<!-- JS Global Compulsory -->
<script type="text/javascript" src="{{asset('assets/plugins/bootstrap-3.3.7/js/jquery-1.12.4.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/bootstrap-3.3.7/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/bootstrap-3.3.7/js/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/jquery/jquery-migrate.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/bootstrap-3.3.7/js/bootstrap.min.js')}}"></script>

<!-- JS Implementing Plugins -->
<script type="text/javascript" src="{{asset('assets/plugins/back-to-top.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/smoothScroll.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/jquery.parallax.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/counter/waypoints.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/counter/jquery.counterup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/owl-carousel/owl-carousel/owl.carousel.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/counter/waypoints.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/counter/jquery.counterup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- JS Customization -->
<script type="text/javascript" src="{{asset('assets/js/custom.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/select2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/dropzone.js')}}"></script>
<!-- JS Page Level -->
<script type="text/javascript" src="{{asset('assets/js/app.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/plugins/owl-carousel.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/plugins/style-switcher.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/plugins/datepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/plugins/style-switcher.js')}}"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
        App.initCounter();
        App.initParallaxBg();
        OwlCarousel.initOwlCarousel();
        StyleSwitcher.initStyleSwitcher();
    });
</script>
@yield('script')

<!--[if lt IE 9]>
<script src="{{asset('assets/plugins/respond.js')}}"></script>
<script src="{{asset('assets/plugins/html5shiv.js')}}"></script>
<script src="{{asset('assets/plugins/placeholder-IE-fixes.js')}}"></script>
<![endif]-->




