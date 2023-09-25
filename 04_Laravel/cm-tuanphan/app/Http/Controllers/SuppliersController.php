<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use View;

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

    public function store(Request $res)
    {
        dd($res->all());
    }

    public function edit(string $supplierID)
    {
        $suppliers = Supplier::get();
        $editingSupplier = Supplier::findOrFail($supplierID);
        return view("admin.manages.suppliers.edit" , compact("suppliers" , "editingSupplier" ,  "supplierID"));
    }

    public function update(Request $res, string $id)
    {
        dd($res->all());
    }
}
