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
use Session;

class AdminDashboardController extends Controller{


    public function getDashboard(){
        return view('admin.dashboard');
    }
    public function addAdmin()
    {
      return view('admin.addAdmin');
    }
    public function listOfAdmin()
    {
      $users = User::orderBy('id','asc')->get();
      return view('admin.adminList',['users' => $users]);
    }
    public function adminDetails($id){
        $users = User::findOrFail($id);
        return view('admin.adminDetails', ['users' => $users]);
    }
    public function adminEdit($id){
        $user = User::findOrFail($id);
        return view('admin.adminEdit', ['users' => $user]);
    }
    public function adminDelete($id){
        User::findOrFail($id)->delete();
        Session::flash('success', 'User deleted successfully!');
        return redirect()->route('adminList');
    }


    public function addCategory()
    {
      return view('admin.addCategory');
    }
    public function listOfCategory()
    {
      return view('admin.categoryList');
    }

    public function getFreelancerList(){
      return view('admin.freelancerList');
    }
    public function getEmployeerList(){
      return view('admin.employeerList');
    }

}
