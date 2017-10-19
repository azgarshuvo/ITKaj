<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactDetails extends Model
{
    protected $table = 'contact_details';

    protected $fillable = ['freelancer_id','employee_id','job_id','contact_details','contact_start','contact_end','contact_status'];


    public function millstone(){
        return $this->hasMany('App\Milestone','contact_id','id');
    }


    public function job(){
        return $this->hasOne('App\Job','id','job_id');
    }
}
