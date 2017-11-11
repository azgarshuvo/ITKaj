<?php
/**
 * Created by PhpStorm.
 * User: Polash
 * Date: 01-Nov-17
 * Time: 11:58 AM
 */

?>
@extends('layouts.front.master')

@section('title', 'Message')

@section('content')
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">Message</h1>
            <p class="message_show pull-right"></p>
        </div><!--/container-->
    </div><!--/breadcrumbs-->

    <div class="container content-sm">
        <div class="col-md-3">
            <div class="headline-v2"><h2>Admin List</h2></div>
            @if($adminList->count()>0)
            <ul class="list-unstyled blog-trending margin-bottom-50">
                @foreach($adminList as $admin)
                <li class="sender_p active-li">
                    <h3><a href="{{route('getMessage',['adminId'=>$admin->id])}}">{{$admin->fname}} {{$admin->lname}}</a></h3>
                   {{-- <small>23 Jan, 2015</small>--}}
                </li>
                @endforeach
            </ul>
            @endif
        </div>
        <div class="col-md-9">

            <ul class="list-unstyled" id="messageBody">
                @if(sizeof($conversion)>0)
                @if($conversion->message)
                    @foreach($conversion->message as $message)
                        @if($message->sender == "admin")
                            <li class="sender"><p class="message">{{$message->message}}</p></li>

                        @else
                            <li class="receiver"><p class="message">{{$message->message}}</p></li>
                        @endif
                    @endforeach
                @endif
                @endif
            </ul>

                <section class="receiver">
                    <form class="sky-form custom" method="post">
                            <span class="textarea ">
                                <textarea id="message" rows="3"></textarea>
                            </span>
                        <button onclick="sendMessage()" type="button" class="btn btn-success send-btn">Send</button>
                    </form>
                </section>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function sendMessage(){
            var conversionId = '@if(sizeof($conversion)>0){{$conversion->id}}@endif';
            var message = $("#message").val();
            if ($.trim(message)) {

                var messageBody = '<li class="receiver"><p class="message">' + message + '</p></li>';
                $.ajax({
                    type: 'POST',
                    url: '{{route('sendUserMessage')}}',
                    data: {'_token': '<?php echo csrf_token() ?>', 'message': message, 'conversionId': conversionId},
                    success: function (data) {
                        if (!$.trim(data)) {
                            $("#messageBody").append(messageBody);
                            $("#message").val("");
                        }
                        else {
                            $(".message_show").html(data);
                        }

                    }
                });
            }
        }

        function getMessages(conversionId){
            $.ajax({
                type:'POST',
                url:'{{route('getUserMessage')}}',

                data:{'_token': '<?php echo csrf_token() ?>','conversionId':conversionId},
                success:function(data){
                    if (!$.trim(data)) {

                    }
                    else {
                        $("#messageBody").append(data);
                    }

                }
            });
        }
        setInterval(function(){
            getMessages('@if(sizeof($conversion)>0){{$conversion->id}}@else 0 @endif');
            }, 5000);
    </script>
@endsection
