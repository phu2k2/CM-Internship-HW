<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest\CreateSupplierRequest;
use App\Http\Requests\SupplierRequest\UpdateSupplierRequest;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplier = Supplier::get();
        return view('admin/supplier/index', compact('supplier'));
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
        $supplier = Supplier::find($id);
        if (!$supplier) {
            abort(404);
        }
        return view('admin/supplier/edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, string $id)
    {
        $supplier = Supplier::where('id', $id)->update([
            'company_id' => $request->company_id,
            'company_name' => $request->company_name,
            'transaction_name' => $request->transaction_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'fax' => $request->fax,
            'email' => $request->email,
        ]);
        if (!$supplier) {
            abort(404);
        }
        return redirect(route('suppliers.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = Supplier::find($id)->delete();
        if (!$supplier) {
            abort(404);
        }
        session()->flash('status', 'Delete success!');
        return redirect()->route('suppliers.index');
    }
}
