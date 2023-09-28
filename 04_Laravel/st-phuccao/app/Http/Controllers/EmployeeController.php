<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
        // Create a new Employee instance
        $employee = new Employee();        

        $employee->employee_id = $this->generateUniqueEmployeeId();
        $employee->last_name = $request->input('last_name');
        $employee->first_name = $request->input('first_name');
        $employee->birthday = $request->input('birthday');
        $employee->start_date = $request->input('start_date');
        $employee->address = $request->input('address');
        $employee->phone = $request->input('phone');
        $employee->base_salary = $request->input('base_salary');
        $employee->allowance = $request->input('allowance');

        $employee->save();

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
        $employee = Employee::where('employee_id', $id)->first();

        if(!$employee){
            abort(404);
        }

        return view('admin.employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, string $id)
    {
        try {
            $employee = Employee::where('employee_id', $id)->firstOrFail();
            $employee->last_name = $request->input('last_name');
            $employee->first_name = $request->input('first_name');
            $employee->birthday = $request->input('birthday');
            $employee->start_date = $request->input('start_date');
            $employee->address = $request->input('address');
            $employee->phone = $request->input('phone');
            $employee->base_salary = $request->input('base_salary');
            $employee->allowance = $request->input('allowance');
            $employee->save();

            return redirect()->route('employees.edit', $employee->employee_id);
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::where('employee_id', $id)->first();

        if(!$employee){
            abort(404);
        }

        $employee->delete();

        return redirect()->route('employees.index');
    }
}
