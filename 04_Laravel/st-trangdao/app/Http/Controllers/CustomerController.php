<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $data = [
        [
            'id' => 1,
            'company_name' => 'Công ty sữa Việt Nam',
            'transaction_name' => 'VINAMILK',
            'address' => 'Hà Nội',
            'email' => 'vinamilk@vietnam.com',
            'phone' => '0408911350',
            'fax' => '9876543210',
        ],
        [
            'id' => 2,
            'company_name' => 'Công ty may mặc Việt Tiến',
            'transaction_name' => 'VIETTIEN',
            'address' => 'Sài Gòn',
            'email' => 'viettien@vietnam.com',
            'phone' => '0993493841',
            'fax' => '1234952934',
        ],
        [
            'id' => 3,
            'company_name' => 'Tổng công ty thực phẩm dinh dưỡng NUTRIFOOD',
            'transaction_name' => 'NUTRIFOOD',
            'address' => 'Sài Gòn',
            'email' => 'nutrifood@vietnam.com',
            'phone' => '0845809890',
            'fax' => '3422783847',
        ]
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers =  $this->data;

        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
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
        foreach ($this->data as $key => $value) {
            if ($value['id'] == $id) {
                $customer = $value;
            }
        }

        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        foreach ($this->data as $key => $value) {
            if ($value['id'] == $id) {
                $customer = $value;
            }
        }

        return view('customers.edit', compact('customer'));
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
