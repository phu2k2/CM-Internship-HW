<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{

    private $customerData = [
        [
            'customers_id' => 1,
            'company_name' => "ABC Inc.",
            'transaction_name' => "Purchase",
            'address' => "123 Main Street",
            'email' => "abc@example.com",
            'phone' => "555-123-4567",
            'fax' => "555-987-6543",
            'created_at' => "2023-09-26 10:00:00",
            'updated_at' => "2023-09-26 10:30:00",
        ],
        [
            'customers_id' => 2,
            'company_name' => "XYZ Corp.",
            'transaction_name' => "Sale",
            'address' => "456 Elm Street",
            'email' => "xyz@example.com",
            'phone' => "555-987-6543",
            'fax' => "555-123-4567",
            'created_at' => "2023-09-26 11:15:00",
            'updated_at' => "2023-09-26 11:45:00",
        ],
        [
            'customers_id' => 3,
            'company_name' => "LMN Ltd.",
            'transaction_name' => "Service",
            'address' => "789 Oak Street",
            'email' => "lmn@example.com",
            'phone' => "555-222-3333",
            'fax' => "555-333-2222",
            'created_at' => "2023-09-26 12:30:00",
            'updated_at' => "2023-09-26 13:00:00",
        ],
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->customerData;
        return view('admin/customer/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/customer/create');
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
        $customer = null;
        foreach ($this->customerData as $key => $value) {
            if ($value['customers_id'] == $id) {
                $customer = $value;
                break;
            }
        }
        return view(('admin/customer/edit'), compact('customer'));
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
