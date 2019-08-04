<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
  use SoftDeletes;

    protected $guarded=[];
    protected $fillable = [
      'name','description','percentage',
    ];

    public function products(){
      return $this->hasMany('\App\Product', 'promotionId');
    }
}
