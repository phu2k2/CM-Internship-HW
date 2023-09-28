<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    private $employees = [
        [
            'id' => '1',
            'employee_id' => 'E001',
            'last_name' => 'Doe',
            'first_name' => 'John',
            'birthday' => '1990-05-15',
            'start_date' => '2020-01-10',
            'address' => '123 Main St',
            'phone' => '555-123-4567',
            'base_salary' => 50000.00,
            'allowance' => 2500.00,
        ],
        [
            'id' => '2',
            'employee_id' => 'E002',
            'last_name' => 'Smith',
            'first_name' => 'Jane',
            'birthday' => '1985-08-20',
            'start_date' => '2019-04-05',
            'address' => '456 Elm St',
            'phone' => '555-987-6543',
            'base_salary' => 55000.00,
            'allowance' => 2800.00,
        ],
        [
            'id' => '3',
            'employee_id' => 'E010',
            'last_name' => 'Brown',
            'first_name' => 'Michael',
            'birthday' => '1992-11-03',
            'start_date' => '2021-02-15',
            'address' => '789 Oak St',
            'phone' => '555-333-4444',
            'base_salary' => 52000.00,
            'allowance' => 2600.00,
        ],
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = $this->employees;
        return view("admin.pages.employee.index", compact('employees'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        $validated = $request->validated();
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
        $employees = $this->employees;
        foreach ($employees as $editEmployee) {
            if ((int)$editEmployee['id'] === (int)$id) {
                return view("admin.pages.employee.edit", compact('editEmployee'));
            }
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, string $id)
    {
        $validated = $request->validated();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
