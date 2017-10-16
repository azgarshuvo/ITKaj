<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use Image;
use App\User;
use App\UserProfile;
use App\Categories;
use Session;
use Input;

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
      return view('admin.user.addAdmin');
    }
    public function listOfAdmin()
    {
      $users = User::orderBy('id','asc')->get();
      return view('admin.user.adminList',['users' => $users]);
    }

    public function insertAdmin(Request $request)
    {
      $this->validate($request, [
          'fname' => 'required|string',
          'lname' => 'required|string',
          'username' => 'required',
          'email' => 'required|email|string',
          'admin_user_type' => 'required',
          'password' => 'required|string|min:6',
          'phone_number' => 'required|string',
          'country' => 'required|string',
          'city' => 'required|string',
          'postcode' => 'required',
          'address' => 'required'
      ],[
        'fname.required'    =>"First Name is required",
        'lname.required'    =>"Last Name is required",
        'email.required'    =>"Email is required",
        'email.email'    =>"You enter invalid email address",
        'email.unique'    =>"The email has all ready been taken",
        'password.required'    =>"Password is required",
        'password.min'    =>"Password length must be at least 6",
        'password.confirmed'    =>"Password confirm doesn't match",
        'admin_user_type.required'    =>"Select an admin type",
        'phone_number.required'    =>"Phone number is required",
        'country.required'    =>"Country is required",
        'postcode.required'    =>"Postcode is required",
        'address.required'    =>"Address is required",
      ]);
      $user = new User();
      $user->fname = Input::get('fname');
      $user->lname = Input::get('lname');
      $user->username = $this->GenarateUserName(strtolower($user->fname),strtolower($user->lname));
      $user->email = Input::get('email');
      $user->user_type = "admin";
      $user->admin_user_type = Input::get('admin_user_type');
      $user->password = Input::get('password');
      $user->save();

      $profile = new UserProfile();
      $profile->user_id = $user->id;
      $profile->phone_number = Input::get('phone_number');
      $profile->country = Input::get('country');
      $profile->city = Input::get('city');
      $profile->postcode = Input::get('postcode');
      $profile->address = Input::get('address');
      $profile->save();

      Session::flash('success', 'User added successfully!');
      return back()->withInput();
    }
    private function GenarateUserName($firstName,$lastName){
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
    public function adminDetails($id){
        $users = User::findOrFail($id);
        return view('admin.user.adminDetails', ['users' => $users]);
    }
    public function adminEdit($id){
        $user = User::findOrFail($id);
        return view('admin.user.adminEdit');
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
