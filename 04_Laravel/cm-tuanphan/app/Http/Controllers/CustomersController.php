<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use View;
use App\Http\Requests\CustomersRequest;

class CustomersController extends Controller
{
    public function __construct()
    {
        View::share('pageTitle', 'Quản lý khách hàng');
    }

    public function index()
    {
        $customers = Customer::get();
        return view("admin.manages.customers.index" , compact("customers"));
    }

    public function store(Request $res)
    {
        dd($res->all());
    }
}
