<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest\DeleteSupplierRequest;
use App\Http\Requests\SupplierRequest\StoreSupplierRequest;
use App\Http\Requests\SupplierRequest\UpdateSupplierRequest;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = DB::table('suppliers')->get();

        return view('sections.supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sections.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupplierRequest $request)
    {
        $isStored = DB::table('suppliers')->insert([
            'company_id' => $request->input('company_id'),
            'company_name' => $request->input('company_name'),
            'transaction_name' => $request->input('transaction_name'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'fax' => $request->input('fax')
        ]);

        if ($isStored) {
            session()->flash('status', 'Đã thêm dữ liệu thành công');
        }

        return redirect()->route('suppliers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $supplier = DB::table('suppliers')
            ->where('id', $id)
            ->first();

        return view('sections.supplier.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $supplier = DB::table('suppliers')
            ->where('id', $id)
            ->first();

        return view('sections.supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, string $id)
    {
        DB::table('suppliers')
            ->where('id', $id)
            ->update([
                'company_id' => $request->input('company_id'),
                'company_name' => $request->input('company_name'),
                'transaction_name' => $request->input('transaction_name'),
                'address' => $request->input('address'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'fax' => $request->input('fax')
            ]);

        return redirect()->route('suppliers.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteSupplierRequest $request, string $id)
    {
        $records = DB::table('suppliers')->delete($id);
        if ($records) {
            session()->flash('status', 'Đã xóa dữ liệu thành công');
        }

        return redirect()->route('suppliers.index');
    }
}