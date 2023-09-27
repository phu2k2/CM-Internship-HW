<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employee\DeleteEmployeeRequest;
use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    private $data = [
        [
            'id' => '1',
            'employeeId' => 'EMP001',
            'lastName' => 'Smith',
            'firstName' => 'John',
            'birthday' => '1990-05-15',
            'startDate' => '2015-03-20',
            'address' => '123 Main St',
            'phone' => '555-123-4567',
            'baseSalary' => 60000,
            'allowance' => 3000,
        ],
        [
            'id' => '2',
            'employeeId' => 'EMP002',
            'lastName' => 'Johnson',
            'firstName' => 'Emily',
            'birthday' => '1985-12-10',
            'startDate' => '2017-08-12',
            'address' => '456 Elm St',
            'phone' => '555-234-5678',
            'baseSalary' => 55000,
            'allowance' => 2800,
        ],
        [
            'id' => '3',
            'employeeId' => 'EMP003',
            'lastName' => 'Williams',
            'firstName' => 'Michael',
            'birthday' => '1992-03-25',
            'startDate' => '2016-06-05',
            'address' => '789 Oak St',
            'phone' => '555-345-6789',
            'baseSalary' => 62000,
            'allowance' => 3200,
        ],
        [
            'id' => '4',
            'employeeId' => 'EMP004',
            'lastName' => 'Brown',
            'firstName' => 'Jessica',
            'birthday' => '1988-08-20',
            'startDate' => '2018-02-18',
            'address' => '101 Pine St',
            'phone' => '555-456-7890',
            'baseSalary' => 58000,
            'allowance' => 2900,
        ],
        [
            'id' => '5',
            'employeeId' => 'EMP005',
            'lastName' => 'Jones',
            'firstName' => 'David',
            'birthday' => '1995-02-28',
            'startDate' => '2019-07-10',
            'address' => '202 Cedar St',
            'phone' => '555-567-8901',
            'baseSalary' => 64000,
            'allowance' => 3300,
        ],
        [
            'id' => '6',
            'employeeId' => 'EMP006',
            'lastName' => 'Davis',
            'firstName' => 'Sarah',
            'birthday' => '1993-11-15',
            'startDate' => '2014-04-02',
            'address' => '303 Birch St',
            'phone' => '555-678-9012',
            'baseSalary' => 57000,
            'allowance' => 2700,
        ],
        [
            'id' => '7',
            'employeeId' => 'EMP007',
            'lastName' => 'Miller',
            'firstName' => 'Christopher',
            'birthday' => '1987-07-05',
            'startDate' => '2015-11-30',
            'address' => '404 Oak St',
            'phone' => '555-789-0123',
            'baseSalary' => 61000,
            'allowance' => 3100,
        ],
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = $this->data;

        return view("admin.employee.index", compact('employees'));
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
        return redirect()->route('admin.employee.index');
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
        foreach ($this->data as $item) {
            if ($item['id'] == $id) {
                $employee = $item;
                break;
            }
            if (!$employee) {
                abort(404);
            }
        }

        return view('admin.employee.update', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteEmployeeRequest $request, string $id)
    {
        //
    }
}
