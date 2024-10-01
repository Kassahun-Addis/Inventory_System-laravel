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
Route::get('/assets/{id}/edit', [AssetController::class, 'edit'])->name('assets.edit');
Route::put('/assets/{bank}', [AssetController::class, 'update'])->name('assets.update');
Route::delete('/assets/{bank}', [AssetController::class, 'destroy'])->name('assets.destroy');
Route::post('assets/export', [AssetController::class, 'exportToExcel'])->name('assets.export');

// The existing routes remain the same
//Route::get('/Product_Stock/product_stock', [AssetController::class, 'product_stock'])->name('Product_Stock.product_stock');
//Route::get('/customer.create', [CustomerController::class, 'create'])->name('customer.create');
//Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
Route::get('customers/create', [CustomerController::class, 'create'])->name('customer.create');
Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
Route::post('customers/store', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::put('/customers/{bank}', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customers/{bank}', [CustomerController::class, 'destroy'])->name('customers.destroy');
Route::post('customers/export', [CustomerController::class, 'exportToExcel'])->name('customers.export');


Route::get('/product-stock/create', [ProductStockController::class, 'create'])->name('product.stock.create');
Route::get('/product-stock/index', [ProductStockController::class, 'index'])->name('product.stock.index');
Route::post('/product-stock', [ProductStockController::class, 'store'])->name('product.stock.store');
Route::get('/product.stock/{id}/edit', [ProductStockController::class, 'edit'])->name('product.stock.edit');
Route::put('/product.stock/{bank}', [ProductStockController::class, 'update'])->name('product.stock.update');
Route::delete('/product.stock/{bank}', [ProductStockController::class, 'destroy'])->name('product.stock.destroy');
Route::post('product-stock/export', [ProductStockController::class, 'exportToExcel'])->name('product-stock.export');


Route::post('/employee/store', [EmployeeController::class, 'store'])->name('employee.store'); // Add this line
Route::get('/employee', [EmployeeController::class, 'create'])->name('employee.create');
Route::get('/employee/list', [EmployeeController::class, 'index'])->name('employee.index');
Route::get('/employee/{id}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::put('/employee/{bank}', [EmployeeController::class, 'update'])->name('employee.update');
Route::delete('/employee/{bank}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
Route::post('employee/export', [EmployeeController::class, 'exportToExcel'])->name('employee.export');

Route::get('/expenses/create', [ExpenseController::class, 'create'])->name('expense.create'); // Show the form to create a new expense
Route::get('/expenses', [ExpenseController::class, 'index'])->name('expenses.index'); // Display all expenses
Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store'); // Store a new expense
Route::get('/expenses/{id}/edit', [ExpenseController::class, 'edit'])->name('expenses.edit');
Route::put('/expenses/{bank}', [ExpenseController::class, 'update'])->name('expenses.update');
Route::delete('/expenses/{bank}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');
//Route::get('/expense', [ExpenseController::class, 'create'])->name('expense.create');
Route::post('expenses/export', [ExpenseController::class, 'exportToExcel'])->name('expenses.export');

Route::get('/location/create', [LocationController::class, 'create'])->name('location.create');
Route::get('/location', [LocationController::class, 'index'])->name('location.index');
Route::post('/location', [LocationController::class, 'store'])->name('location.store');
Route::get('/location/{id}/edit', [LocationController::class, 'edit'])->name('location.edit');
Route::put('/location/{bank}', [LocationController::class, 'update'])->name('location.update');
Route::delete('/location/{bank}', [LocationController::class, 'destroy'])->name('location.destroy');
Route::post('location/export', [LocationController::class, 'exportToExcel'])->name('location.export');

Route::get('/request/create', [RequestController::class, 'create'])->name('request.create');
Route::get('/request', [RequestController::class, 'index'])->name('request.index');
Route::post('/request', [RequestController::class, 'store'])->name('request.store');

Route::get('/supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
Route::post('/supplier/store', [SupplierController::class, 'store'])->name('supplier.store');
Route::get('/suppliers', [SupplierController::class, 'index'])->name('supplier.index');
Route::get('/supplier/{id}/edit', [SupplierController::class, 'edit'])->name('supplier.edit');
Route::put('/supplier/{bank}', [SupplierController::class, 'update'])->name('supplier.update');
Route::delete('/supplier/{bank}', [SupplierController::class, 'destroy'])->name('supplier.destroy');
Route::post('supplier/export', [SupplierController::class, 'exportToExcel'])->name('supplier.export');

Route::get('/transfer-voucher/create', [TransferVoucherController::class, 'create'])->name('transfer.voucher.create');
Route::get('/transfer-voucher', [TransferVoucherController::class, 'index'])->name('transfer.voucher.index');
Route::post('/transfer-voucher', [TransferVoucherController::class, 'store'])->name('transfer.voucher.store');
Route::get('/transfer-voucher/{id}/edit', [TransferVoucherController::class, 'edit'])->name('transfer.voucher.edit');
Route::put('/transfer-voucher/{bank}', [TransferVoucherController::class, 'update'])->name('transfer.voucher.update');
Route::delete('/transfer-voucher/{bank}', [TransferVoucherController::class, 'destroy'])->name('transfer.voucher.destroy');
Route::post('transfer.voucher/export', [TransferVoucherController::class, 'exportToExcel'])->name('transfer.voucher.export');

Route::get('/product-category/create', [ProductCategoryController::class, 'create'])->name('product.category.create');
Route::get('/product-category', [ProductCategoryController::class, 'index'])->name('product.category.index');
Route::post('/product-category', [ProductCategoryController::class, 'store'])->name('product.category.store'); // Ensure this is correct
Route::get('/product.category/{id}/edit', [ProductCategoryController::class, 'edit'])->name('product.category.edit');
Route::put('/product.category/{bank}', [ProductCategoryController::class, 'update'])->name('product.category.update');
Route::delete('/product.category/{bank}', [ProductCategoryController::class, 'destroy'])->name('product.category.destroy');
Route::post('product-category/export', [ProductCategoryController::class, 'exportToExcel'])->name('product.category.export');

Route::get('/expense-category/create', [ExpenseCategoryController::class, 'create'])->name('expense.category.create');
Route::get('/expense-category', [ExpenseCategoryController::class, 'index'])->name('expense.category.index');
Route::post('/expense-category', [ExpenseCategoryController::class, 'store'])->name('expense.category.store');
Route::get('/expense/{id}/edit', [ExpenseCategoryController::class, 'edit'])->name('expense.edit');
Route::put('/expense/{bank}', [ExpenseCategoryController::class, 'update'])->name('expense.update');
Route::delete('/expense/{bank}', [ExpenseCategoryController::class, 'destroy'])->name('expense.destroy');
Route::post('/expense-category/export', [ExpenseCategoryController::class, 'exportToExcel'])->name('expense.category.export');

Route::get('/bank-category/list', [BankController::class, 'index'])->name('bank.category.index');
Route::get('/bank-category/create', [BankController::class, 'create'])->name('bank.category.create');
Route::post('/bank-category', [BankController::class, 'store'])->name('bank.category.store');
Route::get('/bank-category/{id}/edit', [BankController::class, 'edit'])->name('bank-category.edit');
Route::put('/bank-category/{bank}', [BankController::class, 'update'])->name('banks.update');
Route::delete('/bank-category/{bank}', [BankController::class, 'destroy'])->name('banks.destroy');
Route::post('bank-category/export', [BankController::class, 'exportToExcel'])->name('bank.category.export');

Route::get('/payment-method-category/list', [PaymentMethodController::class, 'index'])->name('payment-method.category.index');
Route::get('/payment-method-category/create', [PaymentMethodController::class, 'create'])->name('payment-method.category.create');
Route::post('/payment-method-category', [PaymentMethodController::class, 'store'])->name('payment-method.category.store');
Route::get('/payment-method-category/{id}/edit', [PaymentMethodController::class, 'edit'])->name('payment-method-category.edit');
Route::put('/payment-method-category/{bank}', [PaymentMethodController::class, 'update'])->name('payment-method.update');
Route::delete('/payment-method-category/{bank}', [PaymentMethodController::class, 'destroy'])->name('payment-method.destroy');
Route::post('payment-method-category/export', [PaymentMethodController::class, 'exportToExcel'])->name('payment-method.category.export');

Route::get('/specification/create', [SpecificationController::class, 'create'])->name('specification.category.create');
Route::get('/specification', [SpecificationController::class, 'index'])->name('specification.category.index');
Route::post('/specification', [SpecificationController::class, 'store'])->name('specification.category.store');
Route::get('/specification/{id}/edit', [SpecificationController::class, 'edit'])->name('specification.edit');
Route::put('/specification/{bank}', [SpecificationController::class, 'update'])->name('specification.update');
Route::delete('/specification/{bank}', [SpecificationController::class, 'destroy'])->name('specification.destroy');
Route::post('specification/export', [SpecificationController::class, 'exportToExcel'])->name('specification.export');


//Route::get('/wastages/create', [WastageController::class, 'create'])->name('wastages.create');
//Route::post('/wastage', [WastageController::class, 'store'])->name('wastages.store');
//Route::get('/wastage', [WastageController::class, 'index'])->name('wastages.index');
Route::get('/wastages', [WastageController::class, 'index'])->name('wastages.index');
Route::get('/wastages/create', [WastageController::class, 'create'])->name('wastage.create'); // Define the create route
Route::post('/wastages/store', [WastageController::class, 'store'])->name('wastages.store'); // Define the store route
Route::get('/wastages/{id}/edit', [WastageController::class, 'edit'])->name('wastages.edit');
Route::put('/wastages/{bank}', [WastageController::class, 'update'])->name('wastages.update');
Route::delete('/wastages/{bank}', [WastageController::class, 'destroy'])->name('wastages.destroy');
Route::post('wastages/export', [WastageController::class, 'exportToExcel'])->name('wastages.export');

Route::get('/sell-payment/create', [SellPaymentController::class, 'create'])->name('sell-payment.create');



