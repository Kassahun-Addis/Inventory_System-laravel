<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransferVoucherController extends Controller
{
    //
    public function create()
    {
        return view('Transfer_Voucher.transfer_voucher'); // Returns the product_stock.blade.php view
    }
}
