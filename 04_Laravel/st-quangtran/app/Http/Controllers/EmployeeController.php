<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        for ($i = 0; $i < 10; $i++) {
            $employees[] = [
                'ID' => $i,
                'Employee ID' => rand(1000, 9999),
                'Last Name' => 'Last Name ' . $i,
                'First Name' => 'First Name ' . $i,
                'Birthday' => date('Y-m-d', strtotime('-' . rand(18, 60) . ' years')),
                'Start Day' => date('Y-m-d', strtotime('-' . rand(1, 10) . ' years')),
                'Address' => 'Address ' . $i,
                'Phone' => '123-456-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'Base Salary' => rand(30000, 80000),
                'Allowance' => rand(1000, 5000),
                'Created At' => now()->subDays(rand(1, 365))->format('Y-m-d'),
                'Updated At' => now()->subDays(rand(1, 365))->format('Y-m-d'),
            ];
        }

        return view("admin.employee.index", ['employees' => $employees]);
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
    public function edit(int $id)
    {
        return view('admin.employee.edit', ['id' => $id]);
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
    public function destroy(int $id)
    {
        //
    }
}
