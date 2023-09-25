<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSupplyRequest;
use Illuminate\Http\Request;

class SuppliesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private $data = [
        [
            'id' => 1,
            'companyId' => 'comp001',
            'companyName' => 'Company A',
            'transactionName' => 'Transaction 1',
            'address' => '123 Main St',
            'email' => 'companyA@example.com',
            'phoneNumber' => '123-456-7890',
            'fax' => '987-654-3210',
        ],
        [
            'id' => 2,
            'companyId' => 'comp002',
            'companyName' => 'Company B',
            'transactionName' => 'Transaction 2',
            'address' => '456 Elm St',
            'email' => 'companyB@example.com',
            'phoneNumber' => '555-555-5555',
            'fax' => '111-111-1111',
        ],
        [
            'id' => 3,
            'companyId' => 'comp003',
            'companyName' => 'Company C',
            'transactionName' => 'Transaction 3',
            'address' => '789 Oak St',
            'email' => 'companyC@example.com',
            'phoneNumber' => '777-777-7777',
            'fax' => '222-222-2222',
        ],
        [
            'id' => 4,
            'companyId' => 'comp004',
            'companyName' => 'Company D',
            'transactionName' => 'Transaction 4',
            'address' => '101 Pine St',
            'email' => 'companyD@example.com',
            'phoneNumber' => '999-999-9999',
            'fax' => '333-333-3333',
        ],
        [
            'id' => 5,
            'companyId' => 'comp005',
            'companyName' => 'Company E',
            'transactionName' => 'Transaction 5',
            'address' => '202 Cedar St',
            'email' => 'companyE@example.com',
            'phoneNumber' => '444-444-4444',
            'fax' => '555-555-5555',
        ],
        [
            'id' => 6,
            'companyId' => 'comp006',
            'companyName' => 'Company F',
            'transactionName' => 'Transaction 6',
            'address' => '303 Oak St',
            'email' => 'companyF@example.com',
            'phoneNumber' => '666-666-6666',
            'fax' => '777-777-7777',
        ],
        [
            'id' => 7,
            'companyId' => 'comp007',
            'companyName' => 'Company G',
            'transactionName' => 'Transaction 7',
            'address' => '404 Elm St',
            'email' => 'companyG@example.com',
            'phoneNumber' => '888-888-8888',
            'fax' => '999-999-9999',
        ],
        [
            'id' => 8,
            'companyId' => 'comp008',
            'companyName' => 'Company H',
            'transactionName' => 'Transaction 8',
            'address' => '505 Pine St',
            'email' => 'companyH@example.com',
            'phoneNumber' => '111-222-3333',
            'fax' => '444-555-6666',
        ],
        [
            'id' => 9,
            'companyId' => 'comp009',
            'companyName' => 'Company I',
            'transactionName' => 'Transaction 9',
            'address' => '606 Cedar St',
            'email' => 'companyI@example.com',
            'phoneNumber' => '777-888-9999',
            'fax' => '111-222-3333',
        ],
        [
            'id' => 10,
            'companyId' => 'comp010',
            'companyName' => 'Company J',
            'transactionName' => 'Transaction 10',
            'address' => '707 Elm St',
            'email' => 'companyJ@example.com',
            'phoneNumber' => '333-444-5555',
            'fax' => '666-777-8888',
        ],
        [
            'id' => 11,
            'companyId' => 'comp011',
            'companyName' => 'Company K',
            'transactionName' => 'Transaction 11',
            'address' => '808 Oak St',
            'email' => 'companyK@example.com',
            'phoneNumber' => '111-333-5555',
            'fax' => '777-888-9999',
        ],
        [
            'id' => 12,
            'companyId' => 'comp012',
            'companyName' => 'Company L',
            'transactionName' => 'Transaction 12',
            'address' => '909 Cedar St',
            'email' => 'companyL@example.com',
            'phoneNumber' => '444-555-6666',
            'fax' => '111-222-3333',
        ],
        [
            'id' => 13,
            'companyId' => 'comp013',
            'companyName' => 'Company M',
            'transactionName' => 'Transaction 13',
            'address' => '101 Oak St',
            'email' => 'companyM@example.com',
            'phoneNumber' => '777-888-9999',
            'fax' => '111-222-3333',
        ],
        [
            'id' => 14,
            'companyId' => 'comp014',
            'companyName' => 'Company N',
            'transactionName' => 'Transaction 14',
            'address' => '202 Elm St',
            'email' => 'companyN@example.com',
            'phoneNumber' => '111-333-5555',
            'fax' => '777-888-9999',
        ],
        [
            'id' => 15,
            'companyId' => 'comp015',
            'companyName' => 'Company O',
            'transactionName' => 'Transaction 15',
            'address' => '303 Cedar St',
            'email' => 'companyO@example.com',
            'phoneNumber' => '444-555-6666',
            'fax' => '111-222-3333',
        ],
        [
            'id' => 16,
            'companyId' => 'comp016',
            'companyName' => 'Company P',
            'transactionName' => 'Transaction 16',
            'address' => '404 Oak St',
            'email' => 'companyP@example.com',
            'phoneNumber' => '777-888-9999',
            'fax' => '111-222-3333',
        ],
        [
            'id' => 17,
            'companyId' => 'comp017',
            'companyName' => 'Company Q',
            'transactionName' => 'Transaction 17',
            'address' => '505 Elm St',
            'email' => 'companyQ@example.com',
            'phoneNumber' => '333-444-5555',
            'fax' => '666-777-8888',
        ],
        [
            'id' => 18,
            'companyId' => 'comp018',
            'companyName' => 'Company R',
            'transactionName' => 'Transaction 18',
            'address' => '606 Oak St',
            'email' => 'companyR@example.com',
            'phoneNumber' => '111-333-5555',
            'fax' => '777-888-9999',
        ],
        [
            'id' => 19,
            'companyId' => 'comp019',
            'companyName' => 'Company S',
            'transactionName' => 'Transaction 19',
            'address' => '707 Cedar St',
            'email' => 'companyS@example.com',
            'phoneNumber' => '444-555-6666',
            'fax' => '111-222-3333',
        ],
        [
            'id' => 20,
            'companyId' => 'comp020',
            'companyName' => 'Company T',
            'transactionName' => 'Transaction 20',
            'address' => '808 Elm St',
            'email' => 'companyT@example.com',
            'phoneNumber' => '777-888-9999',
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
    public function store(CreateSupplyRequest $request)
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
        $supply = collect($this->data)->where('id', $id)->first();

        if (empty($supply)) {
            abort(404);
        }

        return view('supplies.edit', compact('supply'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateSupplyRequest $request, string $id)
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
