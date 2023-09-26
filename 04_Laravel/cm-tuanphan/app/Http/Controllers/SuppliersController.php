<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use View;
use App\Http\Requests\SupplierRequest;

class SuppliersController extends Controller
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

    public function store(SupplierRequest $res)
    {
        dd($res->all());
    }

    public function edit(string $supplierID)
    {
        $suppliers = Supplier::get();
        $editingSupplier = Supplier::findOrFail($supplierID);
        return view("admin.manages.suppliers.edit" , compact("suppliers" , "editingSupplier" , "supplierID"));
    }

    public function update(SupplierRequest $res, string $id)
    {
        dd($res->all());
    }
}
