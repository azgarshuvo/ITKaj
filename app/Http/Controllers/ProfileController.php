<?php
/**
 * Created by PhpStorm.
 * User: Polsh
 * Date: 08-Oct-17
 * Time: 5:03 PM
 */

namespace App\Http\Controllers;

use App\Countries;
use App\States;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use App\Job;
use DB;
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
        $userProfile = User::with('profile')->first();
        $countries = Countries::all();
        $cities = States::all();
//        dd($country);
    	return view('front.profileSettings',['userProfile'=>$userProfile, 'countries' => $countries , 'cities' => $cities]);
    }

    public function getMyProfile(){
        $userProfile = UserProfile::where('user_id',Auth::user()->id)->first();
        return view('front.myProfile',['userProfile'=>$userProfile]);
    }

    public function getMyProjects(){
        $count = Job::get()->count();
        if($count == 0){
            return redirect()->route('my_projects')->with('message', 'No Job Posted Yet');
                   }
        $job = Job::Popular(auth()->user()->id)->get();
        $user = User::find(auth()->user()->id)
        ->where('user_type', 'employer')
        ->first();
        return view('front.myProjects', ['job' => $job, 'user' => $user]);
    }

    public function getMyProjectList(){
        return view('front.projectList');
    }

    public function getJobApprovedList(){
        return view('front.jobApproveList');
    }

    public function getJobDisapprovedList(){
        return view('front.jobDisapprovedList');
    }

    public function getJobDoneList(){
        return view('front.jobDoneList');
    }
    
    public function getJobInterestedList(){
        return view('front.jobInterestedList');
    }
    public function getJobOngoingList(){
        return view('front.jobOngoingList');
    }
    public function getFreelancerJobDoneList(){
        return view('front.freelancerjobDoneList');
    }
    public function getMyProfileView(){
        return view('front.profileView');
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
        $validate = Validator::make($request->all(), [
            'fname' => 'required|string',
            'lname' => 'required|string',
            'companyName' => 'string|min:3',
            'phone' => 'required|string|min:11',
            'officePhone' => 'string|min:3',
            'address' => 'required|string|min:4',
        ],[
            'fname.required'    =>"First Name require",
            'lname.required'    =>"Last Name require",
            'phone.required'    =>"Phone Number is required",
            'address.required'    =>"Address is required"
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
            $fname = $request->input('fname');
            $lname = $request->input('lname');
            $phone = $request->input('phone');
            $address = $request->input('address');
            $skills = $request->input('skills');
            $experience_lavel = $request->input('experience_lavel');
            $professional_title = $request->input('professional_title');

            /*user table update start*/
            $user = User::find(auth()->user()->id);
            $user->fname = $fname;
            $user->lname = $lname;
            $user->save();
            /*user table update end*/


            echo "<p class='alert alert-success'>";
            echo "User profile Info updated";

            /*Check use is freelancer or employer*/
            if(auth()->user()->user_type=="freelancer"){
                /*user profile table update start*/
                UserProfile::updateOrCreate(
                    ['user_id' => $this->userId],
                    ['phone_number' => $phone,'address'=>$address,'skills'=>$skills,'experience_lavel'=>$experience_lavel,'professional_title'=>$professional_title]);
                /*user profile table update end*/

            }else{
                $web_address = $request->input('web_address');
                $company_name = $request->input('company_name');

                /*user profile table update start*/
                UserProfile::updateOrCreate(
                    ['user_id' => $this->userId],
                    ['phone_number' => $phone,'address'=>$address,'company_name'=>$company_name,'company_website'=>$web_address]);
                /*user profile table update end*/
            }
        }

            echo "</p>";
    }
    public function ChangeProfileImg(Request $request){


        $rules = array(

            'file_' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        );

        $validator = Validator::make($request->all(), $rules);

        if (!$validator->fails()) {

            if($request->hasFile('file_')) {

                $file = $request->file('file_');

                $filename = $file->getClientOriginalName();

                //$extension = $file->getClientOriginalExtension();

                $picture = date('His').$filename;

                $destinationPath = base_path() . '\public\profile_img';

                $file->move($destinationPath, $picture);


                /*File delete start*/
                if(UserProfile::where('user_id',Auth::user()->id)->first()):
                    $deleteFileName = UserProfile::where('user_id',Auth::user()->id)->first()->img_path;
                    $dropFile =$destinationPath.DIRECTORY_SEPARATOR.$deleteFileName;
                    \File::delete($dropFile);
                endif;
                /*File delete end*/

                /*user profile table update start*/

                UserProfile::updateOrCreate(

                    ['user_id' => $this->userId],

                    ['img_path' => $picture]);

                /*user profile table update end*/


                echo $picture;


            }else{

                echo false;

            }

        }else{

            echo false;

        }

        //var_dump($request->all());

    }

}