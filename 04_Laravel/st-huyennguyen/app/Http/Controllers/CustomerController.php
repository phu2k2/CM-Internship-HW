<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest\CreateCustomerRequest;
use App\Http\Requests\CustomerRequest\DeleteCustomerRequest;
use App\Http\Requests\CustomerRequest\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::paginate(15);
        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCustomerRequest $request)
    {
        $customer = new Customer();
        if ($customer->create($request->validated())) {
            session()->flash('message', 'Create new customer was succesful!');
        } else {
            session()->flash('error', 'Create new customer failed!');
        }

        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::find($id);
        return view('customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::find($id);
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, string $id)
    {
        $customer = Customer::find($id);
        if ($customer->update($request->validated())) {
            session()->flash('message', 'Update the customer was succesful!');
        } else {
            session()->flash('error', 'Update the customer failed!');
        }

        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteCustomerRequest $request, string $id)
    {
        $customer = Customer::find($id);
        if ($customer->delete()) {
            session()->flash('message', 'Delete the customer was succesful!');
        } else {
            session()->flash('error', 'Delete the customer failed!');
        }

        return redirect()->route('customers.index');
    }
}
