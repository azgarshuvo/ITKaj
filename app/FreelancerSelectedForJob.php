<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FreelancerSelectedForJob extends Model
{
    protected $table = 'freelancer_selected_for_jobs';

    protected $fillable = ['job_id','user_id','status',];
}
