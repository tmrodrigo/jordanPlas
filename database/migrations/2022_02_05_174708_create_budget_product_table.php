<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budget_product', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('budget_id');
            $table->foreignId('product_id');
            $table->float('amount')->nullable();
            $table->float('unit_price')->nullable();
            $table->string('unit')->nullable();
            $table->string('color')->nullable();
            $table->string('support')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('budget_product');
    }
}
