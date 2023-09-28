<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use View;
use App\Http\Requests\Suppliers\CreateSupplierRequest;
use App\Http\Requests\Suppliers\EditSupplierRequest;
use DB;

class SupplierController extends Controller
{
    public function __construct()
    {
        View::share('pageTitle', 'Quản lý nhà cung cấp');
    }

    public function index()
    {
        $suppliers = Supplier::get();
        return view("admin.manages.suppliers.index" , compact("suppliers"));
    }

    private function generateNextCompanyId()
    {
        $maxCompanyId = Supplier::max('company_id');
        $nextCompanyId = str_pad((int)$maxCompanyId + 1, 3, '0', STR_PAD_LEFT);
        return $nextCompanyId;
    }

    public function store(CreateSupplierRequest $req)
    {
        // dd(array_merge($req->except("_token") , ["company_id" => $this->generateNextCompanyId()]));
        $supplier = Supplier::create(array_merge($req->except("_token") , ["company_id" => $this->generateNextCompanyId()]));
        if ($supplier) {
            return redirect()->back()->with('success', 'Supplier created successfully');
        } else {
            return redirect()->back()->withError('Supplier creation failed');
        }
    }

    public function edit(string $supplierID)
    {
        $suppliers = Supplier::get();
        $editingSupplier = Supplier::findOrFail($supplierID);
        return view("admin.manages.suppliers.edit" , compact("suppliers" , "editingSupplier"));
    }

    public function update(EditSupplierRequest $req, string $id)
    {
        dd($req->all());
    }

    public function destroy(string $id)
    {
        return redirect()->back()->with('success', 'Delete Supplier With ID ' . $id . ' Successfully');
    }
}
