<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $customers = [
        [
            'id' => 1,
            'company_name' => 'ABC123',
            'transaction_name' => 'Transaction A',
            'address' => '123 Main St',
            'email' => 'example1@example.com',
            'phone' => '123-456-7890',
            'fax' => '987-654-3210',
        ],
        [
            'id' => 2,
            'company_name' => 'XYZ456',
            'transaction_name' => 'Transaction B',
            'address' => '456 Elm St',
            'email' => 'example2@example.com',
            'phone' => '555-555-5555',
            'fax' => '111-111-1111',
        ],
        [
            'id' => 3,
            'company_name' => 'DEF789',
            'transaction_name' => 'Transaction C',
            'address' => '789 Oak St',
            'email' => 'example3@example.com',
            'phone' => '777-777-7777',
            'fax' => '222-222-2222',
        ],
        [
            'id' => 4,
            'company_name' => 'GHI101',
            'transaction_name' => 'Transaction D',
            'address' => '101 Pine St',
            'email' => 'example4@example.com',
            'phone' => '999-999-9999',
            'fax' => '333-333-3333',
        ],
        [
            'id' => 5,
            'company_name' => 'JKL202',
            'transaction_name' => 'Transaction E',
            'address' => '202 Cedar St',
            'email' => 'example5@example.com',
            'phone' => '444-444-4444',
            'fax' => '555-555-5555',
        ],
        [
            'id' => 6,
            'company_name' => 'MNO303',
            'transaction_name' => 'Transaction F',
            'address' => '303 Birch St',
            'email' => 'example6@example.com',
            'phone' => '666-666-6666',
            'fax' => '777-777-7777',
        ],
    ];

    public function index()
    {
        $customers = $this->customers;
        return view("admin.pages.customer.index", compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        $validated = $request->validated();
        $customers = $this->customers;
        $customers[] = [
            'id' => $request->input('id'),
            'company_name' => $request->input('company_name'),
            'transaction_name' => $request->input('transaction_name'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'fax' => $request->input('fax')
        ];
        return view("admin.pages.customer.index", compact('customer'));
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
        $customers = $this->customers;
        foreach ($customers as $customer) {
            if ((int)$customer['id'] === (int)$id) {
                return view("admin.pages.customer.edit", compact('customer'));
            }
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, string $id)
    {
        $validated = $request->validated();

        $customers = $this->customers;
        foreach ($customers as $customer) {
            if ((int)$customer['id'] === (int)$id) {
                $customer = [
                    'id' => $request->input('id'),
                    'company_name' => $request->input('company_name'),
                    'transaction_name' => $request->input('transaction_name'),
                    'address' => $request->input('address'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'fax' => $request->input('fax')
                ];
                return view("admin.pages.customer.edit", compact('customer'));
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
