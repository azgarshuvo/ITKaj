<?php

namespace App\Http\Controllers;

use App\Exam;
use App\ExamResult;
use App\Question;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
        $examInfo = Exam::with('question')->where(['id'=>$examId])->first();
        return view('front.test.testInfo',['examInfo'=>$examInfo]);
    }

    #exam start of freelancer
    public function ExamTake($examId){
        $exam = Exam::with('question')->where(['id'=>$examId])->first();
        return view('front.test.testStart',['exam'=>$exam]);
    }

    #exam has been taken with result
    public function PostExamTaken($examId, Request $request){
        $rightAnswer = 0;
        $examInfo = Exam::with('question')->where(['id'=>$examId])->first();
        $totalQuestion = $examInfo->question->count();
        $wrongAnser = 0;
        foreach ($request->all() as $key => $value) {
            if ($key>0){
                $rightAnswer+=Question::where(['id'=>$key,'exam_id'=>$examId,'right_answer'=>$value])->count();
            }
        }
        $wrongAnser = $totalQuestion-$rightAnswer;
        $date = date('Y-m-d');
        if($rightAnswer ==0){
            $result = 0;
        }else{
            $result = ($rightAnswer/$totalQuestion)*100;
        }
        $resultData = [
            'user_id'=>$this->userId,
            'exam_id'=>$examId,
            'right_ans'=>$rightAnswer,
            'wrong_ans'=>$wrongAnser,
            'result'=>$result,
            'date'=>$date,
        ];
        ExamResult::create($resultData);
        $examInfo = Exam::with('question')->where(['id'=>$examId])->first();
        return view('front.test.testResult',['examInfo'=>$examInfo,'resultData'=>$resultData]);
    }
}
