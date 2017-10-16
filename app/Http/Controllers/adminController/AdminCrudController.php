<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\UserProfile;
use App\Categories;
use Session;

class AdminCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
      return back()->withInput();
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

    public function destroy($id)
    {
        //
    }
}
