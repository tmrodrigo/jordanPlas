<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeassuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meassures', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->float('height')->nullable();
            $table->float('width')->nullable();
            $table->float('depth')->nullable();
            $table->float('weight')->nullable();
            $table->float('reflex_s')->nullable();
            $table->float('resistence')->nullable();
            $table->float('thickness')->nullable();
            $table->foreignId('product_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meassures');
    }
}
