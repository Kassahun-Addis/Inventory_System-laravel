<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    //
    public function create()
    {
        return view('Expense.expense'); // Returns the product_stock.blade.php view
    }
}
