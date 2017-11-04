<?php

namespace App\Http\Controllers;

use App\Exam;
use App\ExamResult;
use App\ExamSet;
use App\Question;
use App\User;
use Illuminate\Http\Request;
use Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DateTime;
class TestController extends Controller
{
    private  $userId = 0;
    public  function __construct()
    {
        $this->userId =auth()->user()->id;

    }

    #get Test list for freelancer
    public function TestList(){
        $examList = Exam::all();
        return view('front.test.testList',['examList'=>$examList]);
    }

    #get test info
    public function TestInfo($examId){
        $examInfo = ExamSet::with(['question','exam'])->where(['id'=>$examId])->first();

        return view('front.test.testInfo',['examInfo'=>$examInfo]);
    }

    #exam start of freelancer
    public function ExamTake($examId){
        $exam = ExamSet::with(['question'])->where(['id'=>$examId])->first();
        $examResult = ExamResult::where(['exam_set_id'=>$examId,'user_id'=>$this->userId])->first();
        $renew = true;
        if($examResult){
            $examDay = new DateTime($examResult->date);
            $today = new DateTime(date('Y-m-d'));
            $interval = $today->diff($examDay);
            $renew = true;

            $Newdate = date('Y-m-d', strtotime($examResult->date. ' + 10 days'));

            if($interval->days<10){
                $renew =false;
            }
            return view('front.test.testStart',['exam'=>$exam,'renew'=>$renew,'Newdate'=>$Newdate]);
        }

        return view('front.test.testStart',['exam'=>$exam,'renew'=>$renew]);
    }

    #exam has been taken with result
    public function PostExamTaken($setId, Request $request){
        $rightAnswer = 0;
        $examInfo = ExamSet::with('question')->where(['id'=>$setId])->first();

        $totalQuestion = $examInfo->question->count();
        $wrongAnser = 0;
        foreach ($request->all() as $key => $value) {
            if ($key>0){
                $rightAnswer+=Question::where(['id'=>$key,'exam_set_id'=>$setId,'right_answer'=>$value])->count();
            }
        }
        $wrongAnser = $totalQuestion-$rightAnswer;
        $date = date('Y-m-d');
        if($rightAnswer ==0){
            $result = 0;
        }else{
            $result = (($rightAnswer/$totalQuestion)*100)/20;
        }
        $resultData = [
            'user_id'=>$this->userId,
            'exam_set_id'=>$setId,
            'right_ans'=>$rightAnswer,
            'wrong_ans'=>$wrongAnser,
            'result'=>$result,
            'date'=>$date,
        ];
        ExamResult::updateOrCreate(
            ['user_id'=>$this->userId,
                'exam_set_id'=>$setId],
            $resultData
        );
       /* ExamResult::create($resultData);*/
        $examInfo = ExamSet::with('question')->where(['id'=>$setId])->first();

        return view('front.test.testResult',['examInfo'=>$examInfo,'resultData'=>$resultData]);
    }

    #get Test Result of freelancer
    public function GetTestResult(){
       $examResult = ExamResult::with(['user','set'])->where(['user_id'=>$this->userId])->get();

        return view('front.test.testUser',['examResult'=>$examResult]);
    }

    #get Exam result Details
    public function GetExamTaken($examId){
        $resultInfo = ExamSet::with(['question','examResult'])->where(['id'=>$examId])->first();
        return view('front.test.resultDetails',['resultInfo'=>$resultInfo]);
    }

    #Get question set list
    public function GetSetList($examId){
        $setList = ExamSet::where(['exam_id'=>$examId])->get();
        return view('front.test.setList',['setList'=>$setList]);
    }
}
