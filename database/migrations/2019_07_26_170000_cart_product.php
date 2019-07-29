<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CartProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_product', function(Blueprint $table){
          $table->bigIncrements('id');
          $table->bigInteger('cartId')->unsigned();
          $table->bigInteger('productId')->unsigned();
          $table->foreign('cartId')->references('id')->on('carts');
          $table->foreign('productId')->references('id')->on('products');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
