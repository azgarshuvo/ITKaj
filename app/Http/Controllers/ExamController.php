<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ExamController extends Controller
{
    #add exam by admin
    public function ExamAdd(){
        return view('admin.exam.addExam');
    }

    #question add by admin
    public function QuestionAdd(){
        return view('admin.exam.addQuestion');
    }
}
