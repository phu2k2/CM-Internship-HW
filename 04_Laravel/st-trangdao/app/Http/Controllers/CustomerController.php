<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customer\CreateRequestCustomer;
use App\Http\Requests\Customer\DeleteRequestCustomer;
use App\Http\Requests\Customer\UpdateRequestCustomer;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $customers =  Customer::all();

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
    public function store(CreateRequestCustomer $request)
    {

        $customer = Customer::create($request->validated());
        if ($customer) {
            session()->flash('message', 'Successfully created!');
        } else {
            session()->flash('error', 'New creation failed!');
        }

        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::find($id);

        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::find($id);

        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequestCustomer $request, string $id)
    {
        $customer = Customer::find($id);
        if (!$customer) {
            session()->flash('error', 'Data not found!');
            return redirect()->route('customers.index');
        }

        $customer->update($request->validated());

        if ($customer->wasChanged()) {
            session()->flash('message', 'Successfully updated!');
        } else {
            session()->flash('error', 'No changes made.');
        }

        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteRequestCustomer $request, string $id)
    {
        $customer = Customer::find($id);
        if (!$customer) {
            session()->flash('error', 'Data not found!');
            return redirect()->route('customers.index');
        }
        if ($customer->delete($id)) {
            session()->flash('message', 'Successfully deleted!');
        } else {
            session()->flash('error', 'Deleted failed!');
        }

        return redirect()->route('customers.index');
    }
}
