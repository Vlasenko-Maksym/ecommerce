<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\AddToCartRequest;
use Auth;

class CartController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    // Preparo las dos cosas que necesito, todos los items del carrito y también el total comprado:

    $carts = Cart::where('status',0)
    ->where('userId', Auth::user()->id)
    ->get(); //Estoy pidiendo todos los objetos Cart con status 0 porque tienen que pertencer al carrito que el usuario tiene abierto. Esta consulta me va traer de la base todos esos items y dejarlos disponibles en la variable carts

    $purchaseTotal = 0;
    foreach ($carts as $cartItem) {
      $purchaseTotal = $purchaseTotal +($cartItem->quantity * $cartItem->price);
    } // este foreach me va a permitir recorrer la collection de objetos Cart y actualizar la variable $purchaseTotal en función de lo que contenga la posición qunatity y price de cada objeto recorrido. Este valor se actualizará a medida que actualice la quantity. De esta maenra cuando lo devuelva a la vista siempre estará actualizado.

    return view('cart', compact('carts', 'purchaseTotal'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(AddToCartRequest $request)
  {
    // dd($request);
    $product = Product::find($request->id);

    $cartExists = Cart::where('productId', $request->id)->where('userId',Auth::user()->id)->where('status','0')->first();

    if($cartExists){
      $cartExists->quantity += $request->quantity;
      $cartExists->save();
      return back();
    }

    $cart = new Cart;
    $cart->productId = $product->id;
    $cart->name = $product->name;
    $cart->price = $product->price;
    $cart->quantity = $request->quantity;
    $cart->userId = Auth::user()->id;

    $cart->save();
    return back();
  }

  // }

  /**
  * Display the specified resource.
  *
  * @param  \App\Cart  $cart
  * @return \Illuminate\Http\Response
  */
  public function show(Cart $cart)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Cart  $cart
  * @return \Illuminate\Http\Response
  */
  public function edit(Cart $cart)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Cart  $cart
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Cart $cart)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Cart  $cart
  * @return \Illuminate\Http\Response
  */
  public function destroy(Cart $cart)
  {
    //
  }

  public function closeCart(){
    $items = Cart::where('userId',Auth::user()->id)
    ->where('status',0)->get();

    $lastCart = Cart::max('cartNumber');

    foreach ($items as $item) {
      $item->cartNumber = $lastCart + 1;
      $item->status = 1;
      $item->save();
    }
    return view('/paymentFlow');
  }

  public function purchaseSuccess() {
    $purchasedItems = Cart::where('userId',Auth::user()->id)
    ->where('cartNumber', Cart::max('cartNumber'))->get();

    $lastCart = Cart::max('cartNumber');

    return view('/purchaseSuccess', compact('lastCart','purchasedItems'));
  }

  public function cartHistory(){
    $carts = Cart::where('userId',Auth::user()->id)
    ->where('status',1)->get()->groupBy('cartNumber');

    return view('/cartHistory', compact('carts'));
  }
}
