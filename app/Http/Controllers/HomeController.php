<?php
/**
 * Created by PhpStorm.
 * User: msi
 * Date: 05-Oct-17
 * Time: 5:29 PM
 */

namespace App\Http\Controllers;


class HomeController extends Controller{

    public function getHome(){
        return view('front.landingPage');
    }
}