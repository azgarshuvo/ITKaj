<?php

namespace App\Http\Controllers;

use App\Conversion;
use App\Message;
use Illuminate\Http\Request;
use View;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BaseControllerAdmin extends Controller
{
    public function __construct()
    {
        //its just a dummy data object.
        $unreadConversion = Conversion::with(['UnreadMessage','getUser'])->get();
        $unreadMessage = Message::with('getConversion')->where(['is_read'=>0])->where(['sender'=>'user'])->get();

       // dd($conversion);

        // Sharing is caring
        View::share('unreadMessage', $unreadMessage);
        View::share('unreadConversion', $unreadConversion);
    }
}
