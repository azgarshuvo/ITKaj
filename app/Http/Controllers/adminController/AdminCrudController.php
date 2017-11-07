<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\BaseControllerAdmin;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\UserProfile;
use App\Categories;
use Session;
use Input;
Use Validator;

class AdminCrudController extends BaseControllerAdmin
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
          'email' => 'required|email|string|unique:users',
          'admin_user_type' => 'required',
          'password' => 'required|string|min:6',
          'phone_number' => 'required|string',
          'country' => 'required|string',
          'city' => 'required|string',
          'postcode' => 'required',
          'address' => 'required',
          'image' => 'required|max:1024'
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
        'image.required'    =>"Profile Picture is required",
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


      $errors= array();
      $file_name = time().$_FILES['image']['name'];
      $file_tmp =$_FILES['image']['tmp_name'];

      if(empty($errors)==true){
         move_uploaded_file($file_tmp,base_path()."/public/uploads/admin/".$file_name);
      }
      $profile->img_path = $file_name;

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
            return $userName.rand(1, 1000);
        }
    }
    public function adminDetails($id){
        $users = User::findOrFail($id);

        return view('admin.user.adminDetails', ['users' => $users]);
    }
    public function adminEdit($id){
      $user = User::FindUser($id)->first();
      $userProfile = UserProfile::FindUserProfile($id)->first();
        return view('admin.user.adminEdit',['users' => $user, 'usersProfile' => $userProfile]);
    }
    public function adminUpdate($id, Request $request){
      $this->validate($request, [
          'fname' => 'required|string',
          'lname' => 'required|string',
          'username' => 'required|string',
          'email' => 'required|email|string|unique:users,id, $id',
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
        'email.unique'    =>"The email has already been taken",
        'password.required'    =>"Password is required",
        'password.min'    =>"Password length must be at least 6",
        'password.confirmed'    =>"Password confirm doesn't match",
        'admin_user_type.required'    =>"Select an admin type",
        'phone_number.required'    =>"Phone number is required",
        'country.required'    =>"Country is required",
        'postcode.required'    =>"Postcode is required",
        'address.required'    =>"Address is required"
      ]);
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $username = $request->input('username');
        $email = $request->input('email');
        $admin_user_type = $request->input('admin_user_type');
        $password = $request->input('password');
        $phone_number = $request->input('phone_number');
        $address = $request->input('address');
        $country = $request->input('country');
        $city = $request->input('city');
        $postcode = $request->input('postcode');
        $image = $request->input('image');

        $have_img = $_FILES['image']['name'];


        $user = User::FindUser($id)->first();
        $userProfile = UserProfile::FindUserProfile($id)->first();
        $user->fname = $fname;
        $user->lname = $lname;
        $user->username = $username;
        $user->email = $email;
        $user->admin_user_type = $admin_user_type;
        $user->password = $password;
        $userProfile->phone_number = $phone_number;
        $userProfile->address = $address;
        $userProfile->country = $country;
        $userProfile->city = $city;
        $userProfile->postcode = $postcode;
        if($have_img != null){
          $errors= array();
          $file_name = time().$_FILES['image']['name'];
          $file_tmp =$_FILES['image']['tmp_name'];

          if(empty($errors)==true){
             move_uploaded_file($file_tmp,base_path()."/public/uploads/admin/".$file_name);
          }
          $userProfile->img_path = $file_name;
        }
        $user->save();
        $userProfile->save();
        Session::flash('success', 'Admin information updated successfully!');
        return redirect()->route('adminList');
    }
    public function adminDelete($id){
        $user = User::FindUser($id)->first();
        $userPrfile = UserProfile::FindUserProfile($id)->first();
        $user->delete();
        $userPrfile->delete();
        Session::flash('success', 'Admin deleted successfully!');
        return redirect()->route('adminList');
    }

    public function destroy($id)
    {
        //
    }
}
