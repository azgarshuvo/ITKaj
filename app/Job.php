<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';

    protected $fillable = ['user_id','name','project_cost', 'project_time', 'description','selected_freelancer', 'intermediate_freelancer','category_id','verified','skill_needed','job_attachment','type','start_date','end_date','approved','selected_for_job'];

    public function scopeProjectList($query, $user_id)
    {
        return $query->where('user_id', '=' , $user_id);
    }
    public function scopeProjectApproveList($query, $user_id)
    {
        return $query->where(['user_id' => $user_id , 'approved' => 1]);
    }
    public function scopeProjectDisapproveList($query, $user_id)
    {
        return $query->where(['user_id' => $user_id , 'approved' => 0]);
    }
    public function scopeProjectDoneList($query, $user_id)
    {
        return $query->where(['user_id' => $user_id , 'approved' => 0]);
    }

    public function contact(){
        return $this->hasOne('App\ContactDetails');
    }
    public function selectedFreelancer(){
        return $this->hasMany('App\FreelancerSelectedForJob', 'job_id', 'id');
    }

    public function scopeFindJob($query, $id){
        return $query->where('id', '=', $id);
    }







}
