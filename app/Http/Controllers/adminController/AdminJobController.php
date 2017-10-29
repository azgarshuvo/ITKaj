<?php

namespace App\Http\Controllers\adminController;

use App\Categories;
use App\ContactDetails;
use App\FreelancerSelectedForJob;
use App\Job;
use App\JobInterested;
use App\Milestone;
use App\Skills;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Input;

class AdminJobController extends Controller
{
    public function getJoblist(){
        $jobList = Job::get();
        return view('admin.jobList',['jobList'=>$jobList]);
    }

    #get job details by job id
    public function getJobDetails($id){
        $contact = $this->getMilestone($id);
        $jobDetails = Job::find($id);
        $employer = User::find($jobDetails->user_id);
        $category =[];
        $selectedForJob = [];
        $interestFreelancer = array();

        $cat = Categories::find($jobDetails->category_id);
        if($cat->is_parent == 0){
            $parentCategory = Categories::find($cat->parent_category_id);
            array_push($category, $parentCategory);
            array_push($category, $cat);
        }

        $interestedList = JobInterested::select('user_id')->where(['job_id'=>$id])->get();

        foreach ($interestedList as $freelancer){
            array_push($interestFreelancer,$freelancer->user_id);
        }

        $interestUser =  User::with('profile')->whereIn('id', $interestFreelancer)->get();


        $selected = FreelancerSelectedForJob::FreelancerSelected($jobDetails->id)->get();
        $freelancerList = User::FreelancerAll()->with('profile')->get();
        $assign = User::with('profile')->where('id',$jobDetails->selected_for_job)->first();

        foreach ($freelancerList as $freelancer){
            foreach ($selected as $freelancerSelect){
                if($freelancerSelect->freelancer_id == $freelancer->id) {
                    array_push($selectedForJob, $freelancer);
                }
            }
        }
        return view('admin.job.jobDetails', ['jobDetails'=>$jobDetails, 'selectedForJob'=>$selectedForJob, 'freelancerList'=>$freelancerList, 'category'=>$category,'assign'=>$assign,'interestUser'=>$interestUser,'contact'=>$contact]);

    }

    /*Get milestone details for job details view*/
    private function getMilestone($jobId){
        $milestoneList = ContactDetails::with('milestone')->where(['job_id'=>$jobId])->get();
        if(sizeof($milestoneList)>=1){
            return $milestoneList;
        }else{
            return null;
        }
    }

    public function getJobEditView($id){
        $categories = Categories::all();
        $jobList = Job::find($id);
        $categoriId = $jobList->category_id;
        $cateInfo = $this->getCateInfo($categories,$categoriId);
        $parentCateId = $cateInfo->parent_category_id;
        $skills = Skills::all();
        return view('admin.job.jobEdit',['jobList'=>$jobList,'categories'=>$categories,'parentCateId'=>$parentCateId,'skills'=>$skills]);
    }

    #return categories details
    private function getCateInfo($categories,$cateId){
        foreach ($categories as $cate){
            if($cateId==$cate->id){
                return $cate;
            }
        }
    }

    #get categories parent details
    private function getCateParent($categories,$cateId){
        foreach ($categories as $cate){
            if($cateId==$cate->id){
                return $cate;
            }
        }
    }


    #job update by admin
    public function postJobUpdate($id, Request $request){
        //dd($request->all());

        if ($request->hasFile('file')) {
            $image = $request->file('file');

            $imageName = time().$image->getClientOriginalName();

            $files = $image->move(public_path('dropZone'),$imageName);
        }else{
            $this->validate($request, [
                'name' => 'required',
                'description' => 'required',
                'category' => 'required',
                'sub_categorie' => 'required',
                'projectCost' => 'required',
                'projectCost' => 'required',
                'projectType' => 'required',
                'duration' => 'required',
                'skills' => 'required',
            ]);
            $cateInput = $request->input('category');
            if ($request->input('sub_categorie')>0){
                $cateInput =$request->input('sub_categorie');
            }


            $jobData= array(
                'name'=> $request->input('name'),
                'project_cost'=> $request->input('projectCost'),
                'project_time'=> $request->input('duration'),
                'description'=> $request->input('description'),
                'category_id'=> $cateInput,
                'skill_needed'=> json_encode($request->input('skills')),
                'type'=> $request->input('projectType'),
            );

            Job::where(['id'=>$id])->update($jobData);
            Session::flash('success', 'JobList updated successfully!');
            return redirect()->route('jobList');
        }
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
        $jobList = Job::where('approved',0)->get();
        return view('admin.jobListDisapprove',['jobList'=>$jobList]);
    }

    //Interested Job List
    public function getInterestedJoblist(){
        $information = JobInterested::with(['user','job'])->get();
        return view('admin.interestedJobList', ['information'=>$information]);
    }

    public function getInterestedApproveJoblist(){
        $approveInformation = JobInterested::Approve()->with(['user', 'job'])->get();
        return view('admin.interestedApproveJobList', ['approveInformation'=>$approveInformation]);
    }

    public function getInterestedDisapproveJoblist(){
        $disapproveInformation = JobInterested::Disapprove()->with(['user', 'job'])->get();
        return view('admin.interestedJobDisapproveList', ['disapproveInformation'=>$disapproveInformation]);
    }


    /*Admin job approve by post ajax*/
    public function PostJobApprove(Request $request){
        $jobId = $request->input('jobId');
        Job::where(['id'=>$jobId])->update(['verified'=>1,'approved'=>1]);
    }

    /*Admin job disapprove by post ajax*/
    public function PostJobDisapprove(Request $request){
        $jobId = $request->input('jobId');
        Job::where(['id'=>$jobId])->update(['verified'=>1,'approved'=>0]);
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

    /*assign freelancer for job*/
    public function FreelancerAssign(Request $request){

            $validator = \Validator::make($request->all(), [
                'id' => 'required',
                'jobID' => 'required',
                'contactStart' => 'required|date_format:Y-m-d|after:today',
                'contactEnd' => 'required|date_format:Y-m-d|after:contactStart',
            ], [
                'id.required' => 'Freelancer Assign Error',
                'jobID.required' => 'Job Assign Error',
                'contactStart.required' => 'Contact Start Date Error',
                'contactStart.date_format' => 'Contact Start Date Invalid Format',
                'contactStart.after' => "Contact Start Date Can't be Before Today",
                'contactEnd.after' => "Contact End Date Can't be Before Contact Start Date",
                'contactEnd.date_format' => 'Contact End Date Invalid Format',
                'contactEnd.required' => 'Contact End Date Error',
            ]);

            $id = $request->input('id');
            $jobID = $request->input('jobID');
            $contactDetails = $request->input('contactDetails');
            $contactStart = $request->input('contactStart');
            $contactEnd = $request->input('contactEnd');

            if ($validator->fails()) {
                $mes = "<div class='alert alert-danger text-center'>";
                foreach ($validator->messages()->getMessages() as $field_name => $messages) {
                    foreach ($messages as $mes) {
                        $mes.= "<br/>";
                    }
                }
                $mes.=  "</div>";
                echo $mes;

            } else{

                    $assign = Job::find($jobID);
                if($assign->approved==1){
                     if($assign->selected_for_job == null || $assign->selected_for_job == ''){
                         $employeId = $assign->user_id;
                         $contact = ContactDetails::where(['job_id'=>$jobID])->first();
                         if ($contact){
                             echo 'The job already in contact list!!!';
                         }else{
                             $assign->update(['selected_for_job'=>$id]);
                             ContactDetails::create([
                                 'freelancer_id'=>$id,
                                 'employee_id'=>$employeId,
                                 'job_id'=>$jobID,
                                 'contact_details'=>$contactDetails,
                                 'contact_start'=>$contactStart,
                                 'contact_end'=>$contactEnd,
                                 'contact_status'=>0,
                                 ]);

                             JobInterested::where(['job_id'=>$jobID,'user_id'=>$id])->update(['admin_approve'=>1]);
                         }
                     }
                     else{
                         echo 'Freelancer Already Exist, You must delete to add another freelancer';
                     }
                }else{
                    echo "The Job is not approve yet, to assign freelancer you need to approve the job";
                }

            }
    }

    /*Remove freelancer from contact and assign job by job id*/
    public function FreelancerRemove($jobId){
        $contact = ContactDetails::with('milestone')->where(['job_id'=>$jobId])->first();
        if($contact) {
            if (sizeof($contact->milestone) >= 1) {
                return redirect()->back()->with('error', "Freelancer can't be remove, may be there are one or more milestone");
            } else {
                $job = Job::find($jobId);
                $seletedFreelancer = $job->selected_for_job;
                $data = ContactDetails::where(['job_id' => $jobId, 'contact_status' => 0])->first();
                if ($data) {
                    $data->delete();
                    JobInterested::where(['user_id' => $seletedFreelancer, 'job_id' => $jobId])->update(['admin_approve' => 0]);
                    $job->selected_for_job = null;
                    $job->save();
                    return redirect()->back()->with('success', "Freelancer Remove Success from This Job");
                } else {
                    return redirect()->back()->with('error', "Something Went Wrong, System unable to Freelancer remove. May be contact not found");
                }
            }
        }else{
            return redirect()->back()->with('error', "Job or Freelancer not Found");
        }

    }

    public function FreelancerListAssign(Request $request){
        $id = $request->input('id');
        $jobID = $request->input('jobID');
        $assign = Job::find($jobID);
        if($assign->selected_for_job == null || $assign->selected_for_job == ''){
            $assign->update(['selected_for_job'=>$id]);
        }else{
            Session::flash('success', 'Freelancer Already Exist, You must delete to add another freelancer');
        }

    }

    //Interested freelancer profile

    public function getInterestedFreelancerDetails(){
        return view('admin.selectedFreelancerProfile');
    }



    public function acceptJobDone(){
        $validate = Validator::make(Input::all(), array(
            'contactId' => 'required',
        ));
        if($validate){
            $contact = ContactDetails::find(Input::get('contactId'));
            $job = Job::find($contact->	job_id);
            if($contact != null && $contact != '' && $job != null && $job != ''){
                $job->status = 1;
                $job->update();
                $contact->contact_status = 1;
                $contact->update();
                return "true";
            }
            return "false";
        }
        return "false";
    }

    #admin attachment add by job id
    public function adminAttach($jobId,Request $request){
        $image = $request->file('file');
        $imageName = date('His').$image->getClientOriginalName();
        $files = $image->move(public_path('attach'),$imageName);
        $jobData = Job::where(['id'=>$jobId])->first();
        $att = $jobData->job_attachment;
       
        $attachment = json_decode($att,true);
        array_push($attachment,$imageName);
        $updateAttachment = json_encode($attachment);
        $jobData->job_attachment = $updateAttachment;
        $jobData->save();
    }

}
