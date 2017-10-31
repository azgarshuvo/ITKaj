<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Question;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ExamController extends Controller
{
    #add exam view by admin
    public function ExamAdd(){
        return view('admin.exam.addExam');
    }

    #post add exam into db
    public function PostAddExam(Request $request){
        $this->validate($request,[
           'examName'=>'required|string|max:255|min:2',
           'examDescription'=>'required|string|max:255|min:5',
        ]);

        Exam::create([
            'name'=> $request->input('examName'),
            'description'=> $request->input('examDescription')
        ]);
        return redirect()->back()->with('message', 'Exam Add Success');
    }

    /*get exam list */
    public function ExamList(){
        $examList = Exam::all();
        return view('admin.exam.listExam',['examList'=>$examList]);
    }

    #exam update post request
    public function PostExamUpdate(Request $request){

        $validator = \Validator::make($request->all(), [
            'name'=>'required|string|max:255|min:2',
            'description'=>'required|string|max:255|min:5',
        ], [
            'name.required'=>'Exam Name is Invalid',
            'description.required'=>'Exam Description is Invalid',
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



        $examId = $request->input('examId');
        $description = $request->input('description');
        $name = $request->input('name');

        Exam::where(['id'=> $examId])->update(['name'=>$name,'description'=>$description]);
    }

    #exam delete by ajax request
    public function PostExamDelete(Request $request){

        $examId = $request->input('examId');
        $exam = Exam::where(['id'=> $examId])->first();
        $exam->delete();
    }

    #question add by admin
    public function QuestionAdd($examId){
        $examDetails = Exam::where(['id'=>$examId])->first();

        return view('admin.exam.addQuestion',['examDetails'=>$examDetails]);
    }

    #add question set
    public function ExamQuestionSet(Request $request){
        $examId = $request->input('examId');
        $question = $request->input('question');
        $rightAnswer = $request->input('rightAnswer');
        $answer = $request->input('answer');
        array_push($answer,$rightAnswer);
        $answerJson = json_encode($answer);
        Question::create([
            'exam_id' => $examId,
            'question' => $question,
            'right_answer' => $rightAnswer,
            'answer' => $answerJson,
        ]);
        return redirect()->back()->with('message', 'Question Add Success');
    }


}
