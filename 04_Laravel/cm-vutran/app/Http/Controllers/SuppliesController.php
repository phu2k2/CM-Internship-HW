<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplieRequest\CreateSupplieRequest;
use App\Http\Requests\SupplieRequest\UpdateSupplieRequest;
use Illuminate\Http\Request;

class SuppliesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $data = [
        [
            'id' => 1,
            'company_id' => 'comp001',
            'company_name' => 'Company A',
            'transaction_name' => 'Transaction 1',
            'address' => '123 Main St',
            'email' => 'companyA@example.com',
            'phone_number' => '123-456-7890',
            'fax' => '987-654-3210',
        ],
        [
            'id' => 2,
            'company_id' => 'comp002',
            'company_name' => 'Company B',
            'transaction_name' => 'Transaction 2',
            'address' => '456 Elm St',
            'email' => 'companyB@example.com',
            'phone_number' => '555-555-5555',
            'fax' => '111-111-1111',
        ],
        [
            'id' => 3,
            'company_id' => 'comp003',
            'company_name' => 'Company C',
            'transaction_name' => 'Transaction 3',
            'address' => '789 Oak St',
            'email' => 'companyC@example.com',
            'phone_number' => '777-777-7777',
            'fax' => '222-222-2222',
        ],
        [
            'id' => 4,
            'company_id' => 'comp004',
            'company_name' => 'Company D',
            'transaction_name' => 'Transaction 4',
            'address' => '101 Pine St',
            'email' => 'companyD@example.com',
            'phone_number' => '999-999-9999',
            'fax' => '333-333-3333',
        ],
        [
            'id' => 5,
            'company_id' => 'comp005',
            'company_name' => 'Company E',
            'transaction_name' => 'Transaction 5',
            'address' => '202 Cedar St',
            'email' => 'companyE@example.com',
            'phone_number' => '444-444-4444',
            'fax' => '555-555-5555',
        ],
        [
            'id' => 6,
            'company_id' => 'comp006',
            'company_name' => 'Company F',
            'transaction_name' => 'Transaction 6',
            'address' => '303 Oak St',
            'email' => 'companyF@example.com',
            'phone_number' => '666-666-6666',
            'fax' => '777-777-7777',
        ],
        [
            'id' => 7,
            'company_id' => 'comp007',
            'company_name' => 'Company G',
            'transaction_name' => 'Transaction 7',
            'address' => '404 Elm St',
            'email' => 'companyG@example.com',
            'phone_number' => '888-888-8888',
            'fax' => '999-999-9999',
        ],
        [
            'id' => 8,
            'company_id' => 'comp008',
            'company_name' => 'Company H',
            'transaction_name' => 'Transaction 8',
            'address' => '505 Pine St',
            'email' => 'companyH@example.com',
            'phone_number' => '111-222-3333',
            'fax' => '444-555-6666',
        ],
        [
            'id' => 9,
            'company_id' => 'comp009',
            'company_name' => 'Company I',
            'transaction_name' => 'Transaction 9',
            'address' => '606 Cedar St',
            'email' => 'companyI@example.com',
            'phone_number' => '777-888-9999',
            'fax' => '111-222-3333',
        ],
        [
            'id' => 10,
            'company_id' => 'comp010',
            'company_name' => 'Company J',
            'transaction_name' => 'Transaction 10',
            'address' => '707 Elm St',
            'email' => 'companyJ@example.com',
            'phone_number' => '333-444-5555',
            'fax' => '666-777-8888',
        ],
        [
            'id' => 11,
            'company_id' => 'comp011',
            'company_name' => 'Company K',
            'transaction_name' => 'Transaction 11',
            'address' => '808 Oak St',
            'email' => 'companyK@example.com',
            'phone_number' => '111-333-5555',
            'fax' => '777-888-9999',
        ],
        [
            'id' => 12,
            'company_id' => 'comp012',
            'company_name' => 'Company L',
            'transaction_name' => 'Transaction 12',
            'address' => '909 Cedar St',
            'email' => 'companyL@example.com',
            'phone_number' => '444-555-6666',
            'fax' => '111-222-3333',
        ],
        [
            'id' => 13,
            'company_id' => 'comp013',
            'company_name' => 'Company M',
            'transaction_name' => 'Transaction 13',
            'address' => '101 Oak St',
            'email' => 'companyM@example.com',
            'phone_number' => '777-888-9999',
            'fax' => '111-222-3333',
        ],
        [
            'id' => 14,
            'company_id' => 'comp014',
            'company_name' => 'Company N',
            'transaction_name' => 'Transaction 14',
            'address' => '202 Elm St',
            'email' => 'companyN@example.com',
            'phone_number' => '111-333-5555',
            'fax' => '777-888-9999',
        ],
        [
            'id' => 15,
            'company_id' => 'comp015',
            'company_name' => 'Company O',
            'transaction_name' => 'Transaction 15',
            'address' => '303 Cedar St',
            'email' => 'companyO@example.com',
            'phone_number' => '444-555-6666',
            'fax' => '111-222-3333',
        ],
        [
            'id' => 16,
            'company_id' => 'comp016',
            'company_name' => 'Company P',
            'transaction_name' => 'Transaction 16',
            'address' => '404 Oak St',
            'email' => 'companyP@example.com',
            'phone_number' => '777-888-9999',
            'fax' => '111-222-3333',
        ],
        [
            'id' => 17,
            'company_id' => 'comp017',
            'company_name' => 'Company Q',
            'transaction_name' => 'Transaction 17',
            'address' => '505 Elm St',
            'email' => 'companyQ@example.com',
            'phone_number' => '333-444-5555',
            'fax' => '666-777-8888',
        ],
        [
            'id' => 18,
            'company_id' => 'comp018',
            'company_name' => 'Company R',
            'transaction_name' => 'Transaction 18',
            'address' => '606 Oak St',
            'email' => 'companyR@example.com',
            'phone_number' => '111-333-5555',
            'fax' => '777-888-9999',
        ],
        [
            'id' => 19,
            'company_id' => 'comp019',
            'company_name' => 'Company S',
            'transaction_name' => 'Transaction 19',
            'address' => '707 Cedar St',
            'email' => 'companyS@example.com',
            'phone_number' => '444-555-6666',
            'fax' => '111-222-3333',
        ],
        [
            'id' => 20,
            'company_id' => 'comp020',
            'company_name' => 'Company T',
            'transaction_name' => 'Transaction 20',
            'address' => '808 Elm St',
            'email' => 'companyT@example.com',
            'phone_number' => '777-888-9999',
            'fax' => '111-222-3333',
        ],
    ];

    public function index()
    {
        $supplies = $this->data;
        
        return view('supplies.index', compact('supplies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supplies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateSupplieRequest $request)
    {
        $request->session()->flash('success', 'Add Supply successful!');
        
        return redirect()->route('supplies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $Id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $supplie = collect($this->data)->where('id', $id)->first();

        if (empty($supplie)) {
            abort(404);
        }

        return view('supplies.edit', compact('supplie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplieRequest $request, string $id)
    {
        $index = array_search($id, array_column($this->data, 'id'));

        if ($index === false) {
            abort(404);
        }

        $request->session()->flash('success', 'Update Supply successful!');

        return redirect()->route('supplies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $index = array_search($id, array_column($this->data, 'id'));

        if ($index === false) {
            abort(404);
        }

        $request->session()->flash('success', 'Delete Supply successful!');

        return redirect()->route('supplies.index');
    }
}
