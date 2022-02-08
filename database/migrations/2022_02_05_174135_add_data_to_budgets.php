<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDataToBudgets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('budgets', function (Blueprint $table) {
            $table->boolean('has_tax')->nullable();
            $table->boolean('has_delivery')->nullable();
            $table->string('observation')->nullable();
            $table->foreignId('client_id')->change();
            $table->foreignId('product_id')->change();
            $table->float('tax')->nullable();
            $table->float('total')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('budgets', function (Blueprint $table) {
            //
        });
    }
}
