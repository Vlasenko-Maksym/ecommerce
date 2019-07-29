<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $guarded=[];

    public function carts(){
      return $this->belongsToMany('\App\Cart', 'cartId');
    }
}
