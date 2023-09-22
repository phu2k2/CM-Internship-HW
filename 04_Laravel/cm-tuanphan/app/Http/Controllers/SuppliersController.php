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
}
