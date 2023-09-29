<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Models\Employee;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;


class EmployeeController extends Controller
{
    private function generateUniqueEmployeeId()
    {
        do {
            $employeeId = Str::upper(Str::random(4));
            $existingEmployee = Employee::where('employee_id', $employeeId)->first();
        } while ($existingEmployee);

        return $employeeId;
    }
    
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
            $employee = new Employee([
                'employee_id' => $this->generateUniqueEmployeeId(),
                'last_name' => $request->input('last_name'),
                'first_name' => $request->input('first_name'),
                'birthday' => $request->input('birthday'),
                'start_date' => $request->input('start_date'),
                'address' => $request->input('address'),
                'phone' => $request->input('phone'),
                'base_salary' => $request->input('base_salary'),
                'allowance' => $request->input('allowance'),
            ]);
    
            $employee->saveOrFail();
    
            return redirect()->route('employees.create')->with('success', 'Successfully added employee!');
        } catch (Exception $e) {
            return redirect()->route('employees.create')->with('error', 'An error occurred while adding employee!');
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
    public function edit(string $id)
    {
        try {
            $employee = Employee::where('employee_id', $id)->firstOrFail();
    
            return view('admin.employee.edit', compact('employee'));
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, string $id)
    {
        try {
            $employee = Employee::where('employee_id', $id)->firstOrFail();
    
            $employee->update($request->only([
                'last_name', 'first_name', 'birthday', 'start_date',
                'address', 'phone', 'base_salary', 'allowance'
            ]));
    
            return redirect()->route('employees.edit', $employee->employee_id)->with('success', 'Updated employee information successfully!');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('employees.edit', $id)->with('error', 'Updating employee information failed, Please try again!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $employee = Employee::where('employee_id', $id)->firstOrFail();
    
            $employee->delete();
    
            return redirect()->route('employees.index')->with('success', 'Employee has been deleted successfully!');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('employees.index')->with('error', 'Failed to delete customer. An error occurred. Please try again!');
        }
    }
}
