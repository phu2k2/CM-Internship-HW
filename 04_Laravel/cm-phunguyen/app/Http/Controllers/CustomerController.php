<?php

namespace App\Http\Controllers;

use App\Http\Requests\customers\CreateCustomerRequest;
use App\Http\Requests\customers\UpdateCustomerRequest;
use App\Models\Customer;

class CustomerController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::get();

        return view('admin/customer/index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/customer/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCustomerRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id);

        return view('admin/customer/edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id)->delete();
        session()->flash('status', 'Delete success!');

        return redirect()->route('customers.index');
    }
}
