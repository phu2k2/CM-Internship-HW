<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\SuppliesController;
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
    return view('home');
})->name('home');

Route::resource('customers', CustomersController::class)->except(
    ['show']
);

Route::resource('categories', CategoriesController::class)->except(
    ['show']
);

Route::resource('supplies', SuppliesController::class)->except(
    ['show']
);

Route::resource('employees', EmployeesController::class)->except(
    ['show']
);
