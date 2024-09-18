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
    Schema::create('employees', function (Blueprint $table) {
        $table->id();
        $table->string('FirstName', 100)->nullable();
        $table->string('LastName', 100)->nullable();      
        $table->integer('phone_no');
        $table->string('email', 100)->nullable();
        $table->string('ContactInfo', 100)->nullable();
        $table->string('Position', 100)->nullable();
        $table->string('Department', 100)->nullable();
        $table->timestamp('HireDate')->useCurrent();
        
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
