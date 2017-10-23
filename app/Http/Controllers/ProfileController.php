<?php
/**
 * Created by PhpStorm.
 * User: Polsh
 * Date: 08-Oct-17
 * Time: 5:03 PM
 */

namespace App\Http\Controllers;

use App\ContactDetails;
use App\Countries;
use App\States;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Job;
use App\Education;
use App\Employments;
use DB;
use App\User;
use App\UserProfile;
use Illuminate\Validation\Rule;
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
        $userProfile = Auth::User();
        $countries = Countries::all();
        $cities = States::all();
    	return view('front.profileSettings',['userProfile'=>$userProfile, 'countries' => $countries , 'cities' => $cities]);
    }

    public function getMyProfile(){
        $userProfile = Auth::User();
        return view('front.myProfile',['userProfile'=>$userProfile]);
    }

    public function getProjectsList(){
    	$job = Job::ProjectList(Auth::User()->id)->get();
    	if($job != null or $job != ''){
            $user = Auth::User();
            return view('front.myProjects', ['job' => $job, 'user' => $user]);
        }else{
    	    Return Redirect::route('projectsList')->with('message', 'No Project Posted yet');
        }
    }

    public function getProjectApprovedList(){
        $approveProjectList = Job::ProjectApproveList(Auth::User()->id)->get();
        return view('front.jobApproveList', ['approveProjectList' => $approveProjectList]);
    }

    public function getJobDisapprovedList(){
        $disapproveProjectList = Job::ProjectDisapproveList(Auth::User()->id)->get();
        return view('front.jobDisapprovedList', ['disapproveProjectList' => $disapproveProjectList]);
    }

    public function getJobDoneList(){
        $jobList = ContactDetails::with('job')->where(['freelancer_id'=>$this->userId,'contact_status'=>1])->get();
        return view('front.jobDoneList',['jobList'=>$jobList]);
    }

    public function getJobInterestedList(){
        return view('front.jobInterestedList');
    }

    public function getFreelancerJobDoneList(){
        return view('front.freelancerjobDoneList');
    }

    #profile view as other
    public function getMyProfileView($id){
        $city = null;
        $country = null;
        $freeLancer=User::with('profile')->where(['user_type'=>'freelancer','id'=>$id])->first();
        if($freeLancer->profile){
            $city =  States::where(['id'=>$freeLancer->profile->city])->first();
            $country = Countries::find($freeLancer->profile->country);
        }

        return view('front.profileView',['freeLancer'=>$freeLancer,'country'=>$country,'city'=>$city]);
    }

    //Add Education
    public function postEducationAdd(){

        // $validate = Validator::make(Input::all(), array(
        //         'institution' => 'required',
        //         'degree' => 'required',
        //         'study_area' => 'required',
        //         'start' => 'required',
        //         'finish' => 'required',
        //         'description' => 'required',
        //     ));
        // If($validate->fails())



        $originalStartDate =  Input::get('start');
        $startDate = date("Y-m-d", strtotime($originalStartDate));

        $originalFinishDate = Input::get('finish');
        $finishDate = date("Y-m-d", strtotime($originalFinishDate));

        Education::Create(
                    [   'user_id' => $this->userId,
                        'institution' => Input::get('institution'),
                        'degree'=>Input::get('degree'),
                        'area_of_study'=>Input::get('study_area'),
                        'start_date'=>$startDate,
                        'end_date'=>$finishDate,
                        'description'=>Input::get('description')
                    ]);
        echo "<p class='alert alert-success'> Education Add Success</p>";
    }

    public function postEmploymentAdd(){
        $originalStartDate =  Input::get('start_date');
        $startDate = date("Y-m-d", strtotime($originalStartDate));

        $originalFinishDate = Input::get('finish_date');
        $finishDate = date("Y-m-d", strtotime($originalFinishDate));

        Employments::Create(
            [
                'user_id' => $this->userId,
                'company_name'=>Input::get('company_name'),
                'country'=>Input::get('country'),
                'city'=>Input::get('city'),
                'postal_code'=>Input::get('postal_code'),
                'start_date'=>$startDate,
                'finish_date'=>$finishDate,
                'designation'=>Input::get('designation')
            ]);
        echo "<p class='alert alert-success'>Employment Added Successfuly</p>";
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
            'username' => 'required|string|min:4',
            'officePhone' => 'string|min:3',
            'address' => 'required|string|min:4',
            'country' => 'required',
            'city' => 'required',
            'username' => 'required|unique:users,username,'.$this->userId
        ],[
            'fname.required'        =>"First Name is require",
            'lname.required'        =>"Last Name is require",
            'username.required'        =>"Username is require",
            'username.unique'        =>"Username has already been taken",
            'phone.required'        =>"Phone Number is required",
            'address.required'      =>"Address is required",
            'country.required'      =>"Country name is required",
            'city.required'         =>"City name is required",
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
            $username = $request->input('username');
            $phone = $request->input('phone');
            $address = $request->input('address');
            $skills = $request->input('skills');
            $experience_level = $request->input('experience_level');
            $professional_title = $request->input('professional_title');
            $hourly_rate = $request->input('hourly_rate');
            $professional_overview = $request->input('professional_overview');
            $country = $request->input('country');
            $city = $request->input('city');

            /*user table update start*/
            $user = User::find(auth()->user()->id);
            $user->fname = $fname;
            $user->lname = $lname;
            $user->username = $username;
            $user->is_complete = 1;
            $user->save();
            /*user table update end*/

            echo "<p class='alert alert-success'>";
            echo "User profile Info updated";

            /*Check use is freelancer or employer*/
            if(auth()->user()->user_type=="freelancer"){
                /*user profile table update start*/
                UserProfile::updateOrCreate(
                    ['user_id' => $this->userId],
                    [
                        'phone_number' => $phone,
                        'address'=>$address,
                        'skills'=>$skills,
                        'experience_level'=>$experience_level,
                        'professional_title'=>$professional_title,
                        'hourly_rate'=>$hourly_rate,
                        'professional_overview'=>$professional_overview,
                        'country'=>$country,
                        'city'=>$city,
                    ]);
                /*user profile table update end*/

            }else{
                $web_address = $request->input('web_address');
                $company_name = $request->input('company_name');

                /*user profile table update start*/
                UserProfile::updateOrCreate(
                    ['user_id' => $this->userId],
                    [
                        'phone_number' => $phone,
                        'address'=>$address,
                        'company_name'=>$company_name,
                        'company_website'=>$web_address,
                        'country'=>$country,
                        'city'=>$city,
                        'professional_title'=>$professional_title,
                        'professional_overview'=>$professional_overview,
                    ]);
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
