<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest\CreateEmployeeRequest;
use App\Http\Requests\EmployeeRequest\UpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::get();

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateEmployeeRequest $request)
    {
        $validatedData = $request->validated();
        $employee = new Employee();
        $employee->create($validatedData);
        
        $request->session()->flash('success', 'Add Employee successful!');
        
        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::find($id);
      
        if (!$employee) {
            abort(404);
        }

        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, string $id)
    {
        $employee = Employee::find($id);
      
        if (!$employee) {
            abort(404);
        }

        $validatedData = $request->validated();
        $employee->update($validatedData);

        $request->session()->flash('success', 'Update Employee successful!');
        
        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $employee = Employee::find($id);
      
        if (!$employee) {
            abort(404);
        }

        $employee->delete();
        $request->session()->flash('success', 'Delete Employee successful!');

        return redirect()->route('employees.index');
    }
}
