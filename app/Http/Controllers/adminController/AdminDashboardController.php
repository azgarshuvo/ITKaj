<?php
/**
 * Created by PhpStorm.
 * User: msi
 * Date: 09-Oct-17
 * Time: 2:18 PM
 */

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\BaseControllerAdmin;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Job;
use Illuminate\Http\Request;
use App\User;
use App\UserProfile;
use App\Categories;
use App\Employments;
use App\Education;
use Session;

class AdminDashboardController extends BaseControllerAdmin {

    //Admin
    public function getDashboard(){
        return view('admin.dashboard');
    }
    


    //Users
    //Freelancer
    public function getFreelancerList(){
        $freelancerList = User::FreelancerAll()->with('profile')->get();
        return view('admin.freelancerList', ['freelancerList'=>$freelancerList]);
    }
    public function getFreelancerDelete($id){
        User::findOrFail($id)->delete();
        $profile = UserProfile::FindUserProfile($id);
        $profile->delete();
        $education = Education::Education($id);
        $education->delete();
        $employment = Employments::Employment($id);
        $employment->delete();

        Session::flash('success', 'Freelancer deleted successfully!');
        return redirect()->route('freelancerList');
    }

    /*Freelancer details profile by id*/
    public function getFreelancerDetails($id){
        $user = User::with(['job','profile','jobInterested'])->where(['id'=>$id])->first();
        $interestList = array();
        if($user->jobInterested()->count()>0){
            foreach ($user->jobInterested as $interest){
                array_push($interestList,$interest->job_id);
            }

        }
        $interestJobList = Job::with('interested')->whereIn('id', $interestList)->get();
        //dd($interestJobList->count());
        return view('admin.freelancerProfile',['user'=>$user,'interestJobList'=>$interestJobList]);
    }

    public function getFreelancerApproveList(){
        $freelancerApproveList = User::FreelancerApproveList()->with('profile')->get();
        return view('admin.freelancerApproveList', ['freelancerApproveList'=>$freelancerApproveList]);
    }
    public function getFreelancerApproveDelete($id){
        User::findOrFail($id)->delete();
        $profile = UserProfile::FindUserProfile($id);
        $profile->delete();
        $education = Education::Education($id);
        $education->delete();
        $employment = Employments::Employment($id);
        $employment->delete();

        Session::flash('success', 'Freelancer deleted successfully!');
        return redirect()->route('freelancerApproveList');
    }
    public function getFreelancerDisapproveList(){
        $freelancerDisapproveList = User::FreelancerDisapproveList()->with('profile')->get();
        return view('admin.freelancerDisapproveList', ['freelancerDisapproveList'=>$freelancerDisapproveList]);
    }
    public function getFreelancerDisapproveDelete($id){
        User::findOrFail($id)->delete();
        $profile = UserProfile::FindUserProfile($id);
        $profile->delete();
        $education = Education::Education($id);
        $education->delete();
        $employment = Employments::Employment($id);
        $employment->delete();


        Session::flash('success', 'Freelancer deleted successfully!');
        return redirect()->route('freelancerDisapproveList');
    }



    //Employer
    public function getEmployeerList(){
        $employerList = User::Employeer()->with('profile')->get();
        return view('admin.employeerList',['employerList'=>$employerList]);
    }

    public function getEmployeerDelete($id){
        User::findOrFail($id)->delete();
        $profile = UserProfile::FindUserProfile($id);
        $profile->delete();
        $education = Education::Education($id);
        $education->delete();
        $employment = Employments::Employment($id);
        $employment->delete();


        Session::flash('success', 'Employer deleted successfully!');
        return redirect()->route('employeerList');
    }


    public function getEmployeerApproveList(){
        $employerApproveList = User::EmployerApproveList()->with('profile')->get();
        return view('admin.employerApproveList', ['employerApproveList'=>$employerApproveList]);
    }


    public function getEmployeerApproveDelete($id){
        User::findOrFail($id)->delete();
        $profile = UserProfile::FindUserProfile($id);
        $profile->delete();
        $education = Education::Education($id);
        $education->delete();
        $employment = Employments::Employment($id);
        $employment->delete();


        Session::flash('success', 'Employer deleted successfully!');
        return redirect()->route('employeerApproveList');
    }


    public function getEmployeerDisapproveList(){
        $employerDisapproveList = User::EmployerDisapproveList()->with('profile')->get();
        return view('admin.employerDisapproveList', ['employerDisapproveList'=>$employerDisapproveList]);
    }


    public function getEmployeerDisapproveDelete($id){
        User::findOrFail($id)->delete();
        $profile = UserProfile::FindUserProfile($id);
        $profile->delete();
        $education = Education::Education($id);
        $education->delete();
        $employment = Employments::Employment($id);
        $employment->delete();


        Session::flash('success', 'Employer deleted successfully!');
        return redirect()->route('employeerDisapproveList');
    }

}
