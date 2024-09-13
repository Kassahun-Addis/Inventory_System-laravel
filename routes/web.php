<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\ProductStockController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;




Route::get('/', function () {
    return view('welcome');
});


//Route::get('/', [AssetController::class, 'create'])->name('assets.create');


// The existing routes remain the same
Route::get('/assets/create', [AssetController::class, 'create'])->name('assets.create');
Route::post('/assets', [AssetController::class, 'store'])->name('assets.store');

// The existing routes remain the same
//Route::get('/Product_Stock/product_stock', [AssetController::class, 'product_stock'])->name('Product_Stock.product_stock');
//Route::get('/customer.create', [CustomerController::class, 'create'])->name('customer.create');
Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');

Route::get('/product-stock', [ProductStockController::class, 'create'])->name('product.stock.create');
Route::get('/employee', [EmployeeController::class, 'create'])->name('employee.create');
Route::get('/expense', [ExpenseController::class, 'create'])->name('expense.create');
Route::get('/location', [LocationController::class, 'create'])->name('location.create');
Route::get('/request', [RequestController::class, 'create'])->name('request.create');
Route::get('/supplier', [SupplierController::class, 'create'])->name('supplier.create');
Route::get('/transfer-voucher', [TransferVoucherController::class, 'create'])->name('transfer.voucher.create');
Route::get('/wastage', [WastageController::class, 'create'])->name('wastage.create');

