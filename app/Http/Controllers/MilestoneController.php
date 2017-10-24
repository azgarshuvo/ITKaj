<?php

namespace App\Http\Controllers;

use App\ContactDetails;
use App\Job;
use App\Milestone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MilestoneController extends Controller
{
    private  $userId = 0;
    public  function __construct()
    {
        $this->userId =auth()->user()->id;
    }

    /*set milestone*/
    function SetMilestoneView($jobId,Request $request){

       $milestone = ContactDetails::with(['millstone','job'])->where(['employee_id'=>$this->userId,'job_id'=>$jobId])->first();

        return view('front.milestoneSetUp',['milestone'=>$milestone]);
    }

    function getMilestone(){
        $milestone_list = ContactDetails::with(['millstone','job'])->where(['employee_id'=>$this->userId])->get();
        return view('front.milestoneView',['milestone_list'=>$milestone_list]);
    }

    /*set milestone*/
    function SetMilestone($jobId,Request $request){
        $contact = ContactDetails::with(['millstone','job'])->where(['employee_id'=>$this->userId,'job_id'=>$jobId,'contact_status'=>0])->first();
        $previousFundRelease = Milestone::where(['contact_id'=>$contact->id])->sum('fund_release');

        $jobCost = Job::where(['id'=>$jobId])->first()->project_cost;


        $this->validate($request,[
            'milestone_title'=>'required|string|max:255|min:3',
            'description'=>'required|min:5',
            'deadline'=>'required|date_format:Y-m-d|after:today',
            'fund_release'=>'required',

        ],[
            'milestone_title.required'=>'Milestone title is required',
            'description.required'=>'Description is required',
            'deadline.required'=>'Deadline date is required',
            'deadline.date_format'=>'Deadline date is invalid format',
            'deadline.after'=>'Deadline date is invalid',
            'fund_release.required'=>'Fund Release is required',
        ]);
        $milestone_title = $request->input('milestone_title');
        $description = $request->input('description');
        $deadline = $request->input('deadline');
        $fundRelease = $request->input('fund_release');
        $deadline = date("Y-m-d", strtotime($deadline));
        if($jobCost<$previousFundRelease+$fundRelease){
            return Redirect::back()->withErrors(['Milestone fund release cross the project cost'])->withInput();
        }

        Milestone::create([
            'freelancer_id' =>$contact->freelancer_id,
            'employee_id'=> $this->userId,
            'contact_id'=>$contact->id,
            'milestone_title'=>$milestone_title,
            'milestone_description'=>$description,
            'deadline'=>$deadline,
            'fund_release'=> $fundRelease,
            'status'=>0
        ]);
        return Redirect::back()->with('message', $milestone_title.' has been added success')->withInput(['job_no',$jobId]);
    }

    #set status release to released by ajax post request
    public function ReleaseFund(Request $request){
        $this->validate($request,[
            'milestone_id'=>'required|integer|min:1',
            'release_amount'=>'required|integer|min:1'
        ],[
            'milestone_id.required'=>"Milestone release doesn't complete",
            'milestone_id.integer'=>"Milestone release doesn't complete",
            'milestone_id.min'=>"Milestone release doesn't complete",
            'release_amount.required'=>"Milestone release doesn't complete",
            'release_amount.integer'=>"Milestone release doesn't complete",
            'release_amount.min'=>"Milestone release doesn't complete",
        ]);
        $milestoneID = $request->input('milestone_id');
        $releaseAmount = $request->input('release_amount');
        Milestone::where(['employee_id'=>$this->userId,'id'=>$milestoneID,'fund_release'=>$releaseAmount,'status'=>0])->update(['status'=>1]);
    }

    /*View milestone as freelancer*/
    public function getFreelancerMilestone($jobId){

        $milestone = ContactDetails::GetJobId($jobId)->with(['millstone', 'job'])->first();

        return view('front.milestoneFreelancer',['milestone'=>$milestone]);
    }

    /*update milestone */
    public function UpdateMilestone(Request $request){
        $validator = \Validator::make($request->all(),[
            'title'=>'required|string|max:255|min:3',
            'description'=>'required|min:5',
            'deadline'=>'required|date_format:Y-m-d|after:today',
            'fundrelease'=>'required',
            'contact_id'=>'required',
            'job_id'=>'required',

        ],[
            'title.required'=>'Milestone title is required',
            'description.required'=>'Description is required',
            'deadline.required'=>'Deadline date is required',
            'deadline.date_format'=>'Deadline date is invalid format',
            'deadline.after'=>'Deadline date is invalid',
            'fundrelease.required'=>'Fund Release is required',
            'contact_id.required'=>'Contact does not match',
            'job_id.required'=>'Selected job is invalid',
        ]);

        if ($validator->fails()) {
            echo "<div class='alert alert-danger text-center'>";
            foreach ($validator->messages()->getMessages() as $field_name => $messages)
            {
                foreach ($messages as $mes){
                    echo $mes."<br/>";
                }
            }
            echo "</div>";
            die();
        }
        $milestoneId = $request->input('id');
        $contactId = $request->input('contact_id');
        $title = $request->input('title');
        $description = $request->input('description');
        $jobId = $request->input('job_id');
        $fundRelease = $request->input('fundrelease');
        $deadline = $request->input('deadline');

        $previousFundRelease = Milestone::where(['contact_id'=>$contactId])->sum('fund_release');
        $jobCost = Job::where(['id'=>$jobId])->first()->project_cost;

        $ContactDetails = ContactDetails::where(['id'=>$contactId])->first();

        $contactEnd = strtotime($ContactDetails->contact_end);
        $contactStart = strtotime($ContactDetails->contact_start);

        if(strtotime($deadline)>$contactEnd){
            echo "<div class='alert alert-danger text-center'>";
            echo  "Deadline can't be after project end date";
            echo "</div>";
            die();
        }
        if(strtotime($deadline)<$contactStart){
            echo "<div class='alert alert-danger text-center'>";
            echo  "Deadline can't be before project start date";
            echo "</div>";
            die();
        }
        if(strtotime($deadline)<strtotime(date('Y-m-d'))){
            echo "<div class='alert alert-danger text-center'>";
            echo  "Deadline can't be before today";
            echo "</div>";
            die();
        }


        if($jobCost<$previousFundRelease+$fundRelease){
            echo "<div class='alert alert-danger text-center'>";
            echo  'Milestone fund release cross the project cost';
            echo "</div>";
            die();
        }

        if(Milestone::where(['id'=>$milestoneId,'status'=>0])->first()){

            Milestone::where(['id'=>$milestoneId,'status'=>0])->update([
                'milestone_title'=>$title,
                'milestone_description'=>$description,
                'deadline'=>$deadline,
                'fund_release'=> $fundRelease,
            ]);
            echo null;
        }else{
            echo "<div class='alert alert-danger text-center'>This milestone can't be Update</div>";
        }



    }

    public function DeleteMilestone(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'dropID' => 'required'
        ], [
            'dropID.required' => 'Invalid request to Milestone delete ',
        ]);


        if ($validator->fails()) {
            echo "<div class='alert alert-danger text-center'>";
            foreach ($validator->messages()->getMessages() as $field_name => $messages) {
                foreach ($messages as $mes) {
                    echo $mes . "<br/>";
                }
            }
            echo "</div>";
            die();
        }
        $dropId = $request->input('dropID');
        $data = Milestone::where(['id' => $dropId, 'employee_id' => $this->userId, 'status' => 0])->first();
        if ($data){
            $data->delete();

        }else{
            echo "<div class='alert alert-danger text-center'>This milestone can't be delete</div>";
        }
    }
}
