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
        Schema::create('shipments', function (Blueprint $table) {
            $table->increments('ShipmentID');
            $table->string('Assigned_person', 50);
            $table->text('Carrier')->nullable();
            $table->date('ShipmentDate');
            $table->string('TrackingNumber')->nullable();
            $table->string('ShippingAddress', 50);
            $table->integer('ShippingCost');
            $table->string('Status')->nullable();

        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
