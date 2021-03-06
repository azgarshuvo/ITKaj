<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['fname','lname','username', 'email', 'user_type','admin_user_type', 'password','verified','is_complete', 'admin_approve', 'verification_token'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    public function conversion()
    {
        return $this->hasMany('App\Conversion','user_id','id');
    }


    public function profile(){
        return $this->hasOne('App\UserProfile');
    }
     public function education()
    {
        return $this->hasMany('App\Education');
    }
    public function employment()
    {
        return $this->hasMany('App\Employments');
    }
    public function job()
    {
        return $this->hasMany('App\Job','selected_for_job','id');
    }

    public function jobInterested()
    {
        return $this->hasMany('App\JobInterested','user_id','id');
    }


    public function scopeFindUser($query, $id){
      return $query->where('id',  $id);
    }

    public function scopeFreelancer($query)
    {
        return $query->where('user_type', 'freelancer');
    }
    public function scopeFreelancerAll($query)
    {
        return $query->where('user_type', 'freelancer');
    }

    public function scopeAllEmployer($query){
        return $query->where('user_type', 'employer');
    }
    public function freelancer(){
        return $this->hasOne('App\FreelancerSelectedForJob','freelancer_id','id');
    }
    public function scopeFreelancerApproveList($query){
        return $query->where(['user_type'=>'freelancer', 'admin_approve' => 1]);
    }
    public function scopeFreelancerDisapproveList($query){
        return $query->where(['user_type'=>'freelancer', 'admin_approve'=>0]);
    }
    public function scopeEmployeer($query){
        return $query->where('user_type', 'employer');
    }
    public function scopeEmployerApproveList($query){
        return $query->where(['user_type'=>'employer', 'admin_approve' => 1]);
    }
    public function scopeEmployerDisapproveList($query){
        return $query->where(['user_type'=>'employer', 'admin_approve' => 0]);
    }


    public function examResult()
    {
        return $this->hasMany('App\ExamResult','user_id','id');
    }




}
