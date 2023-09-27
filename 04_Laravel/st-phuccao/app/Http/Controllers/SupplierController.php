<?php

namespace App\Http\Controllers;

use App\Http\Requests\Supplier\StoreRequest;
use App\Http\Requests\Supplier\UpdateRequest;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    private $companyData = [
        [
            'company_id' => 'C001',
            'company_name' => 'Company A',
            'transaction_name' => 'Transaction 1',
            'address' => '123 Main St, City A',
            'phone' => '123-456-7890',
            'fax' => '987-654-3210',
            'email' => 'companya@example.com',
        ],
        [
            'company_id' => 'C002',
            'company_name' => 'Company B',
            'transaction_name' => 'Transaction 2',
            'address' => '456 Elm St, City B',
            'phone' => '555-555-5555',
            'fax' => null, // Fax can be null, because it is defined as nullable()
            'email' => 'companyb@example.com',
        ],
        [
            'company_id' => 'C003',
            'company_name' => 'Company C',
            'transaction_name' => 'Transaction 3',
            'address' => '789 Oak St, City C',
            'phone' => '111-222-3333',
            'fax' => '333-222-1111',
            'email' => 'companyc@example.com',
        ],
        [
            'company_id' => 'C004',
            'company_name' => 'Company D',
            'transaction_name' => 'Transaction 4',
            'address' => '321 Maple St, City D',
            'phone' => '777-888-9999',
            'fax' => '999-888-7777',
            'email' => 'companyd@example.com',
        ],
        [
            'company_id' => 'C005',
            'company_name' => 'Company E',
            'transaction_name' => 'Transaction 5',
            'address' => '567 Pine St, City E',
            'phone' => '999-111-2222',
            'fax' => null,
            'email' => 'companye@example.com',
        ],
        [
            'company_id' => 'C006',
            'company_name' => 'Company F',
            'transaction_name' => 'Transaction 6',
            'address' => '789 Elm St, City F',
            'phone' => '333-555-7777',
            'fax' => '777-555-3333',
            'email' => 'companyf@example.com',
        ],
        [
            'company_id' => 'C007',
            'company_name' => 'Company G',
            'transaction_name' => 'Transaction 7',
            'address' => '111 Oak St, City G',
            'phone' => '555-999-1111',
            'fax' => null,
            'email' => 'companyg@example.com',
        ],
        [
            'company_id' => 'C008',
            'company_name' => 'Company H',
            'transaction_name' => 'Transaction 8',
            'address' => '444 Pine St, City H',
            'phone' => '111-888-5555',
            'fax' => '555-888-1111',
            'email' => 'companyh@example.com',
        ],
        [
            'company_id' => 'C009',
            'company_name' => 'Company I',
            'transaction_name' => 'Transaction 9',
            'address' => '222 Elm St, City I',
            'phone' => '222-555-9999',
            'fax' => null,
            'email' => 'companyi@example.com',
        ],
        [
            'company_id' => 'C010',
            'company_name' => 'Company J',
            'transaction_name' => 'Transaction 10',
            'address' => '555 Oak St, City J',
            'phone' => '444-333-1111',
            'fax' => '111-333-4444',
            'email' => 'companyj@example.com',
        ],
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.supplier.index', ['suppliers' => $this->companyData]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
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
        foreach ($this->companyData as $key => $value) {
            if ($value['company_id'] == $id) {
                $supplier = $value;
            }
        }

        return view('admin.supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
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
