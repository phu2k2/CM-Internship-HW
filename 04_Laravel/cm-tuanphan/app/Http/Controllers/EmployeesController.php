<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use View;

class EmployeesController extends Controller
{
    public function __construct()
    {
        View::share('pageTitle', 'Quản lý nhân viên');
    }

    public function index()
    {
        $employees = Employee::get();
        return view("admin.manages.employees.index" , compact("employees"));
    }

    public function store(Request $res)
    {
        dd($res->all());
    }
}
