<?php
/**
 * Created by PhpStorm.
 * User: msi
 * Date: 08-Oct-17
 * Time: 5:03 PM
 */

namespace App\Http\Controllers;


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
}