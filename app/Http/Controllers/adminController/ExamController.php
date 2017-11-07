<?php

namespace App\Http\Controllers\adminController;

use App\Exam;
use App\ExamSet;
use App\Http\Controllers\BaseControllerAdmin;
use App\Question;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ExamController extends BaseControllerAdmin
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
            'description'=> $request->input('examDescription'),
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
    #exam delete by ajax request
    public function DeleteQuestion(Request $request){

        $questionId = $request->input('questionId');
        $exam = Question::where(['id'=> $questionId])->first();
        $exam->delete();
    }

    #question add by admin
    public function QuestionAdd($examId){
        $setDetails = ExamSet::where(['id'=>$examId])->first();
        return view('admin.exam.addQuestion',['setDetails'=>$setDetails]);
    }

    #add question set
    public function ExamQuestionSet(Request $request){
        $this->validate($request,[
            'questionSetId'=>'required|integer',
            'question'=>'required',
            'rightAnswer'=>'required',
            'answer'=>'required',
        ],[
                'questionSetId.required'=>'Set does not found',
                'question.required'=>'Question is required',
                'rightAnswer.required'=>'Right answer is required',
                'answer.required'=>'Answer is required',
            ]
        );
        $questionSetId = $request->input('questionSetId');
        $question = $request->input('question');
        $rightAnswer = $request->input('rightAnswer');
        $answer = $request->input('answer');
        array_push($answer,$rightAnswer);
        $answerJson = json_encode($answer);
        Question::create([
            'exam_set_id' => $questionSetId,
            'question' => $question,
            'right_answer' => $rightAnswer,
            'answer' => $answerJson,
        ]);
        return redirect()->back()->with('message', 'Question Add Success');
    }
    #get question list
    public function QuestionList($examId){
        $questionList = Question::where(['exam_set_id'=>$examId])->get();
        return view('admin.exam.questionList',['questionList'=>$questionList]);
    }

    #post ajax request for answer list
    public function AnswerList(Request $request){
        $questionId = $request->input('questionId');
        $question = Question::where(['id'=>$questionId])->first();
        $ansList = $question->answer;
        echo '';
        $count = 0;
        echo "<div class ='old-data'>";
        foreach (json_decode($ansList, true) as $answer){
            if($question->right_answer!=$answer) {

                if ($count == 0) {
                    echo "<div class='form-group'><label class='col-lg-2 control-label'>Question</label><div class='col-lg-10'>
                        <input id='inputName' type='text' name='answer[]' value='$answer' class='form-control'>                    
                  </div></div>";
                } else {
                    echo "<div class='form-group'><div class='col-lg-10 col-lg-offset-2'>
                        <input id='inputName'  value='$answer' type='text' name='answer[]' class='form-control'>                    
                  </div></div>";
                }
                $count++;
            }
        }
        echo '</div>';
    }

    #update question and answer list
    public function UpdateQuestion(Request $request){

        $this->validate($request,[
                'questionName'=>'required|string|max:255|min:6',
                'rightAnswer'=>'required',
                'answer'=>'required',
                'questionId'=>'required',
            ],[
                'questionName.required'=>'Question name is required',
                'rightAnswer.required'=>'Right answer is required',
                'answer.required'=>'Answer is required',
                'questionId.required'=>'Sorry, Question does not found',
            ]
        );
        $questionId = $request->input('questionId');
        $question = $request->input('questionName');
        $rightAnswer = $request->input('rightAnswer');
        $answer = $request->input('answer');
        array_push($answer,$rightAnswer);
        $answerJson = json_encode($answer);
        Question::where(['id' => $questionId])->update([
            'question' => $question,
            'right_answer' => $rightAnswer,
            'answer' => $answerJson,
        ]);
        return redirect()->back()->with('message', 'Question update Success');
    }

    #get question set view
    public function GetQuestionSet($examId){
        return view('admin.exam.addSet',['examId'=>$examId]);
    }
    #question set add by exam id
    public function QuestionSetAdd(Request $request){
        $this->validate($request,[
            'examId'=>'required|integer|max:255',
            'setName'=>'required',
            'setTime'=>'required',
            'setDescription'=>'required',
        ],[
                'examId.required'=>'Sorry, Exam does not found',
                'setName.required'=>'Set Name is required',
                'setTime.required'=>'Set Time is required',
                'setDescription.required'=>'Set Description Not Found',
            ]
        );

        $examId = $request->input('examId');
        $setName = $request->input('setName');
        $setTime = $request->input('setTime');
        $setDescription = $request->input('setDescription');
        ExamSet::create(['exam_id'=>$examId,'name'=>$setName,'description'=>$setDescription,'time'=>$setTime]);
        return redirect()->back()->with('message', 'Question Set Added Success');
    }

    #Get question set list
    public function QuestionSetList($examId){
        $setList = ExamSet::where(['exam_id'=>$examId])->get();

        return view('admin.exam.setList',['setList'=>$setList]);
    }

    #question set update
    public function UpdateQuestionSet(Request $request){

        $validator = \Validator::make($request->all(), [
            'name'=>'required|string|max:255|min:2',
            'time'=>'required',
            'description'=>'required|string|max:255|min:5',
            'quesSetId'=>'required',

        ], [
            'name.required'=>'Set Name is Invalid',
            'description.required'=>'Set Description is Invalid',
            'quesSetId.required'=>'Set is Invalid',
            'time.required'=>'Time is Invalid',
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

        $setId = $request->input('quesSetId');
        $description = $request->input('description');
        $time = $request->input('time');
        $name = $request->input('name');

        ExamSet::where(['id'=> $setId])->update(['name'=>$name,'description'=>$description,'time'=>$time]);
    }

    #Delete Question Set
    public function DeleteQuestionSet(Request $request){
        $quesSetId = $request->input('quesSetId');
        $examSet = ExamSet::where(['id'=> $quesSetId])->first();
        $examSet->delete();
    }

}
