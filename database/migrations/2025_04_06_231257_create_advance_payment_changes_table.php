<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvancePaymentChangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advance_payment_changes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('advance_payment_id')->nullable()->constrained('advance_payments');
            $table->foreignId('customer_id')->constrained('customers');
            $table->integer('amount');
            $table->date('date');
            $table->string('method');
            $table->string('note')->nullable();
            $table->boolean('is_add')->default(true);
            $table->integer('before_balance')->default(0);
            $table->integer('after_balance')->default(0);
            $table->foreignId('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advance_payment_changes');
    }
}
