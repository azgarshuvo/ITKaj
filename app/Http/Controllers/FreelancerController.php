<?php
/**
 * Created by PhpStorm.
 * User: msi
 * Date: 11-Oct-17
 * Time: 1:08 PM
 */

namespace App\Http\Controllers;


use App\User;

class FreelancerController extends Controller{

    public function getFreelancerSearch(){

        $freeLancerList=User::with('profile')->where(['user_type'=>'freelancer'])->get();
        return view('front.freelancerSearch',['freeLancerList'=>$freeLancerList]);
    }
}