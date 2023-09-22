<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomersController as customers;
use App\Http\Controllers\SuppliersController as suppliers;
use App\Http\Controllers\CategoriesController as categories;
use App\Http\Controllers\EmployeesController as employees;

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

    Route::resource('employees', employees::class)->name('*', 'employees');
    Route::resource('categories' , categories::class)->name('*', 'categories');
    Route::resource('suppliers' , suppliers::class)->name('*', 'suppliers');
    Route::resource('customers' , customers::class)->name('*', 'customers');
});
