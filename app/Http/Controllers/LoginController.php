<?php
/**
 * Created by PhpStorm.
 * User: msi
 * Date: 07-Oct-17
 * Time: 6:11 PM
 */

namespace App\Http\Controllers;


class LoginController extends Controller{

    public function getLogin(){
        return view('front.login');
    }
}