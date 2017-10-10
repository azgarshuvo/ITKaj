<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'users';

    protected $fillable = ['user_id','phone_number','country', 'city', 'postcode', 'address','img_path','skills','experience_lavel','professional_title','professional_overview','hourly_rate','available_for_each_week'];
}
