<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductStockController extends Controller
{
    //
    public function create()
    {
        return view('Product_Stock.product_stock'); // Returns the product_stock.blade.php view
    }

}
