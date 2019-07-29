<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
  use SoftDeletes;

    protected $guarded=[];

    public static function menus()
     {
         $brands = Brand::all();
         return $brands;
     }

}
