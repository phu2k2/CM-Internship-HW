<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    private $data = [
        [
            'id' => 1,
            'employee_id' => 'A001',
            'last_name' => 'Đậu Tố',
            'first_name' => 'Anh',
            'birthday' => '1986/03/07',
            'start_date' => '2009/03/01',
            'address' => 'Quy Nhơn',
            'phone' => '056-647995',
            'base_salary' => 10000000,
            'allowance' => 1000000
        ],
        [
            'id' => 2,
            'employee_id' => 'H001',
            'last_name' => 'Lê Thị Bích',
            'first_name' => 'Hoa',
            'birthday' => '1986/20/05',
            'start_date' => '2009/03/01',
            'address' => 'An Khê',
            'phone' => '056-647995',
            'base_salary' => 9000000,
            'allowance' => 1000000
        ],
        [
            'id' => 3,
            'employee_id' => 'H002',
            'last_name' => 'Ông Hoàng',
            'first_name' => 'Hải',
            'birthday' => '1987/08/11',
            'start_date' => '2009/03/01',
            'address' => 'Đà Nẵng',
            'phone' => '0905-611725',
            'base_salary' => 12000000,
            'allowance' => 0
        ]
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = $this -> data;
        return view('employees.index', compact('employees'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('employees.create');
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
        foreach ($this->data as $key => $value) {
            if ($value['id'] == $id) {
                $employee = $value;
            }
        }
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        foreach ($this->data as $key => $value) {
            if ($value['id'] == $id) {
                $employee = $value;
            }
        }
        return view('employees.edit', compact('employee'));
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
