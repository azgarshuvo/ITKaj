<?php
/**
 * Created by PhpStorm.
 * User: Zakariya Omar Naseef
 * Date: 14-Nov-17
 * Time: 3:06 PM
 */
?>
<div class="popup-box chat-popup qnimate" id="qnimate" >
    {{--<div class="popup-head">--}}
        {{--<div class="popup-head-left pull-left font-size-14">Gurdeep Osahan</div>--}}
        {{--<div class="popup-head-right pull-right">--}}
            {{--<button data-widget="remove" id="removeClass" class="chat-header-button pull-right removeClass" type="button"><i class="fa fa-times"></i></button>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="popup-messages">--}}
        {{--<div class="direct-chat-messages">--}}
            {{--<!-- Message to the left -->--}}
            {{--<div class="direct-chat-msg">--}}
                {{--<div class="direct-chat-text">--}}
                    {{--Hey bro, how’s everything going ?--}}
                {{--</div>--}}
                {{--<div class="direct-chat-info clearfix">--}}
                    {{--<span class="direct-chat-timestamp pull-left">3.36 PM</span>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<!-- Message to the right -->--}}
            {{--<div class="direct-chat-msg">--}}
                {{--<div class="direct-chat-text">--}}
                    {{--Hey bro, how’s everything going ?--}}
                {{--</div>--}}
                {{--<div class="direct-chat-info clearfix">--}}
                    {{--<span class="direct-chat-timestamp pull-right">3.36 PM</span>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="popup-messages-footer">--}}
        {{--<textarea id="status_message" placeholder="Type a message..." rows="10" cols="40" name="message"></textarea>--}}
        {{--<div class="btn-footer">--}}
            {{--<button class="bg_none"><i class="glyphicon glyphicon-film"></i> </button>--}}
            {{--<button class="bg_none"><i class="glyphicon glyphicon-camera"></i> </button>--}}
            {{--<button class="bg_none"><i class="glyphicon glyphicon-paperclip"></i> </button>--}}
            {{--<button class="bg_none pull-right"><i class="glyphicon glyphicon-thumbs-up"></i> </button>--}}
        {{--</div>--}}
    {{--</div>--}}
</div>
<script>
//    $(document).ready(function(){
//        $(".addClass").click(function () {
//            $('.qnimate').addClass('popup-box-on');
//        });
//
//        $(".removeClass").click(function () {
//            $('.qnimate').removeClass('popup-box-on');
//        });
//    })

    function openChat(){
        $('.qnimate').addClass('popup-box-on');
    }
    function closeChat(){
        $('.qnimate').removeClass('popup-box-on');
    }
</script>