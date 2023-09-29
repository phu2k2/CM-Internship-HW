<?php

namespace App\Http\Controllers;

use App\Http\Requests\Supplier\CreateRequestSupplier;
use App\Http\Requests\Supplier\DeleteRequestSupplier;
use App\Http\Requests\Supplier\UpdateRequestSupplier;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $suppliers = Supplier::all();

        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequestSupplier $request)
    {
        $supplier = Supplier::create($request->validated());
        if ($supplier) {
            session()->flash('message', 'Successfully created!');
        } else {
            session()->flash('error', 'New creation failed!');
        }

        return redirect()->route('suppliers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $supplier = Supplier::find($id);

        return view('suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $supplier = Supplier::find($id);

        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequestSupplier $request, string $id)
    {
        $supplier = Supplier::find($id);
        if (!$supplier) {
            session()->flash('error', 'Data not found!');
            return redirect()->route('suppliers.index');
        }

        $supplier->update($request->validated());

        if ($supplier->wasChanged()) {
            session()->flash('message', 'Successfully updated!');
        } else {
            session()->flash('error', 'No changes made.');
        }

        return redirect()->route('suppliers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteRequestSupplier $request, string $id)
    {
        $supplier = Supplier::find($id);
        if (!$supplier) {
            session()->flash('error', 'Data not found!');
            return redirect()->route('suppliers.index');
        }
        if ($supplier->delete($id)) {
            session()->flash('message', 'Successfully deleted!');
        } else {
            session()->flash('error', 'Deleted failed!');
        }

        return redirect()->route('suppliers.index');
    }
}
