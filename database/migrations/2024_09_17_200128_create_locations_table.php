<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

   
return new class extends Migration
{
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('location_id');
            $table->string('name', 50);
            $table->text('description')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('locations');
    }
};

