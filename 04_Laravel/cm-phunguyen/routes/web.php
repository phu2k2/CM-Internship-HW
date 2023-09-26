<?php

use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;


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
    return view("layouts.auth");
})->name('mainPage');
Route::prefix('admin')->group(function () {
    Route::resource('customers', CustomersController::class);
    Route::resource('suppliers', SuppliersController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('user', UserController::class);
});
