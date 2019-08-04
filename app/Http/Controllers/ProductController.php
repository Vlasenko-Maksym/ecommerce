<?php

namespace App\Http\Controllers;

use App\Product;
use App\Promotion;
use App\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProductRequest;

class ProductController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    //
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $brands = Brand::all();
    $promotions = Promotion::all();

    return view('agregarProducto', compact('brands','promotions'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(CreateProductRequest $request)
  {
    $path = $request->file('logoUrl')->store('public/products');
    $file = basename($path);

    $newProduct = new Product();

    $newProduct->name = $request["name"];
    $newProduct->price = $request["price"];
    $newProduct->category = $request["category"];
    $newProduct->stock = $request["stock"];
    $newProduct->description = $request["description"];
    $newProduct->promotionId = $request["promotionId"];
    $newProduct->brandId = $request["brandId"];
    $newProduct->logoUrl = $file;
    $newProduct->save();

    return redirect("/guardadoExitoso");
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Product  $product
  * @return \Illuminate\Http\Response
  */
  public function show(Product $product)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Product  $product
  * @return \Illuminate\Http\Response
  */
  public function edit(Product $product)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Product  $product
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Product $product)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Product  $product
  * @return \Illuminate\Http\Response
  */
  public function destroy(Product $product)
  {
    //
  }

  public function category($id)
  {
    $products = Product::where('brandId', $id)->get();
    $promotions = Promotion::all();
    $brands= Brand::all();
    // var_dump($products);
    return view('category', compact('products','promotions','brands'));
  }

  public function exito(){
    return view('guardadoExitoso');
  }
}
