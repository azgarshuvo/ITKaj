<?php
/**
 * Created by PhpStorm.
 * User: msi
 * Date: 08-Oct-17
 * Time: 5:03 PM
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use App\User;
use App\UserProfile;
class ProfileController extends Controller{
    private  $userId = 0;
    public  function __construct()
    {
        $this->userId =auth()->user()->id;
    }

    public function getProfile(){
        return view('front.overAll');
    }

    public function getProfileSettings(){
        $userProfile = User::leftJoin('user_profiles', function($join) {
            $join->on('users.id', '=', 'user_profiles.user_id');
        })
            ->where('users.id',$this->userId)
            ->first([
                'users.id',
                'user_profiles.phone_number',
                'users.fname',
                'users.lname',
                'users.email',
                'user_profiles.address',
            ]);
        //dd($userProfile);
    	return view('front.profileSettings',['userProfile'=>$userProfile]);
    }

    public function getMyProfile(){
        return view('front.myProfile');
    }

    public function getMyProjects(){
    	return view('front.myProjects');
    }

    #get ajax request to change password
    public function ChangePassword(Request $request){

        $validate = Validator::make($request->all(), [
            'c_password' => 'required|min:6',
            'password' => 'required|string|min:6|confirmed',
        ],[
            'c_password.required'    =>"Current password doesn't match",
            'c_password.min'    =>"Current password doesn't match",
            'password.required'    =>"Password is required",
            'password.min'    =>"Password length must be at least 6",
            'password.confirmed'    =>"Password confirm doesn't match",
        ]);

        if($validate->fails()){
            $errors = json_decode($validate->errors());
            echo "<p class='alert alert-danger'>";
            foreach ($errors as $error){
                foreach ($error as $mes){
                    echo $mes."<br/>";
                }
            }
        }else{
            $data = $request->all();

            $user = User::find(auth()->user()->id);
            if(!\Hash::check($data['c_password'], $user->password)){
                echo "<p class='alert alert-danger'>";
                echo "Current password doesn't match";
            }else{
                $user->password = \Hash::make($data['password']);
                $user->save();
                echo "<p class='alert alert-success'>";
                echo "Password has been updated";
            }

        }
        echo "</p>";
    }

    #get ajax post req to change profile information from profile setting
    public function changeProfile(Request $request){
        dd($request->all());
    }
}