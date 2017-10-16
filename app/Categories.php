<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
  protected $table = 'categories';
  protected $fillable = ['category_name','is_subcategory', 'parent_category'];
}
