<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Cart extends Model
{
  protected $guarded=[];

  protected $fillable = [
      'productId', 'name', 'price', 'quantity','userId',
  ];

  use softDeletes;

  public function customer(){
    return $this->belongsTo('\App\User', 'userId');
  }

  public function products(){
    return $this->belongsToMany('\App\Product', 'productId');
  }

    }
