<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest\CreateEmployeeRequest;
use App\Http\Requests\EmployeeRequest\UpdateEmployeeRequest;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employee = Employee::get();
        return view('admin/employee/index', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/employee/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateEmployeeRequest $request)
    {
        Employee::create([
            'employee_id' => $request->employee_id,
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'birthday' => $request->birthday,
            'start_date' => $request->start_date,
            'address' => $request->address,
            'phone' => $request->phone,
            'base_salary' => $request->base_salary,
            'allowance' => $request->allowance,
        ]);
        return redirect(route('employees.index'));
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
        return view('admin/employee/edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, string $id)
    {
        $employee = Employee::where('id', $id)->update([
            'company_id' => $request->company_id,
            'company_name' => $request->company_name,
            'transaction_name' => $request->transaction_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'fax' => $request->fax,
            'email' => $request->email,
        ]);
        if (!$employee) {
            abort(404);
        }
        return redirect(route('employees.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::find($id)->delete();
        if (!$employee) {
            abort(404);
        }
        session()->flash('status', 'Delete success!');
        return redirect()->route('employees.index');
    }
}
