<?php

namespace App\Http\Controllers;

use App\Http\Requests\Supplier\StoreSupplierRequest;
use App\Http\Requests\Supplier\UpdateSupplierRequest;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Exception;

class SupplierController extends Controller
{
    private function generateUniqueCompanyId()
    {
        $lengthOfId = 3;
        do {
            $supplierId = Str::upper(Str::random($lengthOfId));
            $existingSupplier = Supplier::where('company_id', $supplierId)->first();
        } while ($existingSupplier);

        return $supplierId;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Number of records displayed per page
        $perPage = 10;
        $suppliers = Supplier::paginate($perPage);
        return view('admin.supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupplierRequest $request)
    {
        Supplier::create([
            'company_id' => $this->generateUniqueCompanyId(),
            'company_name' => $request->input('company_name'),
            'transaction_name' => $request->input('transaction_name'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'fax' => $request->input('fax'),
            'email' => $request->input('email'),
        ]);
        return redirect()->route('suppliers.index');
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
        return view('admin.supplier.edit', ['supplier' => Supplier::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, int $id)
    {
        $supplier = Supplier::findOrFail($id);
        $data = $request->only([
            'company_name', 'transaction_name', 'address', 'phone', 'fax', 'email'
        ]);
        $supplier->update($data);
        return redirect()->route('suppliers.edit', ['supplier' => $supplier->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->route('suppliers.index');
    }
}
