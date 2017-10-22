<?php

namespace App\Http\Controllers;

use App\Categories;
use App\FreelancerSelectedForJob;
use App\User;
use Illuminate\Http\Request;
use App\ContactDetails;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Job;
use Response;

class JobController extends Controller
{
    private  $userId = 0;
    public  function __construct()
    {
        $this->userId =auth()->user()->id;

    }
    public function getJobPost()
    {
        $categories = Categories::with('subcategory')->get();
        $freelancers = User::with(['profile'])->freelancer()->get();
        return view('front.jobPost', ['categories' => $categories, 'freelancers' => $freelancers]);
    }

    public  function PostJobPost(Request $request){

        $this->validate($request,[
            'title'=>'required|string|max:255|min:6',
            'category'=>'required',
            'duration'=>'required',
            'projectCost'=>'required',
            'projectType'=>'required',
            'skill'=>'required',
            'file'=>'required',
            'file.*' => 'image|mimes:jpeg,png,jpg,gif,svg,pdf',
            'description'=>'required|min:6',
            'inter_freelancer_list'=>'required',
            ]
        );

        $fileList = $this->fileUpload($request);
        $filesName = json_encode($fileList);

        $subCategory = $request->input('subCategory');

        $title = $request->input('title');
        $category = $request->input('category');

        $duration = $request->input('duration');
        $projectCost = $request->input('projectCost');
        $projectType = $request->input('projectType');
        $skill = json_encode($request->input('skill'));
        $description = $request->input('description');
        $freelancer_list = $request->input('inter_freelancer_list');

        if($subCategory){ $category =$subCategory; }

        $jobId = $this->jobToPost($title,$category,$duration,$projectCost,$projectType,$skill,$description,$filesName);
        $this->insertFreelancer($jobId,$freelancer_list);
        return redirect()->back()->with('message', 'Job insert successfully done, wait for admin approve!!! ');

    }


    /*Job description view*/
    public function getJobDescription(Request $request)
    {
        $jobId = $request->input('job_number');
        $jobDetails = Job::where('approved', 1)
                        ->where('id', $jobId)
                        ->first();

        $userInfo = User::with('profile')->where(['id'=>$jobDetails->user_id])->first();

        //dd($userInfo->profile);

        if($userInfo){
            return view('front.jobDescription',['jobDetails'=>$jobDetails,'userInfo'=>$userInfo]);
        }else{
            return redirect()->route('jobSearch');
        }

    }

    /*Search job*/
    public function getJobSearch(){
        $job_list = Job::where('approved', 1)
                        ->orderBy('id', 'desc')
                        ->get();


        return view('front.jobSearch',['job_list'=>$job_list]);
    }

    /*This upload image and return name*/
    private function fileUpload(Request $request){
        $nameList = array();
        if ($request->hasFile('file')) {
            $files = $request->file('file');
            foreach($files as $file){
                $filename = $file->getClientOriginalName();
                //$extension = $file->getClientOriginalExtension();
                $picture = date('His').$filename;
                $destinationPath = base_path() . '\public\images';
                $file->move($destinationPath, $picture);
                array_push($nameList,$picture);
            }
        }
        return $nameList;
    }

    /*This is for insert job post*/
    private function jobToPost($title,$category,$duration,$projectCost,$projectType,$skill,$description,$filesName){
        $user = Job::create([
            'user_id' => $this->userId,
            'name' => $title,
            'project_cost' => $projectCost,
            'project_time' => $duration,
            'description' => $description,
            'category_id' => $category,
            'skill_needed' => $skill,
            'job_attachment' => $filesName,
            'type' => $projectType,
        ]);
        return $user->id;
    }

    #this function for create download link for attachments
    public function getDownload(Request $request)
    {
        $attachment = $request->input('attachment');
        //PDF file is stored under project/public/download/info.pdf
        $file= public_path(). "/images/".$attachment;
        return \Response::download($file, "document_".$attachment);
    }

    /*insert freelancer of job*/
    function insertFreelancer($jobId,$freelancer_list){
        foreach ($freelancer_list as $freelancer) {
            FreelancerSelectedForJob::create(['job_id' => $jobId, 'freelancer_id' => $freelancer, 'status' => 0]);
        }
    }

    function getOwnJobDescription($id){
        $jobDetails = Job::where('id', $id)
            ->where('user_id', $this->userId)
            ->first();

        $contact = ContactDetails::with('job')->where(['employee_id'=>$this->userId,'job_id'=>$id])->first();

        if($contact){
            $userInfo = User::with('profile')->where(['id'=>$contact->freelancer_id])->first();

        }else{
            $userInfo = null;
        }
        return view('front.ownJobDescription',['jobDetails'=>$jobDetails,'userInfo'=>$userInfo]);

    }

    public function getJobOngoingList(){
        $jobList = ContactDetails::with('job')->where(['freelancer_id'=>$this->userId,'contact_status'=>0])->get();

        return view('front.jobOngoingList',['jobList'=>$jobList]);


    }

}
