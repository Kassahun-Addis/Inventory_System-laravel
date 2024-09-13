<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function create()
    {
        return view('Customer.customer'); // Returns the product_stock.blade.php view
    }
}
