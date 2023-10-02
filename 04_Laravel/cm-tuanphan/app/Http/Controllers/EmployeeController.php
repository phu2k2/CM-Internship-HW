<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use View;
use App\Http\Requests\Employees\CreateEmployeeRequest;
use App\Http\Requests\Employees\EditEmployeeRequest;

class EmployeeController extends Controller
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

    public function store(CreateEmployeeRequest $req)
    {
        dd($req->all());
    }

    public function edit(string $employeeID)
    {
        $employees = Employee::get();
        $editingEmployee = Employee::findOrFail($employeeID);
        return view("admin.manages.employees.edit" , compact("employees" , "editingEmployee"));
    }

    public function update(EditEmployeeRequest $req, string $id)
    {
        dd($req->all());
    }

    public function destroy(string $id)
    {
        return redirect()->back()->with('success', 'Delete Employee With ID ' . $id . ' Successfully');
    }
}
