<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employments extends Model
{
    protected $table = 'employments';
    protected $fillable = ['user_id','company_name','country', 'city', 'postal_code', 'start_date','finish_date', 'designation'];
}
