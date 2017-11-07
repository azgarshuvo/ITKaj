<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    protected $fillable = ['conversion_id','message', 'attachment', 'is_read','sender','time','date'];

}
