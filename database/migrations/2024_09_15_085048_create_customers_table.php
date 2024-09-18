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
    Schema::create('customers', function (Blueprint $table) {
        $table->id();
        $table->string('name', 100)->nullable();
        $table->string('company', 100)->nullable();
        $table->string('address', 100)->nullable();
        $table->integer('phone_no');
        $table->string('email', 100)->nullable();
        $table->integer('tin_no');
        $table->timestamp('create_at')->useCurrent();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
