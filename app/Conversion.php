<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversion extends Model
{
    protected $table = 'conversions';
    protected $fillable = ['admin_id','user_id', 'is_last'];
    public function message(){
        return $this->hasMany('App\Message')->take(5);
    }

}
