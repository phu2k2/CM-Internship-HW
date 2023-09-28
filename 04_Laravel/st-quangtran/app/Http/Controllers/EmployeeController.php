<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate(5);

        return view("admin.employee.index", compact('employees'));
    }

    public function create()
    {
        return view('admin.employee.create');
    }

    public function store(StoreEmployeeRequest $request)
    {
        $employee = new Employee();
        if ($employee->create($request->validated())) {
            session()->flash('message', 'Create new employee was successful!');
        } else {
            session()->flash('error', 'Create new customer failed!');
        }

        return redirect()->route('employees.index');
    }

    public function show(string $id)
    {
    }

    public function edit(int $id)
    {
        $employee = Employee::findOrFail($id);

        return view('admin.employee.edit', compact('employee'));
    }

    public function update(UpdateEmployeeRequest $request, int $id)
    {
        $employee = Employee::findOrFail($id);
        if ($employee->update($request->validated())) {
            session()->flash('message', 'Update the employee was successful!');
        } else {
            session()->flash('error', 'Update the employee failed!');
        }

        return redirect()->route('employees.index');
    }

    public function destroy(int $id)
    {
        $employee = Employee::findOrFail($id);
        if ($employee->delete()) {
            session()->flash('message', 'Delete the employee was successful!');
        } else {
            session()->flash('error', 'Delete the employee failed!');
        }

        return redirect()->route('employees.index');
    }
}
