<?php
/**
 * Created by PhpStorm.
 * User: msi
 * Date: 05-Oct-17
 * Time: 5:29 PM
 */

namespace App\Http\Controllers;


use App\Categories;
use App\Job;

class HomeController extends Controller{

    public function getHome(){
        $categories = Categories::all();
        $jobs = Job::all();
//        dd($jobs);
        return view('front.landingPage', ['categories' => $categories]);
    }
}