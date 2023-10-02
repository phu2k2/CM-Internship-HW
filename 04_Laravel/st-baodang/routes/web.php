<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CustomerController;
use \App\Http\Controllers\SupplierController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\EmployeeController;

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
Route::get('/', function () {
    return view('index');
})->name('index');
Route::resource('customers', CustomerController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('categories', CategoryController::class);
Route::resource('employees', EmployeeController::class);
