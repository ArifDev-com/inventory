<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDueDateToSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->date('due_date')->nullable();
            $table->double('other_cost')->default(0);
        });
        Schema::table('sale_items', function (Blueprint $table) {
            $table->string('price_type')->default('mrp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->dropColumn('due_date');
            $table->dropColumn('other_cost');
        });
        Schema::table('sale_items', function (Blueprint $table) {
            $table->dropColumn('price_type');
        });
    }
}
