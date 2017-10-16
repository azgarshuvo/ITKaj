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
    public function getFreelancerList(){
      return view('admin.freelancerList');
    }
    public function getEmployeerList(){
      return view('admin.employeerList');
    }

}
