<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    private $employeeData = [
        [
            'employee_id' => 'EMP1',
            'last_name' => 'Smith',
            'first_name' => 'John',
            'birthday' => '1985-05-15 00:00:00',
            'start_date' => '2022-01-10 00:00:00',
            'address' => '123 Main Street',
            'phone' => '+1 (555) 123-4567',
            'base_salary' => 50000.00,
            'allowance' => 2000.00,
            'created_at' => "2023-09-25 00:00:00",
            'updated_at' => "2023-09-25 00:00:00"
        ],
        [
            'employee_id' => 'EMP2',
            'last_name' => 'Johnson',
            'first_name' => 'Emily',
            'birthday' => '1990-08-22 00:00:00',
            'start_date' => '2021-03-05 00:00:00',
            'address' => '456 Elm Street',
            'phone' => '+1 (555) 987-6543',
            'base_salary' => 55000.00,
            'allowance' => 2500.00,
            'created_at' => "2023-09-25 00:00:00",
            'updated_at' => "2023-09-25 00:00:00"
        ],

    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->employeeData;
        return view('admin/employee/index', compact('data'));
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
    public function store(Request $request)
    {
        //
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
        $employee = null;
        foreach ($this->employeeData as $key => $value) {
            if ($value['employee_id'] == $id) {
                $employee = $value;
                break;
            }
        }
        return view(('admin/employee/edit'), compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}