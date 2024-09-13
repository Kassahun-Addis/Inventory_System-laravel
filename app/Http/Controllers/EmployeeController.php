<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //
    public function create()
    {
        return view('Employee.employee'); // Returns the product_stock.blade.php view
    }
}
