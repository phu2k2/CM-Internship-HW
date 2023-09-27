<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest\DeleteEmployeeRequest;
use App\Http\Requests\EmployeeRequest\StoreEmployeeRequest;
use App\Http\Requests\EmployeeRequest\UpdateEmployeeRequest;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = DB::table('employees')->get();

        return view('sections.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sections.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $isStored = DB::table('employees')->insert([
            'employee_id' => $request->input('employee_id'),
            'last_name' => $request->input('last_name'),
            'first_name' => $request->input('first_name'),
            'birthday' => $request->input('birthday'),
            'start_date' => $request->input('start_date'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'base_salary' => $request->input('base_salary'),
            'allowance' => $request->input('allowance')
        ]);
        if ($isStored) {
            session()->flash('status', 'Đã thêm dữ liệu thành công');
        }

        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = DB::table('employees')->where('id', $id)->first();

        return view('sections.employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = DB::table('employees')->where('id', $id)->first();

        return view('sections.employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, string $id)
    {
        DB::table('employees')
            ->where('id', $id)
            ->update([
                'employee_id' => $request->input('employee_id'),
                'last_name' => $request->input('last_name'),
                'first_name' => $request->input('first_name'),
                'birthday' => $request->input('birthday'),
                'start_date' => $request->input('start_date'),
                'address' => $request->input('address'),
                'phone' => $request->input('phone'),
                'base_salary' => $request->input('base_salary'),
                'allowance' => $request->input('allowance')
            ]);

        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteEmployeeRequest $request, string $id)
    {
        $records = DB::table('employees')->delete($id);
        if ($records) {
            session()->flash('status', 'Đã xóa dữ liệu thành công');
        }

        return redirect()->route('employees.index');
    }
}
