<?php

namespace App\Http\Controllers\adminController;

use App\Job;
use Illuminate\Http\Request;
use Session;
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

        $jobList = Job::find($id);
        return view('admin.job.jobEdit',['jobList'=>$jobList]);
    }

    public function postJobUpdate($id, Request $request){

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'approved' => 'required'
        ]);

        $jobData = $request->all();
        unset($jobData['_token']);
        //dd($jobData);
        Job::where(['id'=>$id])->update($jobData);
        Session::flash('success', 'JobList updated successfully!');
        return redirect()->route('jobList');

    }

    public function getJobDelete($id){
        Job::findOrFail($id)->delete();
        Session::flash('success', 'Job deleted successfully!');
        return redirect()->route('jobList');
    }

    //Approve

    public function getJobApproveEdit($id){

        $jobList = Job::find($id);
        return view('admin.job.jobApproveEdit',['jobList'=>$jobList]);
    }
    public function postJobApproveUpdate($id, Request $request){
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'approved' => 'required'
        ]);

        $approvedData = $request->all();
        Job::findOrFail($id)->update($approvedData);
        Session::flash('success', 'Approved List updated successfully!');
        return redirect()->route('jobApproveList');

    }

    public function getJobApproveDelete($id){
        Job::findOrFail($id)->delete();
        Session::flash('success', 'Job deleted successfully!');
        return redirect()->route('jobApproveList');
    }


    //Disapprove

    public function getJobDisapproveEdit($id){

        $jobList = Job::find($id);
        return view('admin.job.jobDisapproveEdit',['jobList'=>$jobList]);
    }
    public function postJobDisapproveUpdate($id, Request $request){
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'approved' => 'required'
        ]);

        $approvedData = $request->all();
        Job::findOrFail($id)->update($approvedData);
        Session::flash('success', 'Disapproved List updated successfully!');
        return redirect()->route('jobDisApproveList');

    }

    public function getJobDisapproveDelete($id){
        Job::findOrFail($id)->delete();
        Session::flash('success', 'Job deleted successfully!');
        return redirect()->route('jobDisApproveList');
    }

    public function getApproveJoblist(){
        $jobList = Job::where('approved',0)->get();
        return view('admin.jobListApprove',['jobList'=>$jobList]);
    }

    public function getDisapproveJoblist(){
        $jobList = Job::where('approved',1)->get();
        return view('admin.jobListDisapprove',['jobList'=>$jobList]);
    }
}
