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
  public function product(){
    return $this->belongsTo('\App\Product', 'productId');
  }

}
