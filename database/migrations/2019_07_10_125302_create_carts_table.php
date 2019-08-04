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
            $table->mediumInteger('cartNumber')->nullable();
            $table->string('name', 50);
            $table->decimal('price', 10,2);
            $table->integer('quantity')->unsigned();
            $table->bigInteger('userId')->unsigned();
            $table->bigInteger('productId')->unsigned();
            $table->integer('status')->default(0);
            $table->foreign('productId')->references('id')->on('products');
            $table->foreign('userId')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
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
