<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    private $suppliers = [
        [
            'id' => 1,
            'company_id' => 'comp001',
            'company_name' => 'Company A',
            'transaction_name' => 'Transaction 1',
            'address' => '123 Main St',
            'email' => 'companyA@example.com',
            'phone' => '123-456-7890',
            'fax' => '987-654-3210',
        ],
        [
            'id' => 2,
            'company_id' => 'comp002',
            'company_name' => 'Company B',
            'transaction_name' => 'Transaction 2',
            'address' => '456 Elm St',
            'email' => 'companyB@example.com',
            'phone' => '555-555-5555',
            'fax' => '111-111-1111',
        ],
        [
            'id' => 3,
            'company_id' => 'comp003',
            'company_name' => 'Company C',
            'transaction_name' => 'Transaction 3',
            'address' => '789 Oak St',
            'email' => 'companyC@example.com',
            'phone' => '777-777-7777',
            'fax' => '222-222-2222',
        ],
        [
            'id' => 4,
            'company_id' => 'comp004',
            'company_name' => 'Company D',
            'transaction_name' => 'Transaction 4',
            'address' => '101 Pine St',
            'email' => 'companyD@example.com',
            'phone' => '999-999-9999',
            'fax' => '333-333-3333',
        ],
        [
            'id' => 5,
            'company_id' => 'comp005',
            'company_name' => 'Company E',
            'transaction_name' => 'Transaction 5',
            'address' => '202 Cedar St',
            'email' => 'companyE@example.com',
            'phone' => '444-444-4444',
            'fax' => '555-555-5555',
        ],
        [
            'id' => 6,
            'company_id' => 'comp006',
            'company_name' => 'Company F',
            'transaction_name' => 'Transaction 6',
            'address' => '303 Oak St',
            'email' => 'companyF@example.com',
            'phone' => '666-666-6666',
            'fax' => '777-777-7777',
        ],
        [
            'id' => 7,
            'company_id' => 'comp007',
            'company_name' => 'Company G',
            'transaction_name' => 'Transaction 7',
            'address' => '404 Elm St',
            'email' => 'companyG@example.com',
            'phone' => '888-888-8888',
            'fax' => '999-999-9999',
        ],
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = $this->suppliers;
        return view("admin.pages.supplier.index", compact('suppliers'));
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
    public function store(SupplierRequest $request)
    {
        $validated = $request->validated();
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
        $suppliers = $this->suppliers;
        foreach ($suppliers as $editSupplier) {
            if ((int)$editSupplier['company_id'] === (int)$id) {
                return view("admin.pages.supplier.edit", compact('editSupplier'));
            }
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SupplierRequest $request, string $id)
    {
        $validated = $request->validated();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
