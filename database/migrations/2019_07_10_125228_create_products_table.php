<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50);
            $table->decimal('price', 10,2);
            $table->enum('category', ["FEMENINO","MASCULINO","UNISEX"]);
            $table->integer('stock');
            $table->string('description', 350);
            $table->bigInteger('promotionId')->unsigned();
            $table->bigInteger('brandId')->unsigned();
            $table->string('logoUrl', 350);
            $table->foreign('promotionId')->references('id')->on('promotions');
            $table->foreign('brandId')->references('id')->on('brands');
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
        Schema::dropIfExists('products');
    }
}
