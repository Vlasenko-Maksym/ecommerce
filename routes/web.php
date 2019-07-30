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
  Route::get('/agregarMarca', 'BrandController@create');
  Route::post('/agregarMarca', 'BrandController@store');
  Route::get('/editarUsuarios', 'UserController@create');
  Route::get('/editarPerfil/{id}', 'UserController@edit');
  Route::post('/editarUsuarios/{id}', 'UserController@restore');
  Route::delete('/editarUsuarios/{id}', 'UserController@destroy');
  Route::patch('/editarUsuarios')
});
