<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $guarded=[];

  public function promotion(){
    return $this->belongsTo('\App\Promotion', 'promotionId');
  }

  public function carts(){
    return $this->belongsToMany('\App\Cart', 'CartId');
  }

  // public function creator()
  // {
  //   // agregar creator_id en la tabla productos para saber quien lo dio de alta
  // }
  public function brands(){
    return $this->hasMany('\App\Brand', 'BrandId');
  }

  }
