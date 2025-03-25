<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsDuePayTocutomerPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cutomer_payments', function (Blueprint $table) {
            $table->boolean('is_due_pay')->default(false);
            $table->date('due_date')->nullable();
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
            $table->dropColumn('is_due_pay');
            $table->dropColumn('due_date');
        });
    }
}
