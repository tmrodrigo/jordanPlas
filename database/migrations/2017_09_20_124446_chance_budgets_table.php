<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChanceBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('budgets', function (Blueprint $table) {
            $table->renameColumn('user_name', 'client_id')->nullable();
            $table->renameColumn('mail', 'product_id')->nullable();
            $table->renameColumn('phone', 'amount')->nullable();
            $table->dropColumn('comments');
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
            $table->renameColumn('client_id', 'user_name');
            $table->renameColumn('product_id', 'mail');
            $table->renameColumn('amount', 'phone');
            $table->string('comments');
        });
    }
}
