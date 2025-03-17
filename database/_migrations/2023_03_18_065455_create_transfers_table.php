<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('from_warehouse_id');
            $table->unsignedBigInteger('to_warehouse_id');
            $table->date('date');
            $table->string('ref_code');
            $table->integer('item');
            $table->float('tax',8,2)->default(0);
            $table->float('discount',8,2)->default(0);
            $table->float('shipping',8,2)->default(0);
            $table->float('grandtotal',8,2)->default(0);
            $table->enum('status',['completed','pending']);
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
        Schema::dropIfExists('transfers');
    }
}
