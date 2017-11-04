<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $table = 'exams';
    protected $fillable = ['name','description'];

    #an exam has many question
    public function question()
    {
        return $this->hasMany('App\Question');
    }

    public function examResult()
    {
        return $this->hasOne('App\ExamResult','exam_id','id');
    }
}
