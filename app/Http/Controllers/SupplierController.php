<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    //
    public function create()
    {
        return view('Supplier.supplier'); // Returns the product_stock.blade.php view
    }
}
