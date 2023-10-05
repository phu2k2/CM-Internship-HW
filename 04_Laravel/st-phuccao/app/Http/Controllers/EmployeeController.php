<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = 10; // Number of records displayed per page
        $employees = Employee::paginate($perPage); 
        return view('admin.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        try {
            Employee::create($request->validated());
            return redirect()
                    ->route('employees.create')
                    ->with('success', 'Successfully added employee!');
        } catch (Exception $e) {
            return redirect()
                    ->route('employees.create')
                    ->with('error', 'An error occurred while adding employee!');
        }
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
    public function edit(int $id)
    {
        return view('admin.employee.edit', ['employee' => Employee::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, int $id)
    {
        try {
            $employee = Employee::findOrFail($id);
            $employee->update($request->validated());
            return redirect()
                        ->route('employees.edit', $employee->id)
                        ->with('success', 'Updated employee information successfully!');
        } catch (ModelNotFoundException $e) {
            return redirect()
                        ->route('employees.edit', $id)
                        ->with('error', 'Updating employee information failed, Please try again!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            $employee = Employee::findOrFail($id);
            $employee->delete();
            return redirect()
                        ->route('employees.index')
                        ->with('success', 'Employee has been deleted successfully!');
        } catch (ModelNotFoundException $e) {
            return redirect()
                        ->route('employees.index')
                        ->with('error', 'Failed to delete customer. An error occurred. Please try again!');
        }
    }
}
