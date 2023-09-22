<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployeeRequest;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    private $data = [
        [
            'id' => '1',
            'name' => 'John Doe',
            'position' => 'Manager',
            'office' => 'New York',
            'age' => 35,
            'startDate' => '2020-01-15',
            'salary' => 80000,
        ],
        [
            'id' => '2',
            'name' => 'Jane Smith',
            'position' => 'Developer',
            'office' => 'San Francisco',
            'age' => 28,
            'startDate' => '2019-07-10',
            'salary' => 70000,
        ],
        [
            'id' => '3',
            'name' => 'Michael Johnson',
            'position' => 'Designer',
            'office' => 'Los Angeles',
            'age' => 32,
            'startDate' => '2021-03-20',
            'salary' => 75000,
        ],
        [
            'id' => '4',
            'name' => 'Emily Davis',
            'position' => 'Analyst',
            'office' => 'Chicago',
            'age' => 29,
            'startDate' => '2018-12-05',
            'salary' => 65000,
        ],
        [
            'id' => '5',
            'name' => 'Robert Wilson',
            'position' => 'Manager',
            'office' => 'Houston',
            'age' => 37,
            'startDate' => '2017-09-22',
            'salary' => 90000,
        ],
        [
            'id' => '6',
            'name' => 'Sarah Brown',
            'position' => 'Developer',
            'office' => 'Seattle',
            'age' => 26,
            'startDate' => '2022-02-18',
            'salary' => 72000,
        ],
        [
            'id' => '7',
            'name' => 'David Lee',
            'position' => 'Designer',
            'office' => 'Miami',
            'age' => 31,
            'startDate' => '2019-05-12',
            'salary' => 76000,
        ],
        [
            'id' => '8',
            'name' => 'Lisa Martinez',
            'position' => 'Analyst',
            'office' => 'Dallas',
            'age' => 27,
            'startDate' => '2020-10-03',
            'salary' => 68000,
        ],
        [
            'id' => '9',
            'name' => 'William Taylor',
            'position' => 'Manager',
            'office' => 'Atlanta',
            'age' => 38,
            'startDate' => '2016-11-08',
            'salary' => 95000,
        ],
        [
            'id' => '10',
            'name' => 'Olivia White',
            'position' => 'Developer',
            'office' => 'Boston',
            'age' => 30,
            'startDate' => '2021-07-25',
            'salary' => 74000,
        ],
        [
            'id' => '11',
            'name' => 'Daniel Harris',
            'position' => 'Designer',
            'office' => 'Denver',
            'age' => 33,
            'startDate' => '2018-03-14',
            'salary' => 78000,
        ],
        [
            'id' => '12',
            'name' => 'Sophia Clark',
            'position' => 'Analyst',
            'office' => 'Phoenix',
            'age' => 29,
            'startDate' => '2019-08-30',
            'salary' => 69000,
        ],
        [
            'id' => '13',
            'name' => 'Matthew Turner',
            'position' => 'Manager',
            'office' => 'Philadelphia',
            'age' => 36,
            'startDate' => '2017-04-19',
            'salary' => 92000,
        ],
        [
            'id' => '14',
            'name' => 'Ava Walker',
            'position' => 'Developer',
            'office' => 'Austin',
            'age' => 27,
            'startDate' => '2022-01-05',
            'salary' => 71000,
        ],
        [
            'id' => '15',
            'name' => 'Ethan Lewis',
            'position' => 'Designer',
            'office' => 'San Diego',
            'age' => 34,
            'startDate' => '2018-09-10',
            'salary' => 77000,
        ],
    ];

    public function index()
    {
        $employees = $this->data;
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

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
