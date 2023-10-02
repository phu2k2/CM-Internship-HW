<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;

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

Route::get('/' , function() {
    return "Thís is homepage";
})->name("index");

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect()->route("employees.index");
    });

    Route::resource('employees', EmployeeController::class)->name('*', 'employees');
    Route::resource('categories' , CategoryController::class)->name('*', 'categories');
    Route::resource('suppliers' , SupplierController::class)->name('*', 'suppliers');
    Route::resource('customers' , CustomerController::class)->name('*', 'customers');
    Route::get('sql/{question}' , [HomeController::class, "index"]);
});

// use App\Models\Supplier;
// use App\Http\Resources\UserCollection;
// Route::get('/users', function () {
//     return new UserCollection(Supplier::all());
// });
// use App\Models\Product;
// use App\Models\Customer;
// use App\Models\Order;
// use App\Models\Employee;
// Route::get('/test' , function() {
//     dd(Employee::find("0002")->orders);
//     dd(Order::find(1))->customer;
//     dd(Customer::find(2)->orders);
//     dd(Product::find(3)->supplier->company_name);
//     dd(Supplier::find(2)->products);
// });
