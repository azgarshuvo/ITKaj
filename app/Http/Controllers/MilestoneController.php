<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MilestoneController extends Controller
{
    function getMilestone($jobId){
        return view('front.milestoneView');
    }
}
