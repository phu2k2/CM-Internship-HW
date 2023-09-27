<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customers\CreateCustomerRequest;
use App\Http\Requests\Customers\DeleteCustomerRequest;
use App\Http\Requests\Customers\UpdateCustomerRequest;
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
            'phone' => '04-891135',
            'fax' => '987-654-3210',
        ],
        [
            'id' => 2,
            'company_name' => 'Công ty may mặc Việt Tiến',
            'transaction_name' => 'VIETTIEN',
            'address' => 'Sài Gòn',
            'email' => 'viettien@vietnam.com',
            'phone' => '08-808803',
            'fax' => '111-111-1111',
        ],
        [
            'id' => 3,
            'company_name' => 'Tổng công ty thực phẩm dinh dưỡng NUTRIFOOD',
            'transaction_name' => 'NUTRIFOOD',
            'address' => 'Sài Gòn',
            'email' => 'nutrifood@vietnam.com',
            'phone' => '08-809890',
            'fax' => '222-222-2222',
        ],
        [
            'id' => 4,
            'company_name' => 'Công ty điện máy Hà Nội',
            'transaction_name' => 'MACHANOI',
            'address' => 'Hà Nội',
            'email' => 'machanoi@vietnam.com',
            'phone' => '04-898399',
            'fax' => '333-333-3333',
        ],
        [
            'id' => 5,
            'company_name' => 'Hãng hàng không Việt Nam',
            'transaction_name' => 'VIETNAMAIRLINES',
            'address' => 'Sài Gòn',
            'email' => 'vietnamairlines@vietnam.com',
            'phone' => '08-888888',
            'fax' => '555-555-5555',
        ],
        [
            'id' => 6,
            'company_name' => 'Công ty dụng cụ học sinh MIC',
            'transaction_name' => 'MIC',
            'address' => 'Hà Nội',
            'email' => 'mic@vietnam.com',
            'phone' => '04-804408',
            'fax' => '777-777-7777',
        ],
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = $this->data;
        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCustomerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        foreach ($this->data as $key => $cus) {
            if ($cus['id'] == $id) {
                $customer = $cus;
            }
        }
        return view('customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        foreach ($this->data as $key => $cus) {
            if ($cus['id'] == $id) {
                $customer = $cus;
            }
        }
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteCustomerRequest $request, string $id)
    {
        //
    }
}
