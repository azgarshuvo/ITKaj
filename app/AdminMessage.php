<?php
/**
 * Created by PhpStorm.
 * User: Zakariya Omar Naseef
 * Date: 21-Nov-17
 * Time: 12:24 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class AdminMessage extends Model{

    protected $table = 'admin_message';

    protected $fillable = ['message','is_live', 'user_id'];

}