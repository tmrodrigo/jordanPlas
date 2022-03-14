<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('tarugo')->nullable();
            $table->string('arandela')->nullable();
            $table->string('tirafondo')->nullable();
            $table->string('img_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fixations');
    }
}
