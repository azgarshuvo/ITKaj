<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamSet extends Model
{
    protected $table = 'exam_sets';
    protected $fillable = ['exam_id','name','description','time'];

    #Question Set has many question
    public function question()
    {
        return $this->hasMany('App\Question');
    }
    #Question Set has one Exam
    public function exam()
    {
        return $this->hasOne('App\Exam','id','exam_id');
    }

    public function examResult()
    {
        return $this->hasOne('App\ExamResult','exam_set_id','id');
    }


}
