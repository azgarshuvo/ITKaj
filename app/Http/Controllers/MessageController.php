<?php

namespace App\Http\Controllers;

use App\Conversion;
use App\Message;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;

class MessageController extends Controller
{
    private  $userId = 0;
    public  function __construct()
    {
        $this->userId =auth()->user()->id;

    }

    #get Message list
    public function Message()
    {
        $adminList = User::where(['user_type'=>"admin"])->get();
        $unreadConversion = Conversion::with(['UserUnreadMessage','getAdmin'])->get();
        //dd($adminList);
        return view('front.message.adminlist',['adminList'=>$adminList,'unreadConversion'=>$unreadConversion]);
    }

    #send user message to admin
    public function MessageSend(Request $request){
        $message = $request->input('message');
        $conversionId = $request->input('conversionId');
        $time = date("h:i:sa");
        $date = date("Y-m-d");
        Message::create(['conversion_id'=>$conversionId,'message'=>$message,'time'=>$time,'date'=>$date,'sender'=>'user']);
    }

    #get message by user id
    public function GetMessage(){
        $adminId =  Input::get('adminId');
        $conversion = Conversion::where(['admin_id'=>$adminId,'user_id'=>$this->userId])->first();
        if (sizeof($conversion)==1){
            return redirect()->route('getConversion',['conversionId'=>$conversion->id]);
        }else {
            if (sizeof(User::where(['id' => $adminId])->first()) == 1){
                $conversionCreate = Conversion::create(['admin_id' => $adminId, 'user_id' => $this->userId]);
                $conversionId = $conversionCreate->id;
                return redirect()->route('getConversion', ['conversionId' => $conversionId]);
            }else{
                return redirect()->route('message');
            }
        }
    }
    #get conversion messages
    public function GetConversionMessage($conversionId){
        $adminList = User::where(['user_type'=>"admin"])->get();
        $conversion = Conversion::with('message')->where(['id'=>$conversionId,'user_id'=>$this->userId])->orderBy('id', 'asc')->first();
//        dd($conversion);
        $admin = User::find($conversion->admin_id);
//dd($admin);
        Message::where(['conversion_id'=>$conversionId,'is_read'=>0,'sender'=>'admin'])->update(['is_read'=>1]);
//        return (['adminList'=>$adminList, 'conversion' =>$conversion]);
//        return view('front.message.message',['adminList'=>$adminList,'conversion'=>$conversion]);
        return view('messaging.messageBody',['adminList'=>$adminList,'conversion'=>$conversion, 'admin' => $admin]);
    }

    #get user message
    public function MessageGet(Request $request){
        $conversionId = $request->input('conversionId');
        if ($conversionId!=0){
            $message =  Message::where(['conversion_id'=>$conversionId,'is_read'=>0,'sender'=>'admin'])->get();

            if (sizeof($message)>0){
                foreach ($message as $text){
                    if(strlen($text->message)>0){
//                        echo '<li class="sender"><p class="message">'.$text->message.'</p></li>';
                        echo '<div class="direct-chat-msg"> <div class="direct-chat-text message">'.$text->message.'</div> <div class="direct-chat-info clearfix"> <span class="direct-chat-timestamp pull-left">'.$text->time.'</span> </div> </div>';
                    }else{
//                        echo '<li class="sender"><p class="message attachmentDownload">'.$text->attachment.'</p></li>';
                        echo '<div class="direct-chat-msg"> <div class="direct-chat-text message">'.$text->attachment.'</div> <div class="direct-chat-info clearfix"> <span class="direct-chat-timestamp pull-left">'.$text->time.'</span> </div> </div>';
                    }

                }
                Message::where(['conversion_id'=>$conversionId,'is_read'=>0,'sender'=>'admin'])->update(['is_read'=>1]);
            }else{
                echo null;
            }
        }
    }

    #send user attachment
    public function SendAttachment(Request $request){
        if($request->hasFile('attachment')) {
            $files = $request->file('attachment');
            $conversionId = $request->input('conversionId');
            $time = date("h:i:sa");
            $date = date("Y-m-d");

            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();

                $attachFile = date('His') . $filename;

                $destinationPath = base_path() . '\public\message_attachment';

                $file->move($destinationPath, $attachFile);

                Message::create(['conversion_id'=>$conversionId,'attachment'=>$attachFile,'time'=>$time,'date'=>$date,'sender'=>'user']);

//                echo '<li class="receiver"><p class="message attachmentDownload">'. $attachFile.'</p></li>';
                echo '<div class="direct-chat-msg"> <div class="direct-chat-text message attachmentDownload">'. $attachFile.'</div> <div class="direct-chat-info clearfix"> <span class="direct-chat-timestamp pull-right"></span> </div> </div>';
            }

        }
    }

    #message attachment download
    public function getAttachmentDownload(Request $request)
    {
        $attachment = $request->input('attachment');
        $file= public_path(). "/message_attachment/".$attachment;
        return response()->download($file);
    }

    #message notification for user
    public function getNotification(){
        $unreadMessage = Message::with('getConversion')->where(['is_read'=>0])->where(['sender'=>'admin'])->get();
        echo $unreadMessage->count();
    }

    public function getAdminMessageStatus(Request $request){
        $unreadConversion = Conversion::with(['UserUnreadMessage','getAdmin'])->get();
        $admin = array();

        foreach ($unreadConversion as $conversion) {
            if (!in_array($conversion->getAdmin->id, $admin)){
                array_push($admin,$conversion->getAdmin->id);
                echo '<li class="sender_p active-li"><h3><a href="' . route('getMessage', ['adminId' => $conversion->getAdmin->id]) . '">' . $conversion->getAdmin->fname . ' ' . $conversion->getAdmin->lname . '<span class="badge badge-dark rounded">' . $conversion->UserUnreadMessage->count() . '</span>
                                </a>';
            if ($conversion->UserUnreadMessage->count() > 0) {
                echo '<span class="pull-right status-time">' . $conversion->UserUnreadMessage[0]->time . '</span>';
            }
            echo '</h3></li>';
        }
        }


    }


}
