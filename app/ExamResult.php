<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model
{
    protected $table = 'exam_results';
    protected $fillable = ['user_id','exam_set_id','right_ans','wrong_ans','result','date'];

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }


    public function set()
    {
        return $this->belongsTo('App\ExamSet','exam_set_id','id');
    }
}
