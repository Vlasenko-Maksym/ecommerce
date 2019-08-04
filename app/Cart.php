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

  // public static function carts(){
  //   if (Auth::user()) {
  //   $carts = Cart::where('status',0)
  //   ->where('userId', Auth::user()->id)
  //   ->get();
  //
  //   $purchaseTotal = 0;
  //   foreach ($carts as $cartItem) {
  //     $purchaseTotal = $purchaseTotal +($cartItem->quantity * $cartItem->price);};
  //
  //     $vac = compact('carts','purchaseTotal');
  //     return $vac;}
  //     }
  //     else {
  //       $carts=[];
  //
  //     }
    }
