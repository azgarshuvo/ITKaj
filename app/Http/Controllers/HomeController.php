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
use App\User;

class HomeController extends Controller{

    public function getHome(){
        $categories = Categories::all();
        $employers = User::allEmployer()->with('profile')->get();
        $projects = Job::orderBy('created_at','desc')->where('approved', 1)->take(6)->get();
        return view('front.landingPage', ['categories' => $categories, 'projects' => $projects, 'employers' => $employers]);
    }

    public function getComingSoonPage(){
        return view('front.comingSoonPage');
    }
}