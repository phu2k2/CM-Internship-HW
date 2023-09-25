<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeesController extends Controller
{

    private $employeesList = [
        ['A001', 'Đậu Tố' , 'Anh', '1986/03/07','2009/03/01', 'Quy Nhơn', '056-647995', 10000000, 1000000],
        ['H001', 'Lê Thị Bích' , 'Hoa', '1986/05/20','2009/03/01', 'An Khê', '', 9000000, 1000000],
        ['H002', 'Ông Hoàng', 'Hải' , '1987/08/11','2009/03/01', 'Đà Nẵng' , '0905-611725', 12000000, 0],
        ['H003', 'Trần Nguyễn Đức' , 'Hoàng', '1986/04/09','2009/03/01', 'Quy Nhơn','', 11000000, 0],
        ['P001', 'Nguyễn Hoài' , 'Phong', '1986/06/14', '2009/03/01', 'Quy Nhơn','056-891135', 13000000, 0],
        ['Q001', 'Trương Thị Thế' , 'Quang', '1987/06/17', '2009/03/01', 'Ayunpa','0979-792176', 10000000, 500000],
        ['T001', 'Nguyễn Đức' , 'Thắng' , '1984/09/13', '2009/03/01', 'Phù Mỹ' , '0955-593893', 1200000,0],
        ['D001', 'Nguyễn Minh' , 'Đăng', '1987/12/29', '2009/03/01', 'Quy Nhơn','0905-779919', 14000000, 0],
        ['M001', 'Hồ Thị Phương' , 'Mai', '1987/09/14', '2009/03/01', 'Tây Sơn','', 9000000, 500000]
    ];

    public function convertKeyValue()
    {
        $employees = [];
        foreach ($this->employeesList as $employee) {
            $employees[] = [
                'id' => $employee[0],
                'last_name' => $employee[1],
                'first_name' => $employee[2],
                'birthday' => $employee[3],
                'start_date' => $employee[4],
                'address' => $employee[5],
                'phone' => $employee[6],
                'base_salary' => $employee[7],
                'allowance' => $employee[8]
            ];
        }
        return $employees;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = $this->convertKeyValue();
        return view("admin.pages.employee.employees", compact('employees'));

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
        //
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
