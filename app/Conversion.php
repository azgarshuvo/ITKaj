<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversion extends Model
{
    protected $table = 'conversions';
    protected $fillable = ['admin_id','user_id', 'is_last'];



    public function message(){
        return $this->hasMany('App\Message');
       // return $this->hasMany('App\Message')->take(6);
    }

    public function UnreadMessage(){
        return $this->hasMany('App\Message')->where(['is_read'=>0,'sender'=>'user'])->orderBy('id', 'desc');;

    }
    public function UserUnreadMessage(){
        return $this->hasMany('App\Message')->where(['is_read'=>0,'sender'=>'admin'])->orderBy('id', 'desc');;
        // return $this->hasMany('App\Message')->take(6);
    }

    public function getUser(){
        return $this->belongsTo('App\User','user_id','id');
    }

    public function getAdmin(){
        return $this->belongsTo('App\User','admin_id','id');
    }

}
