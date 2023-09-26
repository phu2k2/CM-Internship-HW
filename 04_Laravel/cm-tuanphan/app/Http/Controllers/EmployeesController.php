<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use View;
use App\Http\Requests\EmployeeRequest;

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

    public function store(EmployeeRequest $res)
    {
        dd($res->all());
    }

    public function edit(string $employeeID)
    {
        $employees = Employee::get();
        $editingEmployee = Employee::findOrFail($employeeID);
        return view("admin.manages.employees.edit" , compact("employees" , "editingEmployee", "employeeID"));
    }

    public function update(EmployeeRequest $res, string $id)
    {
        dd($res->all());
    }
}
