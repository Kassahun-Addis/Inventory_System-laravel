<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('wastages', function (Blueprint $table) {
            $table->increments('WastageID');
            $table->string('Product_name', 50);
            $table->integer('Quantity');
            $table->date('WastageDate');
            $table->text('Reason')->nullable();
            $table->string('unit');
        });
    }

    public function down()
    {
        Schema::dropIfExists('wastages');
    }
};
