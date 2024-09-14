<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    //
    public function create()
    {
        return view('Request_Order.request'); // Returns the product_stock.blade.php view
    }
}
