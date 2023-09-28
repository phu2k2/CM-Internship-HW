<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use View;
use App\Http\Requests\Suppliers\CreateSupplierRequest;
use App\Http\Requests\Suppliers\EditSupplierRequest;

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

    public function store(CreateSupplierRequest $req)
    {
        dd($req->all());
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
