<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('assets', function (Blueprint $table) {
        $table->id();
        $table->string('asset_name');
        $table->string('category');
        $table->decimal('purchase_price', 10, 2);
        $table->string('status');
        $table->string('serial_no')->nullable();
        $table->text('description')->nullable();
        $table->string('assigned_to')->nullable();
        $table->string('department');
        $table->date('purchase_date');
        $table->date('last_maintenance_date')->nullable();
        $table->text('remark')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
