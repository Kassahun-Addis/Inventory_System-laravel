<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductStocksTable extends Migration
{
    public function up()
    {
        Schema::create('product_stocks', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('category'); // Ensure this is here if you want to add it immediately
            $table->integer('quantity');
            $table->decimal('production_cost', 8, 2)->nullable();
            $table->decimal('selling_price', 8, 2);
            $table->integer('alert_quantity');
            $table->string('details_specification')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_stocks');
    }
}