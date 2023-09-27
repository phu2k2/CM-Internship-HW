<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customer\DeleteCustomerRequest;
use App\Http\Requests\Customer\StoreCustomerRequest;
use App\Http\Requests\Customer\UpdateCustomerRequest;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $data = [
        [
            'id' => 1,
            'company_id' => 'ABC123',
            'transaction_name' => 'Transaction A',
            'address' => '123 Main St',
            'email' => 'example1@example.com',
            'phone' => '123-456-7890',
            'fax' => '987-654-3210',
        ],
        [
            'id' => 2,
            'company_id' => 'XYZ456',
            'transaction_name' => 'Transaction B',
            'address' => '456 Elm St',
            'email' => 'example2@example.com',
            'phone' => '555-555-5555',
            'fax' => '111-111-1111',
        ],
        [
            'id' => 3,
            'company_id' => 'DEF789',
            'transaction_name' => 'Transaction C',
            'address' => '789 Oak St',
            'email' => 'example3@example.com',
            'phone' => '777-777-7777',
            'fax' => '222-222-2222',
        ],
        [
            'id' => 4,
            'company_id' => 'GHI101',
            'transaction_name' => 'Transaction D',
            'address' => '101 Pine St',
            'email' => 'example4@example.com',
            'phone' => '999-999-9999',
            'fax' => '333-333-3333',
        ],
        [
            'id' => 5,
            'company_id' => 'JKL202',
            'transaction_name' => 'Transaction E',
            'address' => '202 Cedar St',
            'email' => 'example5@example.com',
            'phone' => '444-444-4444',
            'fax' => '555-555-5555',
        ],
    ];

    public function index()
    {
        $customers = $this->data;

        return view('admin.customer.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.customer.create');
    }

    public function store(StoreCustomerRequest $request)
    {
        return redirect()->route('customers.index');
    }

    public function show(string $id)
    {
    }

    public function edit(int $id)
    {
        foreach ($this->data as $key => $value) {
            if ($value['id'] == $id) {
                $customer = $value;
            }
        }

        return view('admin.customer.edit', compact('customer'));
    }

    public function update(UpdateCustomerRequest $request, string $id)
    {
    }

    public function destroy(DeleteCustomerRequest $request, string $id)
    {
    }
}
