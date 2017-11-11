<?php
/**
 * Created by PhpStorm.
 * User: shuvo
 * Date: 09-Oct-17
 * Time: 5:57 PM
 */
?>
@extends('layouts.admin.master')

@section('title', 'Conversion')

@section('content')
    <div class="wrapper wrapper-content">
        @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Message List</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">

                    <ul class="list-unstyled" id="messageBody">
                        @if(sizeof($conversion)>0)
                            @if($conversion->message)
                                @foreach($conversion->message as $message)
                                    @if($message->sender == "admin")
                                        @if(strlen($message->message)>0)
                                            <li class="sender"><p class="message">{{$message->message}}</p></li>
                                        @else
                                            <li class="sender"><p class="message attachmentDownload"><u>{{$message->attachment}}</u></p></li>
                                        @endif
                                    @else
                                        @if(strlen($message->message)>0)
                                            <li class="receiver"><p class="message">{{$message->message}}</p></li>
                                        @else
                                            <li class="receiver"><p class="message attachmentDownload"><u>{{$message->attachment}}</u></p></li>
                                        @endif
                                    @endif
                                @endforeach
                            @endif
                        @endif
                    </ul>

                    <section class="receiver">
                        <form class="sky-form custom" method="post">
                            <span class="textarea ">
                                <textarea class="form-control" id="message" rows="3"></textarea>
                            </span>
                            <span onclick="clickFileType()" class="glyphicon glyphicon-paperclip btn"></span>
                            <button onclick="sendMessage()" type="button" class="btn btn-success send-btn">Send</button>
                            <input name="attachment[]" class="hidden" type="file" id="messageAttachment" multiple="multiple">
                        </form>
                    </section>

            </div>
        </div>
    </div>
    <script>

        function clickFileType(){
            $("#messageAttachment").click();
        }


        function sendMessage(){
            var conversionId = '@if(sizeof($conversion)>0){{$conversion->id}}@endif';
            var message = $("#message").val();

            if ($.trim(message)) {

                var messageBody = '<li class="sender"><p class="message">' + message + '</p></li>';
                $.ajax({
                    type: 'POST',
                    url: '{{route('AdminSendUserMessage')}}',
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
                url:'{{route('getAdminMessage')}}',

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
            getMessages('@if(sizeof($conversion)>0){{$conversion->id}} @else 0 @endif');

        }, 5000);
    </script>

@endsection
