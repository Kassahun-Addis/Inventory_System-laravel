<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierTable extends Migration
{
    public function up()
    {
        Schema::create('supplier', function (Blueprint $table) {
            $table->id(); // This creates an auto-incrementing 'id' column
            $table->string('first_name', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->string('company', 100)->nullable();
            $table->mediumText('address')->nullable();
            $table->string('contact_person', 255);
            $table->string('phone_no', 20);
            $table->string('email', 50);
            $table->integer('tin_no');
            $table->string('product_type', 50);
            $table->timestamps(0); // This will create created_at and updated_at columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('supplier');
    }
}