<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('front.jobPost');
    }

    public  function PostJobPost(Request $request){


        //dd($request->all());

        $this->validate($request,[
            'title'=>'required|string|max:255|min:6',
            'category'=>'required',
            'duration'=>'required',
            'projectCost'=>'required',
            'projectType'=>'required',
            'skill'=>'required',
            'file'=>'required',
            'file.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description'=>'required|min:6|max:255',
            'freelancer_list'=>'required',
            'inter_freelancer_list'=>'required',
            ]
        );

        $fileList = $this->fileUpload($request);
        $filesName = json_encode($fileList);

        //$subCategory = $request->input('subCategory');

        $title = $request->input('title');
        $category = $request->input('category');

        $duration = $request->input('duration');
        $projectCost = $request->input('projectCost');
        $projectType = $request->input('projectType');
        $skill = json_encode($request->input('skill'));
        $description = $request->input('description');
        $freelancer_list = json_encode($request->input('freelancer_list'));
        $inter_freelancer_list = json_encode($request->input('inter_freelancer_list'));

        $this->jobToPost($title,$category,$duration,$projectCost,$projectType,$skill,$description,$freelancer_list,$inter_freelancer_list,$filesName);
        return redirect()->back()->with('message', 'Job insert successfully done, wait for admin approve!!! ');

    }


    /*Job description view*/
    public function getJobDescription(Request $request)
    {
        $job_id = $request->input('job_number');
        $job_details = Job::where('approved', 1)
                        ->where('id', $job_id)
                        ->first();
        if($job_details){
            return view('front.jobDescription',['job_details'=>$job_details]);
        }else{
            return redirect()->route('jobSearch');
        }

    }
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
    private function jobToPost($title,$category,$duration,$projectCost,$projectType,$skill,$description,$freelancer_list,$inter_freelancer_list,$filesName){
        $user = Job::create([
            'user_id' => $this->userId,
            'name' => $title,
            'project_cost' => $projectCost,
            'project_time' => $duration,
            'description' => $description,
            'selected_freelancer' => $freelancer_list,
            'intermediate_freelancer' => $inter_freelancer_list,
            'category_id' => $category,
            'skill_needed' => $skill,
            'job_attachment' => $filesName,
            'type' => $projectType,
        ]);
    }

    #this function for create download link for attachments
    public function getDownload(Request $request)
    {
        $attachment = $request->input('attachment');
        //PDF file is stored under project/public/download/info.pdf
        $file= public_path(). "/images/".$attachment;



        return \Response::download($file, "document_".$attachment);
    }
}
