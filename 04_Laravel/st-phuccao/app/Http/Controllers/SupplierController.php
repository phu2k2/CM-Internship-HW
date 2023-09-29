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
        try {
            $supplier = new Supplier();
    
            $supplier->company_id = $this->generateUniqueCompanyId();
            $supplier->company_name = $request->input('company_name');
            $supplier->transaction_name = $request->input('transaction_name');
            $supplier->address = $request->input('address');
            $supplier->phone = $request->input('phone');
            $supplier->fax = $request->input('fax');
            $supplier->email = $request->input('email');
    
            $supplier->saveOrFail();
    
            return redirect()->route('suppliers.index');
        } catch (Exception $e) {
            abort(404);
        }
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
        try {
            $supplier = Supplier::where('company_id', $id)->firstOrFail();
    
            return view('admin.supplier.edit', compact('supplier'));
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, string $id)
    {
        try {
            $supplier = Supplier::where('company_id', $id)->firstOrFail();
    
            $data = $request->only([
                'company_name', 'transaction_name', 'address', 'phone', 'fax', 'email'
            ]);
    
            $supplier->update($data);
    
            return redirect()->route('suppliers.edit', ['supplier' => $supplier->company_id]);
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $supplier = Supplier::where('company_id', $id)->firstOrFail();
    
            $supplier->delete();
    
            return redirect()->route('suppliers.index');
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }
}
