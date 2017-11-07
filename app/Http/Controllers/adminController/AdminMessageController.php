<?php

namespace App\Http\Controllers\adminController;

use App\Message;
use App\User;
use Illuminate\Http\Request;
use App\Conversion;

use App\Http\Controllers\Controller;

class AdminMessageController extends Controller
{
    private  $userId = 0;
    public  function __construct()
    {
        $this->userId =auth()->user()->id;

    }
    public function UserList(){
        $userList = User::where(['user_type'=>"freelancer",'user_type'=>"employer"])->get();

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
                    echo '<li class="receiver"><p class="message">'.$text->message.'</p></li>';
                }
                Message::where(['conversion_id'=>$conversionId,'is_read'=>0,'sender'=>'user'])->update(['is_read'=>1]);
            }else{
                echo null;
            }
        }
    }


}
