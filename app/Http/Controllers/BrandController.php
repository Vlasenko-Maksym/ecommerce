<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\CreateBrandRequest;
use App\Http\Requests\editBrandRequest;

class BrandController extends Controller
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
    return view('/agregarMarca');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(CreateBrandRequest $request)
  {
    // @dd($request);
    $path = $request->file('logoUrl')->store('public/products');
    $file = basename($path);

    $newBrand = new Brand();

    $newBrand->name = $request["name"];
    $newBrand->logoUrl = $file;
    $newBrand->save();

    return redirect("/guardadoExitoso");

  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Brand  $brand
  * @return \Illuminate\Http\Response
  */
  public function show(Brand $brand)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Brand  $brand
  * @return \Illuminate\Http\Response
  */
  public function edit(Brand $brand)
  {
    $brandsEdit=Brand::withTrashed()->get();

    return view('editarMarcas', compact('brandsEdit'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Brand  $brand
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Brand $brand)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Brand  $brand
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $brand=Brand::find($id);
    $brand->delete();

    return redirect('/editarMarcas');
  }
  public function restore($id) {

    $brand=Brand::withTrashed()->find($id)->restore();
    $brandsEdit=Brand::withTrashed()->get();
    return view('editarMarcas', compact('brandsEdit'));
  }



}
