<?php

namespace App\Http\Controllers\adminController;

use App\AdminMessage;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use App\Conversion;

use App\Http\Controllers\BaseControllerAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Validator;

class AdminMessageController extends BaseControllerAdmin
{
    private  $userId = 0;

    public  function __construct()
    {
        $this->userId =auth()->user()->id;
        parent::__construct();

    }
    public function UserList(){
        $userList = User::whereIn('user_type',["freelancer","employer"])->get();

        return view('admin.message.userList',['userList'=>$userList]);
    }

    public function AdminConversion($userId){

        $conversion = Conversion::where(['admin_id'=>$this->userId,'user_id'=>$userId])->first();
        if (sizeof($conversion)==1){
            return redirect()->route('admin-getConversion',['conversionId'=>$conversion->id]);
        }else {
            if (sizeof(User::where(['id' => $userId])->first()) == 1){
                $conversionCreate = Conversion::create(['admin_id' => $this->userId, 'user_id' => $userId]);
                $conversionId = $conversionCreate->id;
                return redirect()->route('admin-getConversion', ['conversionId' => $conversionId]);
            }else{
                return redirect()->route('admin-message');
            }
        }
    }

    #get message from conversion make make unread message to read
    public function AdminMessageConversion($conversionId){
        $userList = User::where(['user_type'=>"freelancer",'user_type'=>"employer"])->get();
        $conversion = Conversion::with('message')->where(['id'=>$conversionId,'admin_id'=>$this->userId])->orderBy('id', 'asc')->first();

        Message::where(['conversion_id'=>$conversionId,'is_read'=>0,'sender'=>'user'])->update(['is_read'=>1]);
        return view('admin.message.conversion',['userList'=>$userList,'conversion'=>$conversion]);
    }

    #send admin message to user
    public function AdminMessageSend(Request $request){
        $message = $request->input('message');
        $conversionId = $request->input('conversionId');
        $time = date("h:i:sa");
        $date = date("Y-m-d");

        Message::create(['conversion_id'=>$conversionId,'message'=>$message,'time'=>$time,'date'=>$date,'sender'=>'admin']);
    }

    #get Admin message
    public function MessageAdminGet(Request $request){
        $conversionId = $request->input('conversionId');
        if ($conversionId!=0){
            $message =  Message::where(['conversion_id'=>$conversionId,'is_read'=>0,'sender'=>'user'])->get();
            //   dd($message);
            if (sizeof($message)>0){
                foreach ($message as $text){
                    if(strlen($text->message)>0){
                        echo '<li class="receiver"><p class="message">'.$text->message.'</p></li>';
                    }else{
                        echo '<li class="receiver"><p class="message attachmentDownload"><u>'.$text->attachment.'</u></p></li>';
                    }
                }
                Message::where(['conversion_id'=>$conversionId,'is_read'=>0,'sender'=>'user'])->update(['is_read'=>1]);
            }else{
                echo null;
            }
        }
    }

    #Admin get Notification
    public function AdminGetNotification(Request $request){
        $unreadConversion = Conversion::with(['UnreadMessage','getUser'])->get();
        $unreadMessage = Message::with('getConversion')->where(['is_read'=>0])->where(['sender'=>'user'])->get();

        echo '<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell"></i>';
                      echo  '<span class="label label-primary" >'.$unreadMessage->count().'</span ></a><ul class="dropdown-menu dropdown-alerts notification-alert"><li>
                        <a href="'.route("admin-message").'">
                            <div class="text-center">
                                <i class="fa fa-envelope fa-fw"></i> You have '.$unreadMessage->count().'messages
                              
                            </div>
                        </a>
                    </li>';
                    foreach($unreadConversion as $conversion) {
                        if ($conversion->UnreadMessage->count() > 0) {
                           echo'<li class="divider" ></li >
                        <li >
                            <a href = "'.route("admin-getConversion",["conversionId"=>$conversion->id]).'" >
                                <div >
                                    <i class="fa fa-eye-slash" > </i >'.$conversion->UnreadMessage->count().' New Message From '.$conversion->getUser->fname.' '.$conversion->getUser->lname.'
                                    <span class="pull-right text-muted small" >'.$conversion->UnreadMessage[0]->time.'</span >
                                </div >
                            </a >
                        </li >';
                       }
                    }

                   echo  '<li class="divider"></li>
                    <li>
                        <div class="text-center link-block">
                            <a href="'.route("admin-message").'">
                                <strong>See All Message</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </li>
                    </ul>';
    }


    #message attachment download
    public function getAttachmentDownload(Request $request)
    {
        $attachment = $request->input('attachment');
        $file= public_path(). "/message_attachment/".$attachment;
        return response()->download($file);
    }

    #send user attachment
    public function MessageAdminAttachment(Request $request){

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

                Message::create(['conversion_id'=>$conversionId,'attachment'=>$attachFile,'time'=>$time,'date'=>$date,'sender'=>'admin']);

                echo '<li class="sender"><p class="message attachmentDownload">'. $attachFile.'</p></li>';
            }

        }

    }

    public function getAdminMessageForAllUsers(){
        return view('admin.adminMessage');
    }
    public function postAdminMessageForAllUsers(Request $request){
        $validator = Validator::make($request->all(), [
            'message' => 'required',
            '_token' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->route('adminMessageForAllUsers')->with('fail', 'Message Send to Fail');
        }
        if(Input::get('is_live') == 'on'){
            $live = 1;
        }else{
            $live = 0;
        }

        $message = new AdminMessage();

        $message->message = Input::get('message');
        $message->is_live = $live;
        $message->user_id = Auth::User()->id;
        if($message->save()){
            return redirect()->route('adminMessageForAllUsers')->with('success', 'Message Send to All Users');
        }else{
            return redirect()->route('adminMessageForAllUsers')->with('fail', 'Message Send to Fail');
        }

    }

    public function getAdminMessageForAllUsersList(){
        $messages = AdminMessage::all();
        return view('admin.adminMessageList', ['messages' => $messages]);
    }

    public function getAdminMessageForAllUsersEdit($id){
        $message = AdminMessage::find($id);
        return view('admin.adminMessageEdit', ['message'=>$message]);
    }
}
