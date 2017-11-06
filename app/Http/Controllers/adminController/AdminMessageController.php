<?php

namespace App\Http\Controllers\adminController;

use App\User;
use Illuminate\Http\Request;
use App\Conversion;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use app\Message;
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

    public function AdminMessageConversion($conversionId){
        $userList = User::where(['user_type'=>"freelancer",'user_type'=>"employer"])->get();
        $conversion = Conversion::with('message')->where(['id'=>$conversionId,'admin_id'=>$this->userId])->orderBy('id', 'asc')->first();

        Message::where(['conversion_id'=>$conversionId,'is_read'=>0,'sender'=>'user'])->update(['is_read'=>1]);
        return view('admin.message.conversion',['userList'=>$userList,'conversion'=>$conversion]);
    }


}
