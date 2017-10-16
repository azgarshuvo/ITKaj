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
    public function addAdmin()
    {
      return view('admin.addAdmin');
    }
    public function listOfAdmin()
    {
      $users = User::orderBy('id','asc')->get();
      return view('admin.adminList',['users' => $users]);
    }

    public function insertAdmin(Request $request)
    {
      $this->validate($request, [
          'fname' => 'required',
          'lname' => 'required',
          'username' => 'required',
          'email' => 'required',
          'admin_user_type' => 'required',
          'password' => 'required',
          'phone_number' => 'required',
          'country' => 'required',
          'city' => 'required',
          'postcode' => 'required',
          'address' => 'required'
      ]);
      $userData = $request->only('fname', 'lname', 'username', 'email', 'admin_user_type', 'password');
      //$userData = $request->all();
      User::create($userData);
      $userProfileData = $request->only('phone_number', 'country', 'city', 'postcode', 'address');
      //$userProfileData = $request->all();
      UserProfile::create($userProfileData);
      Session::flash('success', 'User added successfully!');
      return view('admin.adminList');
    }
    public function adminDetails($id){
        $users = User::findOrFail($id);
        return view('admin.adminDetails', ['users' => $users]);
    }
    public function adminEdit($id){
        $user = User::findOrFail($id);
        return view('admin.adminEdit');
    }
    public function adminDelete($id){
        User::findOrFail($id)->delete();
        Session::flash('success', 'Admin deleted successfully!');
        return redirect()->route('adminList');
    }

    //Category
    public function addCategory()
    {
      $items = Categories::where('is_parent', 0)->orderBy('category_name')->get();
      return view('admin.addCategory', compact('items'));
    }
    public function insertCategory(Request $request)
    {
      $this->validate($request, [
          'category_name' => 'required',
          'is_parent' => 'required'
      ]);
      $category_items = $request->only('category_name', 'is_parent', 'parent_category');
      Categories::create($category_items);
      $items = Categories::where('is_parent', 0)->orderBy('category_name')->get();
      Session::flash('success', 'Category added successfully!');
      return back()->withInput();
    }
    public function listOfCategory()
    {
      //$parent_category = Categories::where('is_parent', 0)->orderBy('id','dsc')->get();
      //$sub_category = Categories::where('is_parent', 1)->orderBy('category_name')->get();
      return view('admin.categoryList');
    }
    public function deleteCategory($id)
    {
      Categories::findOrFail($id)->delete();
      Session::flash('success', 'Admin deleted successfully!');
      return redirect()->route('categoryList');
    }

    //Users
    public function getFreelancerList(){
      return view('admin.freelancerList');
    }
    public function getEmployeerList(){
      return view('admin.employeerList');
    }

}
