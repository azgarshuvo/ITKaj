<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    public function getPostJob()
    {
        return view('front.jobPost');
    }
}