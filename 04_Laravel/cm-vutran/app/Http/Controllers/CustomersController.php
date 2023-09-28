<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest\CreateCustomerRequest;
use App\Http\Requests\CustomerRequest\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::get();
        
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCustomerRequest $request)
    {
        $validatedData = $request->validated();
        $customer = new Customer();
        $customer->create($validatedData);

        $request->session()->flash('success', 'Add Customer successful!');

        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $Id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            abort(404);
        }

        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, string $id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            abort(404);
        }
    
        $validatedData = $request->validated();
        $customer->update($validatedData);
        $request->session()->flash('success', 'Update Customer successful!');

        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            abort(404);
        }

        $customer->delete();
        $request->session()->flash('success', 'Delete Customer successful!');
        
        return redirect()->route('customers.index');
    }
}
