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

    private function generateNextEmployeeId()
    {
        $maxCompanyId = Employee::max('employee_id');
        if ($maxCompanyId === null) {
            $nextCompanyId = '0001';
        } else {
            $nextCompanyId = str_pad((int)$maxCompanyId + 1, 4, '0', STR_PAD_LEFT);
        }
        while (Employee::where('employee_id', $nextCompanyId)->exists()) {
            $nextCompanyId = str_pad((int)$nextCompanyId + 1, 4, '0', STR_PAD_LEFT);
        }
    
        return $nextCompanyId;
    }

    public function store(CreateEmployeeRequest $req)
    {
        $employee = Employee::create(array_merge($req->except("_token") , ['employee_id' => $this->generateNextEmployeeId()]));
        if ($employee) {
            return redirect()->back()->with('success', 'Employee created successfully');
        } else {
            return redirect()->back()->withError('Employee creation failed');
        }
    }

    public function edit(string $employeeID)
    {
        $employees = Employee::get();
        $editingEmployee = Employee::findOrFail($employeeID);
        return view("admin.manages.employees.edit" , compact("employees" , "editingEmployee"));
    }

    public function update(EditEmployeeRequest $req, string $id)
    {
        if(Employee::find($id)->update($req->except("_token" , "_method"))) {
            return redirect()->back()->with('success', 'Edit employee successfully');
        } else {
            return redirect()->back()->withError('Editing employee failed');
        }
    }

    public function destroy(string $id)
    {
        Employee::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Delete Employee With ID ' . $id . ' Successfully');
    }
}
