<?php

namespace App\Http\Controllers\adminController;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminJobController extends Controller
{
    public function getJoblist(){
        return view('admin.jobList');
    }
}
