<?php

namespace App\Http\Controllers;

use App\ContactDetails;
use App\Job;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MilestoneController extends Controller
{
    private  $userId = 0;
    public  function __construct()
    {
        $this->userId =auth()->user()->id;

    }

    function setMilestone($jobId){
        $milestone = ContactDetails::with(['job'])->where(['employee_id'=>$this->userId,'job_id'=>$jobId])->first();
        return view('front.milestoneSetUp',['milestone'=>$milestone]);
    }

    function getMilestone($jobId){
        // $job = Job::with(['contact',''])->get();
        $milestone_list = ContactDetails::with(['millstone','job'])->where(['employee_id'=>$this->userId])->get();
        return view('front.milestoneView',['milestone_list'=>$milestone_list]);
    }
}
