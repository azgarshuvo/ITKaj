<?php
/**
 * Created by PhpStorm.
 * User: zakariya
 * Date: 07-Oct-17
 * Time: 5:07 PM
 */
?>

<script type="text/javascript">
    $(document).ready(function() {
        getUserNotification();

    });


    setInterval(function(){
        getUserNotification();
    }, 5000);

    function getUserNotification(){

        $.ajax({
            type:'POST',
            url:'{{route('GetNotification')}}',

            data:{'_token': '<?php echo csrf_token() ?>'},
            success:function(data){
                $(".top-notification").html(data);
            }
        });

    }
</script>

<!-- JS Global Compulsory -->
<script type="text/javascript" src="{{asset('assets/js/jquery.redirect.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.session.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.numeric.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/bootstrap-3.3.7/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/bootstrap-3.3.7/js/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/jquery/jquery-migrate.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/bootstrap-3.3.7/js/bootstrap.min.js')}}"></script>

<!-- JS Implementing Plugins -->

<script type="text/javascript" src="{{asset('assets/plugins/back-to-top.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/smoothScroll.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/sky-forms-pro/skyforms/js/jquery.maskedinput.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/jquery.parallax.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/counter/waypoints.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/counter/jquery.counterup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/owl-carousel/owl-carousel/owl.carousel.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/counter/waypoints.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/counter/jquery.counterup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/sky-forms-pro/skyforms/js/jquery.form.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- JS Customization -->
<script type="text/javascript" src="{{asset('assets/js/custom.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/select2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/dropzone.js')}}"></script>
<!-- JS Page Level -->
<script type="text/javascript" src="{{asset('assets/js/app.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/plugins/owl-carousel.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/forms/order.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/forms/review.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/forms/checkout.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/plugins/style-switcher.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/plugins/datepicker.js')}}"></script>

<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
        App.initCounter();
        App.initParallaxBg();
        OwlCarousel.initOwlCarousel();
        StyleSwitcher.initStyleSwitcher();
        OrderForm.initOrderForm();
		ReviewForm.initReviewForm();
		CheckoutForm.initCheckoutForm();
        Datepicker.initDatepicker()
    });
</script>
<!--[if lt IE 9]>
<script src="{{asset('assets/plugins/respond.js')}}"></script>
<script src="{{asset('assets/plugins/html5shiv.js')}}"></script>
<script src="{{asset('assets/plugins/placeholder-IE-fixes.js')}}"></script>


<![endif]-->




