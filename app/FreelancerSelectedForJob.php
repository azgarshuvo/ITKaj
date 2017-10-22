<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FreelancerSelectedForJob extends Model
{
    protected $table = 'freelancer_selected_for_jobs';

    protected $fillable = ['job_id','freelancer_id','status'];

    public function scopeFreelancerSelected($query, $job_id)
    {
        return $query->where(['job_id' => $job_id]);
    }
}
