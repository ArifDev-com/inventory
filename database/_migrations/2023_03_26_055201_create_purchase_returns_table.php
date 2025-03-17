<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_returns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('warehouse_id');
            $table->date('date');
            $table->string('ref_code');
            $table->float('tax',8,2)->default(0);
            $table->float('discount',8,2)->default(0);
            $table->float('shipping',8,2)->default(0);
            $table->float('grandtotal',8,2)->default(0);
            $table->float('paid_amount')->nullable();
            $table->enum('status',['received','pending','sent']);
            $table->text('note')->nullable();
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
        Schema::dropIfExists('purchase_returns');
    }
}
