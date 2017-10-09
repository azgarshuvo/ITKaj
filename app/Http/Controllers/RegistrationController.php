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
use Mail;

class RegistrationController extends Controller{
    public function getRegistration(){
        return view('front.registration');
    }

    public function postRegistration(){
        $validate = Validator::make(Input::all(), [
                'fname' => 'required|string',
                'lname' => 'required',
                'email' => 'required|email|unique:users|string',
                'user_type' => 'required|string',
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
                'user_type.required'    =>"Select an user type",
            ]);
        if($validate->fails()){
            return Redirect::back()->withErrors($validate);
        }else{
            $token = bin2hex(openssl_random_pseudo_bytes(32));
            $firstName = Input::get('fname');
            $userName = $firstName.'_'.time();
            $userId = $this->create_register(Input::all(),$token,$userName);
            /*session(['user_id' =>  $user_id,'complete'=>1]);*/
            $email = Input::get('email');
            $this->sendTokenToMail($email,$userId,$token);
            return redirect()->route('profile')->with('message', 'A confirmation email has been send to your email address');
        }

    }

    #enter registration data into db
    private function create_register($data,$token,$userName){
        $user = User::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'username' => $userName,
            'email' => $data['email'],
            'user_type' => $data['user_type'],
            'password' => bcrypt($data['password']),
            'verification_token' => $token,
        ]);
        return $user->id;
    }

    #send activation link
    public function sendTokenToMail($email,$userId,$token){
        $data = array('token'=>$token,'user_id'=>$userId);
        $this->register_email=$email;
        Mail::send('email.activation', $data, function($message) {
            $message->to($this->register_email, 'Upwork')->subject
            ('Account Activation');
            $message->from('project_upwork@softronbd.com','SoftronBD');
        });
    }

}