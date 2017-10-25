<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobInterested extends Model
{
    protected $table = 'job_interesteds';

    protected $fillable = ['job_id','user_id','project_duration','project_cost','comments','attachement', 'admin_approve'];


    public function scopeImInterested($query, $id){
        return $query->where('user_id', $id);
    }
    public function scopeInterestedjob($query, $id){
        return $query->where('job_id', $id);
    }
    public function user(){
        return $this->hasMany('App\User', 'id', 'user_id');
    }
    public function job(){
        return $this->hasOne('App\Job', 'id', 'job_id');
    }
    public function scopeApprove($query){
        return $query->where(['admin_approve'=>1]);
    }
    public function scopeDisapprove($query){
        return $query->where(['admin_approve'=>0]);
    }





}
