<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employees\CreateEmployeeRequest;
use App\Http\Requests\Employees\DeleteEmployeeRequest;
use App\Http\Requests\Employees\UpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::paginate(15);
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateEmployeeRequest $request)
    {
        $employee = new Employee();
        if ($employee->create($request->validated())) {
            session()->flash('message', 'Create new customer was succesful!');
        } else {
            session()->flash('error', 'Create new customer failed!');
        }

        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::find($id);
        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::find($id);
        return view('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, string $id)
    {
        $employee = Employee::find($id);
        if ($employee->update($request->validated())) {
            session()->flash('message', 'Update the employee was succesful!');
        } else {
            session()->flash('error', 'Update the employee failed!');
        }

        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteEmployeeRequest $request, string $id)
    {
        $employee = Employee::find($id);
        if ($employee->delete()) {
            session()->flash('message', 'Delete the employee was succesful!');
        } else {
            session()->flash('error', 'Delete the employee failed!');
        }

        return redirect()->route('employees.index');
    }
}
