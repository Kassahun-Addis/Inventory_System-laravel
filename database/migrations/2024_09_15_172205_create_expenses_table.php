<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing primary key column
            $table->date('expense_date');
            $table->string('expense_for', 50);
            $table->float('amount', 15, 2)->default(0.00);
            $table->string('expense_category', 50);
            $table->text('expense_description');
            $table->timestamp('added_date')->useCurrent(); // Defaults to current timestamp
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
