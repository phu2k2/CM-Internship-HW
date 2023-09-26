<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view("admin.index");
    });

    Route::resource('employees', EmployeeController::class)->name('*', 'employees');
    Route::resource('categories' , CategoryController::class)->name('*', 'categories');
    Route::resource('suppliers' , SupplierController::class)->name('*', 'suppliers');
    Route::resource('customers' , CustomerController::class)->name('*', 'customers');
});
