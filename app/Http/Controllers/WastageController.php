<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WastageController extends Controller
{
    //
    public function create()
    {
        return view('Wastage.wastage'); // Returns the product_stock.blade.php view
    }
}
