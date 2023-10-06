<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest\CreateCustomerRequest;
use App\Http\Requests\CustomerRequest\UpdateCustomerRequest;
use App\Models\Customer;

class CustomerController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::get();
        return view('admin/customer/index', compact('customer'));
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
        Customer::create([
            'company_name' => $request->company_name,
            'transaction_name' => $request->transaction_name,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'fax' => $request->fax
        ]);
        return redirect(route('customers.index'));
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
        $customer = Customer::find($id);
        if (!$customer) {
            abort(404);
        }
        return view('admin/customer/edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, string $id)
    {
        $customer = Customer::where('id', $id)->update([
            'company_name' => $request->company_name,
            'transaction_name' => $request->transaction_name,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'fax' => $request->fax
        ]);
        if (!$customer) {
            abort(404);
        }
        return redirect(route('customers.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::find($id)->delete();
        if (!$customer) {
            abort(404);
        }
        session()->flash('status', 'Delete success!');
        return redirect()->route('customers.index');
    }
}
