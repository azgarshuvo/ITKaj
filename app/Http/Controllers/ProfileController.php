<?php
/**
 * Created by PhpStorm.
 * User: msi
 * Date: 08-Oct-17
 * Time: 5:03 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller{

    public function getProfile(){
        return view('front.overAll');
    }

    public function getProfileSettings(){

    	return view('front.profileSettings');
    }

    public function getMyProfile(){
        return view('front.myProfile');
    }

    public function getMyProjects(){
    	return view('front.myProjects');
    }

    public function ChangePassword(Request $request){
        $this->validate($request, [
            'c_password' => 'required|min:6',
            'password' => 'required|string|min:6|confirmed',
        ],[
            'c_password.required'    =>"Current password doesn't match",
            'c_password.min'    =>"Current password doesn't match",
            'password.required'    =>"Password is required",
            'password.min'    =>"Password length must be at least 6",
            'password.confirmed'    =>"Password confirm doesn't match",
        ]);
    }
}