<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    public function getJobPost()
    {
        return view('front.jobPost');
    }

    public function getJobSearch(){
        return view('front.jobSearch');
    }
}
