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
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\BankController;
use App\Exports\BankCategoryExport;
use App\Http\Controllers\SpecificationController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\SellPaymentController;
use App\Http\Controllers\ExpenseCategoryController;





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
Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
Route::post('customers/store', [CustomerController::class, 'store'])->name('customers.store');


Route::get('/product-stock/create', [ProductStockController::class, 'create'])->name('product.stock.create');
Route::get('/product-stock/index', [ProductStockController::class, 'index'])->name('product.stock.index');

Route::post('/product-stock/store', [ProductStockController::class, 'store'])->name('product.stock.store'); // Add this line
Route::get('/employee', [EmployeeController::class, 'create'])->name('employee.create');

Route::get('/expenses/create', [ExpenseController::class, 'create'])->name('expense.create'); // Show the form to create a new expense
Route::get('/expenses', [ExpenseController::class, 'index'])->name('expenses.index'); // Display all expenses
Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store'); // Store a new expense
//Route::get('/expense', [ExpenseController::class, 'create'])->name('expense.create');

Route::get('/location/create', [LocationController::class, 'create'])->name('location.create');
Route::get('/location', [LocationController::class, 'index'])->name('locations.index');
Route::post('/location', [LocationController::class, 'store'])->name('location.store');

Route::get('/request/create', [RequestController::class, 'create'])->name('request.create');
Route::get('/request', [RequestController::class, 'index'])->name('request.index');
Route::post('/request', [RequestController::class, 'store'])->name('request.store');

Route::get('/supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
Route::post('/supplier/store', [SupplierController::class, 'store'])->name('supplier.store');
Route::get('/suppliers', [SupplierController::class, 'index'])->name('supplier.index');

Route::get('/transfer-voucher/create', [TransferVoucherController::class, 'create'])->name('transfer.voucher.create');
Route::get('/transfer-voucher', [TransferVoucherController::class, 'index'])->name('transfer.voucher.index');
Route::post('/transfer-voucher', [TransferVoucherController::class, 'store'])->name('transfer.voucher.store');

Route::get('/product-category/create', [ProductCategoryController::class, 'create'])->name('product.category.create');
Route::get('/product-category', [ProductCategoryController::class, 'index'])->name('product.category.index');
Route::post('/product-category', [ProductCategoryController::class, 'store'])->name('product.category.store'); // Ensure this is correct

Route::get('/expense-category/create', [ExpenseCategoryController::class, 'create'])->name('expense.category.create');
Route::get('/expense-category', [ExpenseCategoryController::class, 'index'])->name('expense.category.index');
Route::post('/expense-category', [ExpenseCategoryController::class, 'store'])->name('expense.category.store');

Route::get('/bank-category/list', [BankController::class, 'index'])->name('bank.category.index');
Route::get('/bank-category/create', [BankController::class, 'create'])->name('bank.category.create');
Route::post('/bank-category', [BankController::class, 'store'])->name('bank.category.store');
Route::get('/bank-category/{id}/edit', [BankController::class, 'edit'])->name('bank-category.edit');
Route::put('/bank-category/{bank}', [BankController::class, 'update'])->name('banks.update');
Route::delete('/bank-category/{bank}', [BankController::class, 'destroy'])->name('banks.destroy');
Route::get('bank-category/export', [BankController::class, 'exportToExcel'])->name('bank.category.export');

Route::get('/payment-method-category/list', [PaymentMethodController::class, 'index'])->name('payment-method.category.index');
Route::get('/payment-method-category/create', [PaymentMethodController::class, 'create'])->name('payment-method.category.create');
Route::post('/payment-method-category', [PaymentMethodController::class, 'store'])->name('payment-method.category.store');
Route::get('/payment-method-category/{id}/edit', [PaymentMethodController::class, 'edit'])->name('payment-method-category.edit');
Route::put('/payment-method-category/{bank}', [PaymentMethodController::class, 'update'])->name('payment-method.update');
Route::delete('/payment-method-category/{bank}', [PaymentMethodController::class, 'destroy'])->name('payment-method.destroy');

Route::get('/specification/create', [SpecificationController::class, 'create'])->name('specification.category.create');
Route::get('/specification', [SpecificationController::class, 'index'])->name('specification.category.index');
Route::post('/specification', [SpecificationController::class, 'store'])->name('specification.category.store');


//Route::get('/wastages/create', [WastageController::class, 'create'])->name('wastages.create');
//Route::post('/wastage', [WastageController::class, 'store'])->name('wastages.store');
//Route::get('/wastage', [WastageController::class, 'index'])->name('wastages.index');
Route::get('/wastages', [WastageController::class, 'index'])->name('wastages.index');
Route::get('/wastages/create', [WastageController::class, 'create'])->name('wastage.create'); // Define the create route
Route::post('/wastages/store', [WastageController::class, 'store'])->name('wastages.store'); // Define the store route

Route::get('/sell-payment/create', [SellPaymentController::class, 'create'])->name('sell-payment.create');



