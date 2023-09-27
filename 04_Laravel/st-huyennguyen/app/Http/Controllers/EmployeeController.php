<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employees\CreateEmployeeRequest;
use App\Http\Requests\Employees\DeleteEmployeeRequest;
use App\Http\Requests\Employees\UpdateEmployeeRequest;
use App\Models\Employee;
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
            'birthday' => '1986/05/20',
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
        ],
        [
            'id' => 4,
            'employee_id' => 'H003',
            'last_name' => 'Trần Nguyễn Đức',
            'first_name' => 'Hoàng',
            'birthday' => '1986/04/09',
            'start_date' => '2009/03/01',
            'address' => 'Quy Nhơn',
            'phone' => '',
            'base_salary' => 11000000,
            'allowance' => 0
        ],
        [
            'id' => 5,
            'employee_id' => 'P001',
            'last_name' => 'Nguyễn Hoài',
            'first_name' => 'Phong',
            'birthday' => '1986/06/14',
            'start_date' => '2009/03/01',
            'address' => 'Quy Nhơn',
            'phone' => '056-891135',
            'base_salary' => 13000000,
            'allowance' => 0
        ],
        [
            'id' => 6,
            'employee_id' => 'Q001',
            'last_name' => 'Trương Thị Thế',
            'first_name' => 'Quang',
            'birthday' => '1987/06/17',
            'start_date' => '2009/03/01',
            'address' => 'Ayunpa',
            'phone' => '0979-792176',
            'base_salary' => 10000000,
            'allowance' => 500000
        ],
        [
            'id' => 7,
            'employee_id' => 'T001',
            'last_name' => 'Nguyễn Đức',
            'first_name' => 'Thắng',
            'birthday' => '1984/09/13',
            'start_date' => '2009/03/01',
            'address' => 'Phù Mỹ',
            'phone' => '0955-593893',
            'base_salary' => 12000000,
            'allowance' => 0
        ],
        [
            'id' => 8,
            'employee_id' => 'D001',
            'last_name' => 'Nguyễn Minh',
            'first_name' => 'Đăng',
            'birthday' => '1987/12/29',
            'start_date' => '2009/03/01',
            'address' => 'Quy Nhơn',
            'phone' => '0905-779919',
            'base_salary' => 14000000,
            'allowance' => 0
        ],
        [
            'id' => 9,
            'employee_id' => 'M001',
            'last_name' => 'Hồ Thị Phương',
            'first_name' => 'Mai',
            'birthday' => '1987/09/1',
            'start_date' => '2009/03/01',
            'address' => 'Tây Sơn',
            'phone' => '',
            'base_salary' => 9000000,
            'allowance' => 500000
        ],
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::paginate(15);
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateEmployeeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        foreach ($this->data as $key => $value) {
            if ($value['id'] == $id) {
                $employee = $value;
            }
        }
        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        foreach ($this->data as $key => $value) {
            if ($value['id'] == $id) {
                $employee = $value;
            }
        }
        return view('employee.edit', compact('employee'));
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
