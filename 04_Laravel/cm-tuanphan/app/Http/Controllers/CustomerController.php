<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use View;
use App\Http\Requests\Customers\CreateCustomerRequest;
use App\Http\Requests\Customers\EditCustomerRequest;

class CustomerController extends Controller
{
    public function __construct()
    {
        View::share('pageTitle', 'Quản lý khách hàng');
    }

    public function index()
    {
        $customers = Customer::get();
        return view("admin.manages.customers.index" , compact("customers"));
    }

    public function store(CreateCustomerRequest $res)
    {
        dd($res->all());
    }

    public function edit(string $customerID)
    {
        $customers = Customer::get();
        $editingCustomer = Customer::findOrFail($customerID);
        return view("admin.manages.customers.edit" , compact("customers" , "editingCustomer", "customerID"));
    }

    public function update(EditCustomerRequest $res, string $id)
    {
        dd($res->all());
    }

    public function destroy(string $id)
    {
        return redirect()->back()->with('success', 'Delete Customer With ID ' . $id . ' Successfully');
    }
}
