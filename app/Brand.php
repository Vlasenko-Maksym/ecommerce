<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $guarded=[];

    public static function menus()
     {
         $brands = Brand::all();
         return $brands;
     }

}
