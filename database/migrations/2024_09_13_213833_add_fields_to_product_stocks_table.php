<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    // Schema::table('product_stocks', function (Blueprint $table) {
    //     $table->string('category')->after('product_name'); // New category field
    //     $table->decimal('production_cost', 8, 2)->nullable()->after('quantity'); // Nullable field
    //     $table->decimal('selling_price', 8, 2)->after('production_cost'); // Selling price
    //     $table->integer('alert_quantity')->after('selling_price'); // Alert quantity
    //     $table->string('details_specification')->nullable()->after('alert_quantity'); // Nullable field
    // });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
   
}
};
