<?php
/**
 * Created by PhpStorm.
 * User: msi
 * Date: 12-Oct-17
 * Time: 6:53 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Countries extends Model{
    protected $table = 'countries';


    public function states(){
        return $this->hasMany('App\States');
    }

}