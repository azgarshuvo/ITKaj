<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    protected $table = 'milestones';

    protected $fillable = ['freelancer_id','employee_id','contact_id','milestone_title','milestone_description','deadline','fund_release','status'];

}
