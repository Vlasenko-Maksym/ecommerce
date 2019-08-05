<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/brand/{id}', 'ProductController@category');

Route::middleware(['auth', 'role'])->group(function (){
  Route::get('/agregarProducto', 'ProductController@create');
  Route::post('/agregarProducto', 'ProductController@store');
  Route::get('/guardadoExitoso', 'ProductController@exito');
  Route::get('/agregarPromocion', 'PromotionController@create');
  Route::post('/agregarPromocion', 'PromotionController@store');
  Route::get('editarPromociones', 'PromotionController@index');
  Route::delete('/editarPromociones/{id}', 'PromotionController@destroy');
  Route::post('/editarPromociones/{id}', 'PromotionController@restore');
  Route::get('/agregarMarca', 'BrandController@create');
  Route::post('/agregarMarca', 'BrandController@store');
  Route::get('/editarUsuarios', 'UserController@create');
  Route::post('/editarUsuarios/{id}', 'UserController@restore');
  Route::delete('/editarUsuarios/{id}', 'UserController@destroy');
  Route::patch('/editarUsuarios', 'UserController@update');
});

Route::middleware(['auth'])->group(function(){
  Route::get('/passwordChange/{id}', 'PasswordChangeController@edit');
  Route::patch('/editarPerfil/{id}', 'UserController@update');
  Route::get('/editarPerfil/{id}', 'UserController@edit');
  Route::post('/cart', 'CartController@store'); //Guardamos productos en tabla cart.
  Route::get('/deleteCart/{id}', 'CartController@destroy'); //Borramos productos del carrito.
  Route::get('/cart', 'CartController@index'); //Mostramos el carrito abierto.
  Route::get('/cartHistory', 'CartController@cartHistory');
  Route::get('/paymentFlow', 'CartController@closeCart');
  Route::get('/purchaseSuccess', 'CartController@purchaseSuccess');
});
