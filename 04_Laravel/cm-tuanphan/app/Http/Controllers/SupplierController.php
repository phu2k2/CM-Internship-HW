<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use View;

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

    public function store(Request $res)
    {
        dd($res->all());
    }

    public function edit(string $supplierID)
    {
        $suppliers = Supplier::get();
        return view("admin.manages.suppliers.edit" , compact("suppliers" , "supplierID"));
    }

    public function update(Request $res, string $id)
    {
        dd($res->all());
    }
}
