<?php
/**
 * Created by PhpStorm.
 * User: Zakariya Omar Naseef
 * Date: 15-Nov-17
 * Time: 12:47 PM
 */
?>
<div class="popup-head">
    <div class="popup-head-left pull-left font-size-14">{{$admin->fname}}</div>
    <div class="popup-head-right pull-right">
        <button data-widget="remove" id="removeClass" onclick="closeChat()" class="chat-header-button pull-right removeClass" type="button"><i class="fa fa-times"></i></button>
    </div>
</div>
<div class="popup-messages">
    <div class="direct-chat-messages" id="messageBody">
        @if(sizeof($conversion)>0)
            @if($conversion->message)
                @foreach($conversion->message as $message)
                    @if($message->sender == "admin")
                        @if(strlen($message->message)>0)
                            <div class="direct-chat-msg">
                                <div class="direct-chat-text message">
                                    {{$message->message}}
                                </div>
                                <div class="direct-chat-info clearfix">
                                    <span class="direct-chat-timestamp pull-left">{{$message->time}}</span>
                                </div>
                            </div>
                        @else
                            <div class="direct-chat-msg">
                                <div class="direct-chat-text message attachmentDownload">
                                    {{$message->attachment}}
                                </div>
                                <div class="direct-chat-info clearfix">
                                    <span class="direct-chat-timestamp pull-left">{{$message->time}}</span>
                                </div>
                            </div>
                        @endif
                    @else
                        @if(strlen($message->message)>0)
                            <div class="direct-chat-msg">
                                <div class="direct-chat-text message">
                                    {{$message->message}}
                                </div>
                                <div class="direct-chat-info clearfix">
                                    <span class="direct-chat-timestamp pull-right">{{$message->time}}</span>
                                </div>
                            </div>
                        @else
                            <div class="direct-chat-msg">
                                <div class="direct-chat-text message attachmentDownload">
                                    {{$message->attachment}}
                                </div>
                                <div class="direct-chat-info clearfix">
                                    <span class="direct-chat-timestamp pull-right">{{$message->time}}</span>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            @endif
        @endif
    </div>
</div>
<form id="messageForm" class="sky-form custom" method="post">
    {{csrf_field()}}
    <div class="popup-messages-footer">
        <input type="hidden" name="conversionId" value="{{$conversion->id}}">
        <textarea id="message" placeholder="Type a message..." rows="10" cols="40" name="message"></textarea>
        <div class="btn-footer">
            <button type="button" class="bg_none" onclick="openAttachment()"><i class="glyphicon glyphicon-paperclip"></i> </button>
            <input name="attachment[]" class="hidden" type="file" id="messageAttachment" multiple="multiple">
        </div>
        {{--<button onclick="sendMessage()" type="button" class="btn btn-success send-btn">Send</button>--}}
    </div>
</form>

<script type="text/javascript">
    jQuery('#message').keydown(function(event) {
        if (event.keyCode == 13) {
            sendMessage();
        }
    });
</script>

<script>
    $(document).ready(function() {
        getAdminMessageStatus(0);
    });

    function sendMessage(){
        var conversionId = '@if(sizeof($conversion)>0){{$conversion->id}}@endif';
        var message = $("#message").val();
//        var now = new Date(),
//            now = now.getHours()+':'+now.getMinutes()+':'+now.getSeconds();
        var date = new Date();
        var hours = date.getHours() > 12 ? date.getHours() - 12 : date.getHours();
        var am_pm = date.getHours() >= 12 ? "PM" : "AM";
        hours = hours < 10 ? "0" + hours : hours;
        var minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
        var seconds = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();
        time = hours + ":" + minutes + ":" + seconds + " " + am_pm;
        if ($.trim(message)) {

//            var messageBody = '<li class="receiver"><p class="message">' + message + '</p></li>';
            var messageBody = '<div class="direct-chat-msg"> <div class="direct-chat-text message">' + message + '</div> <div class="direct-chat-info clearfix"> <span class="direct-chat-timestamp pull-right">'+time+'</span> </div> </div>';
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

    /*Open attachment window*/
    function openAttachment(){
        $("#messageAttachment").click();
    }

    $("#messageAttachment").change(function(){
        var fd = new FormData();

        var ins = document.getElementById('messageAttachment').files.length;
        for (var x = 0; x < ins; x++) {
            fd.append("attachment[]", document.getElementById('messageAttachment').files[x]);
        }
        fd.append("_token", '<?php echo csrf_token() ?>');
        fd.append("conversionId", '@if(sizeof($conversion)>0){{$conversion->id}}@else 0 @endif');


        $.ajax({
            url:'{{ route('sendAttachmentUser') }}',
            type: 'POST',
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
            success: function (data) {
                $("#messageBody").append(data);
            },
        });
    });

    /* /!*Download message attachment*!/
     function downloadAttachment(file){
         alert(file);
     }*/

    /* /!*Download message attachment*!/ */
    $('body').on('click', '.attachmentDownload', function (){
        var attachment =  $(this).text();

        $.ajax({
            type:'POST',
            url:'{{route('messageAttachmentDownload')}}',

            data:{'_token': '<?php echo csrf_token() ?>','attachment':$.trim(attachment)},
            success:function(data){
                var blob = new Blob([data]);
                // console.log(blob.size);
                var a = document.createElement('a');
                a.style = "display: none";
                var url = window.URL.createObjectURL(blob);
                a.href = url;
                a.download = attachment;
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                window.URL.revokeObjectURL(url);

            }
        });
    });

    /* $(".attachmentDownload").click(function(){

        var file =  $(this).text();
        alert(file);
     });*/

    function getAdminMessageStatus(conversionId){
        $.ajax({
            type:'POST',
            url:'{{route('adminMessageStatus')}}',

            data:{'_token': '<?php echo csrf_token() ?>','conversionId':conversionId},
            success:function(data){
                $("#adminStatus").html(data);
            }
        });
    }

    function getMessages(conversionId){
        getAdminMessageStatus(conversionId);
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