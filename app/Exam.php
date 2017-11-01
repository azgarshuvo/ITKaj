<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $table = 'exams';
    protected $fillable = ['name','description','time'];

    #an exam has many question
    public function question()
    {
        return $this->hasMany('App\Question');
    }

}
