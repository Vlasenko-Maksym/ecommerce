<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    protected $guarded=[];

    use softDeletes;

    public function customer(){
      return $this->belongsTo('\App\User', 'userId');
    }

    public function statuses(){
      return $this->belongsToMany('\App\Status', 'statusId');
    }

    public function products(){
      return $this->belongsToMany('\App\Product', 'productId');
    }
}
