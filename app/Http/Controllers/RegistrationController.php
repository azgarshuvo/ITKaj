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
use Illuminate\Contracts\Auth\Guard;
use App\User;
use Mail;

class RegistrationController extends Controller{

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }


    public function getRegistration(){
        return view('front.registration');
    }
    public function getjobpost(){
        return view('front.jobPost');
    }

    public function postRegistration(Request $request){

        $this->validate($request, [
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
            $token = bin2hex(openssl_random_pseudo_bytes(32));
            $firstName = Input::get('fname');
            $lastName = Input::get('lname');
            $userName = $this->MakeUsername(strtolower($firstName),strtolower($lastName));
            $userId = $this->create_register(Input::all(),$token,$userName);
            /*session(['user_id' =>  $user_id,'complete'=>1]);*/
            $email = Input::get('email');
            $password = Input::get('password');
            $this->sendTokenToMail($email,$userId,$token);

            $credentials = ['email'=>$email,'password'=>$password,'admin_user_type'=>-1];
            if ($this->auth->attempt($credentials))
            {
                return redirect()->route('verifyEmail')->with('message', 'A confirmation email has been send to your email address');
            }


    }

    #this return unique user name
    private function MakeUsername($firstName,$lastName){
        $firstName = str_replace(' ', '', $firstName);
        $lastName = str_replace(' ', '', $lastName);
        $userName = $firstName.".".$lastName;
        $retrive_data = User::where('username', $userName);
        $isHas = $retrive_data->count();
        if($isHas==0){
            return $userName;
        }else{
            return $userName.time();
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
        $data = array('token'=>$token,'user_id'=>$userId,'usermail'=>$email);
        $this->register_email=$email;
        Mail::send('email.activation', $data, function($message) {
            $message->to($this->register_email, 'Upwork')->subject
            ('Account Activation');
            $message->from('project_upwork@softronbd.com','SoftronBD');
        });
    }


    #email confirmation view
    public function EmailConfirmation(){
        return view('front.emailConfirmationNotification');
    }

    #get email token for validation
    public function EmailToken(Request $request)
    {
        $user_id = $request->input('id');
        $email = $request->input('email');
        $token = $request->input('token');
        $user_info = User::where(['id'=>$user_id,'email'=>$email,'verification_token'=>$token,'verified'=>0])->first();
        //dd($user_info);

        if ($user_info) {
            /*user table update start*/
            $user = User::find($user_id);
            $user->verified = 1;
            $user->verification_token = "";
            $user->save();
            /*user table update end*/

            /*redirect when success*/
            return redirect()->route('verifyEmailSuccess')->with('message', 'Email verification success');
        }else{
            /*redirect when fail*/
            return redirect()->route('verifyEmailFail')->with('error', 'Email verification failed');
        }
    }
    #show success message when email verification success
    public function EmailConfirmationSuccess(){
        return view('front.emailSuccessMessage');
    }

    #show success message when email verification success
    public function EmailConfirmationFail(){
        return view('front.emailFailMessage');
    }


}