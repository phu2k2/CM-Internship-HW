<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SupplierController;
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
    return view('admin.pages.dashboard');
});

Route::get('dashboard', function () {
    return view("admin.pages.dashboard");
});

//customer
Route::get("customer", [CustomerController::class, "index"]);

Route::get("/customer/insert", [CustomerController::class, "create"]);

Route::post("customer/store", [CustomerController::class, 'store']);

Route::put("/customer/update/{id}", [CustomerController::class, "update"]);

Route::get("customer/update/{id}", [CustomerController::class, "edit"]);

//category
Route::get("category", [CategoryController::class, "index"]);

Route::get("category/insert", [CategoryController::class, "create"]);

Route::post("category/store", [CategoryController::class, 'store']);

Route::put("/category/update/{id}", [CategoryController::class, "update"]);

Route::get("/category/update/{id}", [CategoryController::class, "edit"]);

//employee
Route::get("employee", [EmployeeController::class, "index"]);

Route::get("employee/insert", [EmployeeController::class, "create"]);

Route::post("employee/store", [EmployeeController::class, 'store']);

Route::put("/employee/update/{id}", [EmployeeController::class, "update"]);

Route::get("employee/update/{id}", [EmployeeController::class, "edit"]);

//supplier
Route::get("supplier", [SupplierController::class, "index"]);

Route::get("supplier/insert", [SupplierController::class, "create"]);

Route::post("supplier/store", [SupplierController::class, 'store']);

Route::put("/supplier/update/{id}", [SupplierController::class, "update"]);

Route::get("supplier/update/{id}", [SupplierController::class, "edit"]);
