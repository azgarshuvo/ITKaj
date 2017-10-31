<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    protected $fillable = ['exam_id','question','right_answer','answer'];
}
