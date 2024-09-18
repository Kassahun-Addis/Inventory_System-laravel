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
Route::get('/assets', [AssetController::class, 'index'])->name('assets.index');

// The existing routes remain the same
//Route::get('/Product_Stock/product_stock', [AssetController::class, 'product_stock'])->name('Product_Stock.product_stock');
//Route::get('/customer.create', [CustomerController::class, 'create'])->name('customer.create');
//Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
Route::get('customer/create', [CustomerController::class, 'create'])->name('customer.create');
Route::get('customers', [CustomerController::class, 'index'])->name('customerss.index');
Route::post('customers/store', [CustomerController::class, 'store'])->name('customers.store');


Route::get('/product-stock/create', [ProductStockController::class, 'create'])->name('product.stock.create');
Route::get('/product-stock/index', [ProductStockController::class, 'index'])->name('product.stock.index');

Route::post('/product-stock/store', [ProductStockController::class, 'store'])->name('product.stock.store'); // Add this line
Route::get('/employee', [EmployeeController::class, 'create'])->name('employee.create');

Route::get('/expenses/create', [ExpenseController::class, 'create'])->name('expense.create'); // Show the form to create a new expense
Route::get('/expenses', [ExpenseController::class, 'index'])->name('expenses.index'); // Display all expenses
Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store'); // Store a new expense
//Route::get('/expense', [ExpenseController::class, 'create'])->name('expense.create');

Route::get('/location', [LocationController::class, 'create'])->name('location.create');
Route::get('/request', [RequestController::class, 'create'])->name('request.create');

Route::get('/supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
Route::post('/supplier/store', [SupplierController::class, 'store'])->name('supplier.store');
Route::get('/suppliers', [SupplierController::class, 'index'])->name('supplier.index');

Route::get('/transfer-voucher', [TransferVoucherController::class, 'create'])->name('transfer.voucher.create');

//Route::get('/wastages/create', [WastageController::class, 'create'])->name('wastages.create');
//Route::post('/wastage', [WastageController::class, 'store'])->name('wastages.store');
//Route::get('/wastage', [WastageController::class, 'index'])->name('wastages.index');
Route::get('/wastages', [WastageController::class, 'index'])->name('wastages.index');
Route::get('/wastages/create', [WastageController::class, 'create'])->name('wastage.create'); // Define the create route
Route::post('/wastages/store', [WastageController::class, 'store'])->name('wastages.store'); // Define the store route


