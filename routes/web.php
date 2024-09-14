<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\ProductStockController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransferVoucherController;
use App\Http\Controllers\WastageController;




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
<<<<<<< HEAD
Route::post('/product-stock', [ProductStockController::class, 'store'])->name('product.stock.store'); // Add this line
=======
>>>>>>> origin/master
Route::get('/employee', [EmployeeController::class, 'create'])->name('employee.create');
Route::get('/expense', [ExpenseController::class, 'create'])->name('expense.create');
Route::get('/location', [LocationController::class, 'create'])->name('location.create');
Route::get('/request', [RequestController::class, 'create'])->name('request.create');
Route::get('/supplier', [SupplierController::class, 'create'])->name('supplier.create');
Route::get('/transfer-voucher', [TransferVoucherController::class, 'create'])->name('transfer.voucher.create');
Route::get('/wastage', [WastageController::class, 'create'])->name('wastage.create');

