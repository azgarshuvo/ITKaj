<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';

    protected $fillable = ['user_id','name','project_cost', 'project_time', 'description','selected_freelancer', 'intermediate_freelancer','category_id','verified','skill_needed','job_attachment','type','start_date','end_date','approved'];

     public function scopePopular($query, $user_id)
    {
        return $query->where('user_id', '=', $user_id);
    }
     
}