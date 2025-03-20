<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColsToCutomerPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cutomer_payments', function (Blueprint $table) {
            $table->integer('customer_id')->nullable();
            $table->string('payment_method')->nullable();
            $table->date('payment_date')->nullable();
            $table->text('note')->nullable();
            $table->json('affected_sales')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cutomer_payments', function (Blueprint $table) {
            $table->dropColumn('customer_id');
            $table->dropColumn('payment_method');
            $table->dropColumn('payment_date');
            $table->dropColumn('note');
            $table->dropColumn('affected_sales');
        });
    }
}
