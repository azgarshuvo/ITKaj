<?php
/**
 * Created by PhpStorm.
 * User: msi
 * Date: 07-Oct-17
 * Time: 6:25 PM
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\User;


class RegistrationController extends Controller{
    public function getRegistration(){
        return view('front.registration');
    }

    public function postRegistration(){
        $validate = Validator::make(Input::all(), [
                'fname' => 'required|string',
                'lname' => 'required',
                'email' => 'required|email|unique:users|string',
                'terms' => 'required',
                'password' => 'required|string|min:6|confirmed',
            ],[
                'fname.required'    =>"First Name is required",
                'lname.required'    =>"Last Name is required",
                'email.required'    =>"Email is required",
                'email.email'    =>"You enter invalid email address",
                'email.unique'    =>"The email has all ready been taken",
                'terms.required'    =>"Terms and Conditions must be accepted",
                'password.required'    =>"Password is required",
                'password.min'    =>"Password length must be at least 6",
                'password.confirmed'    =>"Password confirm doesn't match",
            ]);
        if($validate->fails()){
            return Redirect::back()->withErrors($validate);
        }else{
            $token = bin2hex(openssl_random_pseudo_bytes(32));
            $user_id = $this->create_register(Input::all(),$token);
            /*session(['user_id' =>  $user_id,'complete'=>1]);
            $email = Input::get('email');
            $this->sendTokenToMail($email,$user_id,$token);*/
            return redirect()->route('profile')->with('message', 'A confirmation email has been send to your email address');
        }

    }

    #enter registration data into db
    private function create_register($data,$token){
        $user = User::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'verification_token' => $token,
        ]);
        return $user->id;
    }

}