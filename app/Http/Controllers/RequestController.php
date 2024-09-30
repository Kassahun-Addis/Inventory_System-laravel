<?php

namespace App\Http\Controllers;

use App\Exports\BankCategoryExport;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    //
    public function create()
    {
        return view('Request_Order.request'); // Returns the product_stock.blade.php view
    }
    // Add this method to your controller
    public function exportToExcel()
    {
        return Excel::download(new BankCategoryExport, 'request.xlsx');
    }
}
