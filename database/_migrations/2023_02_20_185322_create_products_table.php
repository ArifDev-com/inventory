<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
           
            $table->id();
            $table->string('name');
            $table->string('productcode');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subCategory_id');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('warehouse_id');
            $table->unsignedBigInteger('supplier_id');
            $table->string('product_code')->nullable();
            $table->integer('min_qty')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('tax')->default(0);
            $table->integer('discount')->default(0);
            $table->string('purchase_price')->nullable();
            $table->string('price')->nullable();
            $table->text('description')->nullable();
            $table->string('product_slug')->nullable();
            $table->string('image')->nullable();
            $table->enum('status',['active','inactive']);
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
        Schema::dropIfExists('products');
    }
}
