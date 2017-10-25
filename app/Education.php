<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'education';
    protected $fillable = ['user_id','institution','degree', 'area_of_study', 'start_date', 'end_date','description'];

    public function scopeEducation($query, $id){
        return $query->where('user_id', '=', $id);
    }

}
