<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDamageProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('damage_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('warehouse_id');
            $table->unsignedBigInteger('supplier_id');
            $table->date('date');
            $table->string('ref_code');
            $table->float('tax',8,2)->default(0);
            $table->float('discount',8,2)->default(0);
            $table->float('shipping',8,2)->default(0);
            $table->float('grandtotal',8,2)->default(0);
            $table->enum('status',['subtraction','buy']);
            $table->text('note');
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
        Schema::dropIfExists('damage_products');
    }
}
