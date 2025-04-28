<?php

use App\Models\Sale;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMainDueTo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->string('main_due')->nullable();
            $table->string('main_due_date')->nullable();
        });
        Sale::query()
            ->where('due_amount', '>', 0)
            ->chunk(100, function ($sales) {
                foreach ($sales as $sale) {
                    $sale->update([
                        'main_due' => $sale->due_amount,
                        'main_due_date' => $sale->due_date,
                    ]);
                }
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->dropColumn('main_due');
            $table->dropColumn('main_due_date');
        });
    }
}

