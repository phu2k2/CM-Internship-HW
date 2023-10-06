<?php

namespace App\Http\Controllers;

use App\Http\Requests\Suppliers\CreateSupplierRequest;
use App\Http\Requests\Suppliers\UpdateSupllierRequest;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::get();

        return view('admin/supplier/index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/supplier/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateSupplierRequest $request)
    {
        Supplier::create([
            'company_id' => $request->company_id,
            'company_name' => $request->company_name,
            'transaction_name' => $request->transaction_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'fax' => $request->fax,
            'email' => $request->email,
        ]);

        return redirect(route('suppliers.index'));
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
        $supplier = Supplier::findOrFail($id);

        return view('admin/supplier/edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupllierRequest $request, string $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->update([
            'company_id' => $request->company_id,
            'company_name' => $request->company_name,
            'transaction_name' => $request->transaction_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'fax' => $request->fax,
            'email' => $request->email,
        ]);

        return redirect(route('suppliers.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = Supplier::findOrFail($id)->delete();
        session()->flash('status', 'Delete success!');

        return redirect()->route('suppliers.index');
    }
}
