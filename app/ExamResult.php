<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model
{
    protected $table = 'exam_results';
    protected $fillable = ['user_id','exam_id','right_ans','wrong_ans','result','date'];
}
