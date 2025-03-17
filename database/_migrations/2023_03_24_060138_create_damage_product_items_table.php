<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDamageProductItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('damage_product_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('damage_product_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->float('sub_total',8,2)->default(0);
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
        Schema::dropIfExists('damage_product_items');
    }
}
