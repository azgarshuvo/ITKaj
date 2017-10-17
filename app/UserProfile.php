<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use App\User;
class UserProfile extends Model
{
    protected $table = 'user_profiles';

    protected $fillable = ['user_id','phone_number','country', 'city', 'postcode', 'address','img_path','company_name','company_website','skills','experience_level','professional_title','professional_overview','hourly_rate','available_for_each_week'];

    public function Profile()
    {
        return $this->belongsTO('User', 'user_id', 'id');
    }
}
