<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('warehouse_id');
            $table->date('date');
            $table->string('ref_code');
            $table->float('tax',8,2)->default(0);
            $table->float('discount',8,2)->default(0);
            $table->float('shipping',8,2)->default(0);
            $table->float('grandtotal',8,2)->default(0);
            $table->float('paid_amount',8,2)->default(0);
            $table->float('due_amount',8,2)->default(0);
            $table->enum('payment_status',['paid','unpaid']);
            $table->enum('payment_type',['cash','card','online']);
            $table->text('note')->nullable();
            $table->string('barcode_url');
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
        Schema::dropIfExists('sales');
    }
}
