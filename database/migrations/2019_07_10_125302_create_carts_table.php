<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha');
            $table->mediumInteger('numeroDeOrden');
            $table->integer('quantity');
            $table->bigInteger('userId')->unsigned();
            $table->bigInteger('productId')->unsigned();
            $table->bigInteger('statusId')->unsigned();
            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('productId')->references('id')->on('products');
            $table->foreign('statusId')->references('id')->on('statuses');
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
        Schema::dropIfExists('carts');
    }
}
