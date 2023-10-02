<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customer\StoreCustomerRequest;
use App\Http\Requests\Customer\UpdateCustomerRequest;
use App\Models\Customer;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Number of records displayed per page
        $perPage = 10;
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
        try {
            Customer::create($request->validated());

            return redirect()->route('customers.index');
        } catch (Exception $e) {
            abort(404);
        }
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
        return view('admin.customer.edit', ['customer' => Customer::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, int $id)
    {
        try {
            $customer = Customer::findOrFail($id);
    
            $customer->update($request->validated());
    
            return redirect()->route('customers.edit', $customer->id);
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            $customer = Customer::findOrFail($id);
            $customer->delete();
    
            return redirect()->route('customers.index');
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }
}
