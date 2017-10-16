<?php

namespace App\Http\Controllers\adminController;

use App\Job;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminJobController extends Controller
{
    public function getJoblist(){
        $jobList = Job::all();
        return view('admin.jobList',['jobList'=>$jobList]);
    }

    public function getJobDetails($id){
        echo $id;
    }

    public function getJobEditView($id){
        echo $id;
    }

    public function getJobDelete($id){
        echo $id;
    }
}
