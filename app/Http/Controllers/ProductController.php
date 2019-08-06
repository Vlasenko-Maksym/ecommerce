<?php

namespace App\Http\Controllers;

use App\Product;
use App\Promotion;
use App\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\editProductRequest;

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


  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Product  $product
  * @return \Illuminate\Http\Response
  */
  public function update(editProductRequest $request, $id)
  {
    $path = $request->file('logoUrl')->store('public/products');
    $file = basename($path);
    $products=Product::all();
    $product=Product::find($id);


    $product->name = $request["name"];
    $product->price = $request["price"];
    $product->category = $request["category"];
    $product->stock = $request["stock"];
    $product->description = $request["description"];
    $product->promotionId = $request["promotionId"];
    $product->brandId = $request["brandId"];
    $product->logoUrl = $file;

    $product->save();
    return view('editarProductos', compact('products'));
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Product  $product
  * @return \Illuminate\Http\Response
  */
  public function destroy(Product $product, $id)
  {

    $product=Product::find($id);
    $product->delete();
    $products=Product::withTrashed()->get();
    return view('editarProductos', compact('products'));
  }

  public function category($id = null)
  {
    if($id != 6){
      $products = Product::where('brandId', $id)->get();
      $promotions = Promotion::all();
      $brands= Brand::all();
      $item=Product::where('BrandId',$id)->first();
      // dd($item);
      return view('category', compact('products','promotions','brands','id','item'));
    }
    else {
      $products = Product::all();
      $brands = Brand::all();
      return view('allCategories', compact('products','brands'));
    }
  }

  public function getItem($id, $productId){
    $item = Product::find($productId);
    // dd($item);
    $products = Product::where('brandId', $id)->get();
    // dd($item);
    return view('category', compact('item','products','id'));


  }

  public function exito(){
    return view('guardadoExitoso');
  }

  public function edit(Product $product)
  {
    $products=Product::withTrashed()->get();

    return view('editarProductos', compact('products'));
  }


  public function editform($id, Product $product)
  {
    $product=Product::find($id);
    $brands = Brand::all();
    $promotions = Promotion::all();
    return view('editarProducto', compact('product','brands','promotions'));
  }
  public function restore($id) {

    $product=Product::withTrashed()->find($id)->restore();
    $products=Product::withTrashed()->get();
    return view('editarProductos', compact('products'));
  }














}
