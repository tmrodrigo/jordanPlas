<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColorsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colors_products', function (Blueprint $table) {
          $table->integer('color_id')->unsigned()->nullable();
          $table->foreign('color_id')->references('id')
          ->on('colors')->onDelete('cascade');

          $table->integer('product_id')->unsigned()->nullable();
          $table->foreign('product_id')->references('id')
          ->on('products')->onDelete('cascade');

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
        Schema::dropIfExists('colors_products');
    }
}
