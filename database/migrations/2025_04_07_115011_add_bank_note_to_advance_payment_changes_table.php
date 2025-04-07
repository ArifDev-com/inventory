<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBankNoteToAdvancePaymentChangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('advance_payment_changes', function (Blueprint $table) {
            $table->string('bank_note')->nullable();
        });
        Schema::table('advance_payments', function (Blueprint $table) {
            $table->string('bank_note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advance_payment_changes', function (Blueprint $table) {
            $table->dropColumn('bank_note');
        });
        Schema::table('advance_payments', function (Blueprint $table) {
            $table->dropColumn('bank_note');
        });
    }
}
