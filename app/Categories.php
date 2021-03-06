<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
  protected $table = 'categories';

  protected $fillable = ['category_name','is_parent', 'parent_category_id'];

    public function subcategory()
    {
        return  $this->hasMany('App\Categories', 'parent_category_id', 'id');
    }

}
