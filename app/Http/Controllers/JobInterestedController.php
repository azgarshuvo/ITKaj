<?php

namespace App\Http\Controllers;

use App\JobInterested;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class JobInterestedController extends Controller
{
    private  $userId = 0;
    public  function __construct()
    {
        $this->userId =auth()->user()->id;

    }
    public function JobApply(Request $request){

        $this->validate($request,[
           'job_id'=>'required',
           'projectDuration'=>'required',
           'projectCost'=>'required',
           'comment'=>'required'
        ],
        [
            'job_id.required' => 'Invalid Job Request',
            'projectDuration.required' => 'Invalid Project Duration',
            'projectCost.required' => 'Invalid Project Cost',
            'comment.required' => 'Comments is required',
        ]);
        $jobId = $request->input('job_id');
        $projectDuration= $request->input('projectDuration');
        $projectCost= $request->input('projectCost');
        $comments= $request->input('comment');


        $fileList = $this->fileUpload($request);
        $filesName = json_encode($fileList);


        $hasApply = JobInterested::where(['job_id'=>$jobId,'user_id'=>$this->userId])->first();
        if($hasApply){
            return Redirect::back()->withErrors(['You already apply this job'])->withInput();
        }else{
            JobInterested::create([
                'job_id'=>$jobId,
                'user_id'=>$this->userId,
                'project_duration'=>$projectDuration,
                'project_cost'=>$projectCost,
                'comments'=>$comments,
                'attachement'=>$filesName,
            ]);
        }

        return Redirect::back()->with('message', 'Job application submitted success')->withInput(['job_no',$jobId]);


    }

    /*This upload attachment and return name as array*/
    private function fileUpload(Request $request){
        $nameList = array();
        if ($request->hasFile('file')) {
            $files = $request->file('file');
            foreach($files as $file){
                $filename = $file->getClientOriginalName();
                //$extension = $file->getClientOriginalExtension();
                $picture = date('His').$filename;
                $destinationPath = base_path() . '\public\apply_attach';
                $file->move($destinationPath, $picture);
                array_push($nameList,$picture);
            }
        }
        return $nameList;
    }
}


