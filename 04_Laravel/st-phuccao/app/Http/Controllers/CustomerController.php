<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customer\StoreCustomerRequest;
use App\Http\Requests\Customer\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = 10; // Number of records displayed per page

        $customers = Customer::paginate($perPage);
    
        return view('admin.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        $customer = Customer::create($request->validated());

        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            abort(404);
        }

        return view('admin.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, int $id)
    {
        // Find customers by ID
        $customer = Customer::find($id);

        if (!$customer) {
            abort(404);
        }

        // Get data from request to update customer information
        $customer->company_name = $request->input('company_name');
        $customer->transaction_name = $request->input('transaction_name');
        $customer->address = $request->input('address');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phone');
        $customer->fax = $request->input('fax');

        // Save changes to database
        $customer->save();

        // Redirects to a page showing updated information
        return redirect()->route('customers.edit', $customer->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            abort(404);
        }

        $customer->delete();

        return redirect()->route('customers.index');
    }
}
