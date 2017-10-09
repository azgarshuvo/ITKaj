<?php
/**
 * Created by PhpStorm.
 * User: msi
 * Date: 07-Oct-17
 * Time: 6:25 PM
 */

namespace App\Http\Controllers;


class RegistrationController extends Controller{
    public function getRegistration(){
        return view('front.registration');
    }
    public function getjobpost(){
        return view('front.jobPost');
    }

}