<?php
/**
 * Created by PhpStorm.
 * User: msi
 * Date: 09-Oct-17
 * Time: 2:18 PM
 */

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\UserProfile;
use App\Categories;
use Session;

class AdminDashboardController extends Controller{

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
//        User::findOrFail($id)->delete();
        $user= User::findUser($id)->first();
        $user->delete();

        Session::flash('success', 'Freelancer deleted successfully!');
        return redirect()->route('freelancerList');
    }
    public function getFreelancerApproveList(){
        $freelancerApproveList = User::FreelancerApproveList()->with('profile')->get();
        return view('admin.freelancerApproveList', ['freelancerApproveList'=>$freelancerApproveList]);
    }
    public function getFreelancerApproveDelete($id){
        User::findOrFail($id)->delete();
        Session::flash('success', 'Freelancer deleted successfully!');
        return redirect()->route('freelancerApproveList');
    }
    public function getFreelancerDisapproveList(){
        $freelancerDisapproveList = User::FreelancerDisapproveList()->with('profile')->get();
        return view('admin.freelancerDisapproveList', ['freelancerDisapproveList'=>$freelancerDisapproveList]);
    }
    public function getFreelancerDisapproveDelete($id){
        User::findOrFail($id)->delete();
        Session::flash('success', 'Freelancer deleted successfully!');
        return redirect()->route('freelancerDisapproveList');
    }



    //Employer
    public function getEmployeerList(){
        $employerList = User::Employeer()->with('profile')->get();
        return view('admin.employeerList',['employerList'=>$employerList]);
    }
    public function getEmployeerApproveList(){
        $employerApproveList = User::EmployerApproveList()->with('profile')->get();
        return view('admin.employerApproveList', ['employerApproveList'=>$employerApproveList]);
    }
    public function getEmployeerDisapproveList(){
        $employerDisapproveList = User::EmployerDisapproveList()->with('profile')->get();
        return view('admin.employerDisapproveList', ['employerDisapproveList'=>$employerDisapproveList]);
    }

}
