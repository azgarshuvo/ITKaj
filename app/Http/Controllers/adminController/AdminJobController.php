<?php

namespace App\Http\Controllers\adminController;

use App\Job;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminJobController extends Controller
{
    public function getJoblist(){
        $jobList = Job::where(['verified'=>0])->get();
        return view('admin.jobList',['jobList'=>$jobList]);
    }

    public function getJobDetails($id){
        $details = Job::find($id);
        return view('admin.job.jobDetails',['details'=>$details]);
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
        $freelancerList = User::where(['user_type'=>"freelancer"])->get();
        $jobList = Job::where(['approved'=>1])->get();
        return view('admin.jobListApprove',['jobList'=>$jobList,'freelancerList'=>$freelancerList]);
    }

    public function getDisapproveJoblist(){
        $jobList = Job::where('approved',1)->get();
        return view('admin.jobListDisapprove',['jobList'=>$jobList]);
    }

    /*Admin job approve by ajax*/
    public function PostJobApprove(Request $request){
        $jobId = $request->input('jobId');
        Job::where(['id'=>$jobId])->update(['verified'=>1,'approved'=>1]);
    }

    #get freelancer list by dropdown
    public function getFreelancerList(Request $request){
        $jobId = $request->input('jobId');

        $freelancers = DB::table('users')
            ->join('freelancer_selected_for_jobs', 'users.id', '=', 'freelancer_selected_for_jobs.freelancer_id')
            ->select('users.fname','users.lname', 'freelancer_selected_for_jobs.freelancer_id')
            ->get();
        $selectOption = '<option value="0">Select One</option>';
        foreach ($freelancers as $frelancer){
            $selectOption.='<option value="'.$frelancer->freelancer_id.'">'.$frelancer->fname.' '.$frelancer->lname.'</option>';
        }
        echo $selectOption;
    }

}
