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
        Schema::table('products', function (Blueprint $table) {
            $table->float('height', 8, 2)->nullable();
            $table->float('width', 8, 2)->nullable();
            $table->float('depth', 8, 2)->nullable();
            $table->float('weight', 8, 2)->nullable();
            $table->float('reflex_s', 8, 2)->nullable();
            $table->float('resistence', 8, 2)->nullable();
            $table->string('info_file')->nullable();
            $table->string('manual_file')->nullable();
            $table->string('left_img')->nullable();
            $table->string('right_img')->nullable();
            $table->integer('rating');
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
