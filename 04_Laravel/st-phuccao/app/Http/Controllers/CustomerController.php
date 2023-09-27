<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customer\StoreCustomerRequest;
use App\Http\Requests\Customer\UpdateCustomerRequest;
use Dotenv\Store\StoreInterface;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $customerData = [
        [
            'customer_id' => 1,
            'company_name' => 'Company A',
            'transaction_name' => 'Transaction 1',
            'address' => '123 Main St, City A',
            'email' => 'companya@example.com',
            'phone' => '123-456-7890',
            'fax' => '987-654-3210',
            'created_at' => '22/09/2023',
            'updated_at' => '22/09/2023',
        ],
        [
            'customer_id' => 2,
            'company_name' => 'Company B',
            'transaction_name' => 'Transaction 2',
            'address' => '456 Elm St, City B',
            'email' => 'companyb@example.com',
            'phone' => '555-555-5555',
            'fax' => null, // Fax có thể null, vì đã được định nghĩa là nullable()
            'created_at' => '22/09/2023',
            'updated_at' => '22/09/2023',
        ],
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.customer.index', ['customers' => $this->customerData]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        foreach ($this->customerData as $key => $value) {
            if ($value['customer_id'] == $id) {
                $customer = $value;
            }
        }
        return view('admin.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, int $id)
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
