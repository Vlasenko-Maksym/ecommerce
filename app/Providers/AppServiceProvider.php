<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Brand;
use App\Cart;

class AppServiceProvider extends ServiceProvider
{
  /**
  * Register any application services.
  *
  * @return void
  */
  public function register()
  {
    //
  }

  /**
  * Bootstrap any application services.
  *
  * @return void
  */
  public function boot()
  {
    \App::setLocale('es');
    Schema::defaultStringLength(191);

    View::composer('*', function($view) {
      $view->with('brands', Brand::menus());
      //Referencia: https://styde.net/menu-dinamico-en-laravel/
    });
    // View::composer('*', function($view) {
    //   $view->with('brands', Cart::carts());
    // });
  }
}
