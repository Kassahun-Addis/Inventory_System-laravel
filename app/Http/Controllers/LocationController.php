<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    //
    public function create()
    {
        return view('Sells_Location.location'); // Returns the product_stock.blade.php view
    }
}
