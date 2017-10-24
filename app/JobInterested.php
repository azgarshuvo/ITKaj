<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobInterested extends Model
{
    protected $table = 'job_interesteds';

    protected $fillable = ['job_id','user_id','project_duration','project_cost','comments','attachement'];


    public function scopeImInterested($query, $id){
        return $query->where('user_id', $id);
    }
    public function scopeInterestedjob($query, $id){
        return $query->where('job_id', $id);
    }
}
