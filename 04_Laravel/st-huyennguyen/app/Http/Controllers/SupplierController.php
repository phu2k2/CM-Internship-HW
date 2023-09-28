<?php

namespace App\Http\Controllers;

use App\Http\Requests\Suppliers\CreateSupplierRequest;
use App\Http\Requests\Suppliers\DeleteSupplierRequest;
use App\Http\Requests\Suppliers\UpdateSupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        define('PAGINATE_DEFAULT', 15);
        $suppliers = Supplier::paginate(PAGINATE_DEFAULT);
        return view('supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateSupplierRequest $request)
    {
        $supplier = new Supplier();
        if ($supplier->create($request->validated())) {
            session()->flash('message', 'Create new customer was successful!');
        } else {
            session()->flash('error', 'Create new customer failed!');
        }

        return redirect()->route('suppliers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('supplier.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, string $id)
    {
        $supplier = Supplier::findOrFail($id);
        if ($supplier->update($request->validated())) {
            session()->flash('message', 'Update the supplier was successful!');
        } else {
            session()->flash('error', 'Update the supplier failed!');
        }

        return redirect()->route('suppliers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteSupplierRequest $request, string $id)
    {
        $supplier = Supplier::findOrFail($id);
        if ($supplier->delete()) {
            session()->flash('message', 'Delete the supplier was successful!');
        } else {
            session()->flash('error', 'Delete the supplier failed!');
        }

        return redirect()->route('suppliers.index');
    }
}
