<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCutomerPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cutomer_payments', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('reference')->nullable();
            $table->string('user_id')->nullable();
            $table->string('sale_id')->nullable();
            $table->string('paying_amount')->nullable();
            $table->string('down_payment')->nullable();
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
        Schema::dropIfExists('cutomer_payments');
    }
}
