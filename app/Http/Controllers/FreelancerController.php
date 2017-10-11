<?php
/**
 * Created by PhpStorm.
 * User: msi
 * Date: 11-Oct-17
 * Time: 1:08 PM
 */

namespace App\Http\Controllers;


class FreelancerController extends Controller{

    public function getFreelancerSearch(){
        return view('front.freelancerSearch');
    }
}