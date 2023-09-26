<?php

namespace App\Http\Controllers;

use App\Http\Requests\employee\StoreRequest;
use App\Http\Requests\employee\UpdateRequest;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    private $employeeData = [
        [
            'employee_id' => 'E001',
            'last_name' => 'Smith',
            'first_name' => 'John',
            'birthday' => '1990-01-15 00:00:00',
            'start_date' => '2022-03-01 00:00:00',
            'address' => '123 Main St, City A',
            'phone' => '123-456-7890',
            'base_salary' => 50000.00,
            'allowance' => 2000.00,
        ],
        [
            'employee_id' => 'E002',
            'last_name' => 'Doe',
            'first_name' => 'Jane',
            'birthday' => '1995-05-20 00:00:00',
            'start_date' => '2022-04-15 00:00:00',
            'address' => '456 Elm St, City B',
            'phone' => '555-555-5555',
            'base_salary' => 55000.00,
            'allowance' => 2500.00,
        ],
        [
            'employee_id' => 'E003',
            'last_name' => 'Johnson',
            'first_name' => 'Robert',
            'birthday' => '1988-11-10 00:00:00',
            'start_date' => '2022-02-10 00:00:00',
            'address' => '789 Oak St, City C',
            'phone' => '111-222-3333',
            'base_salary' => 48000.00,
            'allowance' => 1800.00,
        ],
        [
            'employee_id' => 'E004',
            'last_name' => 'Brown',
            'first_name' => 'Linda',
            'birthday' => '1992-07-25 00:00:00',
            'start_date' => '2022-03-20 00:00:00',
            'address' => '321 Maple St, City D',
            'phone' => '777-888-9999',
            'base_salary' => 52000.00,
            'allowance' => 2200.00,
        ],
        [
            'employee_id' => 'E005',
            'last_name' => 'Garcia',
            'first_name' => 'Michael',
            'birthday' => '1985-04-05 00:00:00',
            'start_date' => '2022-05-05 00:00:00',
            'address' => '567 Pine St, City E',
            'phone' => '999-999-7777',
            'base_salary' => '53000.00',
            'allowance' => '2300.00',
        ],
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.employee.index', ['employees' => $this->employeeData]);
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
    public function store(StoreRequest $request)
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
        foreach ($this->employeeData as $key => $value) {
            if ($value['employee_id'] == $id) {
                $employee = $value;
            }
        }
        return view('admin.employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
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
