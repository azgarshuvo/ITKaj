<?php

namespace App\Http\Controllers;

use App\Conversion;
use App\Message;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
        //dd($adminList);
        return view('front.message.adminlist',['adminList'=>$adminList]);
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
    public function GetMessage($adminId){
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

        Message::where(['conversion_id'=>$conversionId,'is_read'=>0,'sender'=>'admin'])->update(['is_read'=>1]);
        return view('front.message.message',['adminList'=>$adminList,'conversion'=>$conversion]);
    }

    #get user message
    public function MessageGet(Request $request){
        $conversionId = $request->input('conversionId');
        if ($conversionId!=0){
            $message =  Message::where(['conversion_id'=>$conversionId,'is_read'=>0,'sender'=>'admin'])->get();

            if (sizeof($message)>0){
                foreach ($message as $text){
                    if(strlen($text->message)>0){
                        echo '<li class="sender"><p class="message">'.$text->message.'</p></li>';
                    }else{
                        echo '<li class="sender"><p class="message attachmentDownload">'.$text->attachment.'</p></li>';
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

                echo '<li class="receiver"><p class="message attachmentDownload">'. $attachFile.'</p></li>';
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


}
