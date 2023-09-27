<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCustomerRequest;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     private $data = [
        [
            'id' => 1,
            'companyName' => 'ABC123',
            'transactionName' => 'Transaction A',
            'address' => '123 Main St',
            'email' => 'example1@example.com',
            'phoneNumber' => '123-456-7890',
            'fax' => '987-654-3210',
        ],
        [
            'id' => 2,
            'companyName' => 'XYZ456',
            'transactionName' => 'Transaction B',
            'address' => '456 Elm St',
            'email' => 'example2@example.com',
            'phoneNumber' => '555-555-5555',
            'fax' => '111-111-1111',
        ],
        [
            'id' => 3,
            'companyName' => 'DEF789',
            'transactionName' => 'Transaction C',
            'address' => '789 Oak St',
            'email' => 'example3@example.com',
            'phoneNumber' => '777-777-7777',
            'fax' => '222-222-2222',
        ],
        [
            'id' => 4,
            'companyName' => 'GHI101',
            'transactionName' => 'Transaction D',
            'address' => '101 Pine St',
            'email' => 'example4@example.com',
            'phoneNumber' => '999-999-9999',
            'fax' => '333-333-3333',
        ],
        [
            'id' => 5,
            'companyName' => 'JKL202',
            'transactionName' => 'Transaction E',
            'address' => '202 Cedar St',
            'email' => 'example5@example.com',
            'phoneNumber' => '444-444-4444',
            'fax' => '555-555-5555',
        ],
        [
            'id' => 6,
            'companyName' => 'MNO303',
            'transactionName' => 'Transaction F',
            'address' => '303 Birch St',
            'email' => 'example6@example.com',
            'phoneNumber' => '666-666-6666',
            'fax' => '777-777-7777',
        ],
        [
            'id' => 7,
            'companyName' => 'PQR404',
            'transactionName' => 'Transaction G',
            'address' => '404 Oak St',
            'email' => 'example7@example.com',
            'phoneNumber' => '888-888-8888',
            'fax' => '999-999-9999',
        ],
        [
            'id' => 8,
            'companyName' => 'STU505',
            'transactionName' => 'Transaction H',
            'address' => '505 Maple St',
            'email' => 'example8@example.com',
            'phoneNumber' => '111-222-3333',
            'fax' => '444-555-6666',
        ],
        [
            'id' => 9,
            'companyName' => 'VWX606',
            'transactionName' => 'Transaction I',
            'address' => '606 Pine St',
            'email' => 'example9@example.com',
            'phoneNumber' => '777-888-9999',
            'fax' => '111-222-3333',
        ],
        [
            'id' => 10,
            'companyName' => 'YZA707',
            'transactionName' => 'Transaction J',
            'address' => '707 Cedar St',
            'email' => 'example10@example.com',
            'phoneNumber' => '333-444-5555',
            'fax' => '666-777-8888',
        ],
        [
            'id' => 11,
            'companyName' => 'BCB808',
            'transactionName' => 'Transaction K',
            'address' => '808 Elm St',
            'email' => 'example11@example.com',
            'phoneNumber' => '111-333-5555',
            'fax' => '777-888-9999',
        ],
        [
            'id' => 12,
            'companyName' => 'CDC909',
            'transactionName' => 'Transaction L',
            'address' => '909 Oak St',
            'email' => 'example12@example.com',
            'phoneNumber' => '444-555-6666',
            'fax' => '111-222-3333',
        ],
        [
            'id' => 13,
            'companyName' => 'DED010',
            'transactionName' => 'Transaction M',
            'address' => '010 Maple St',
            'email' => 'example13@example.com',
            'phoneNumber' => '777-888-9999',
            'fax' => '111-222-3333',
        ],
        [
            'id' => 14,
            'companyName' => 'EFE111',
            'transactionName' => 'Transaction N',
            'address' => '111 Pine St',
            'email' => 'example14@example.com',
            'phoneNumber' => '333-444-5555',
            'fax' => '666-777-8888',
        ],
        [
            'id' => 15,
            'companyName' => 'FGF212',
            'transactionName' => 'Transaction O',
            'address' => '212 Cedar St',
            'email' => 'example15@example.com',
            'phoneNumber' => '111-333-5555',
            'fax' => '777-888-9999',
        ],
        [
            'id' => 16,
            'companyName' => 'GHG313',
            'transactionName' => 'Transaction P',
            'address' => '313 Elm St',
            'email' => 'example16@example.com',
            'phoneNumber' => '444-555-6666',
            'fax' => '111-222-3333',
        ],
        [
            'id' => 17,
            'companyName' => 'HIH414',
            'transactionName' => 'Transaction Q',
            'address' => '414 Oak St',
            'email' => 'example17@example.com',
            'phoneNumber' => '777-888-9999',
            'fax' => '111-222-3333',
        ],
        [
            'id' => 18,
            'companyName' => 'IJI515',
            'transactionName' => 'Transaction R',
            'address' => '515 Maple St',
            'email' => 'example18@example.com',
            'phoneNumber' => '333-444-5555',
            'fax' => '666-777-8888',
        ],
        [
            'id' => 19,
            'companyName' => 'JKJ616',
            'transactionName' => 'Transaction S',
            'address' => '616 Pine St',
            'email' => 'example19@example.com',
            'phoneNumber' => '111-333-5555',
            'fax' => '777-888-9999',
        ],
        [
            'id' => 20,
            'companyName' => 'KLK717',
            'transactionName' => 'Transaction T',
            'address' => '717 Cedar St',
            'email' => 'example20@example.com',
            'phoneNumber' => '444-555-6666',
            'fax' => '111-222-3333',
        ],
        [
            'id' => 21,
            'companyName' => 'LML818',
            'transactionName' => 'Transaction U',
            'address' => '818 Elm St',
            'email' => 'example21@example.com',
            'phoneNumber' => '777-888-9999',
            'fax' => '111-222-3333',
        ],
        [
            'id' => 22,
            'companyName' => 'MNM919',
            'transactionName' => 'Transaction V',
            'address' => '919 Oak St',
            'email' => 'example22@example.com',
            'phoneNumber' => '333-444-5555',
            'fax' => '666-777-8888',
        ],
        [
            'id' => 23,
            'companyName' => 'NON020',
            'transactionName' => 'Transaction W',
            'address' => '020 Maple St',
            'email' => 'example23@example.com',
            'phoneNumber' => '111-333-5555',
            'fax' => '777-888-9999',
        ],
        [
            'id' => 24,
            'companyName' => 'OPO121',
            'transactionName' => 'Transaction X',
            'address' => '121 Pine St',
            'email' => 'example24@example.com',
            'phoneNumber' => '444-555-6666',
            'fax' => '111-222-3333',
        ],
        [
            'id' => 25,
            'companyName' => 'PQP222',
            'transactionName' => 'Transaction Y',
            'address' => '222 Cedar St',
            'email' => 'example25@example.com',
            'phoneNumber' => '111-333-5555',
            'fax' => '777-888-9999',
        ],
        [
            'id' => 26,
            'companyName' => 'QRQ323',
            'transactionName' => 'Transaction Z',
            'address' => '323 Elm St',
            'email' => 'example26@example.com',
            'phoneNumber' => '444-555-6666',
            'fax' => '111-222-3333',
        ],
        [
            'id' => 27,
            'companyName' => 'RSR424',
            'transactionName' => 'Transaction AA',
            'address' => '424 Oak St',
            'email' => 'example27@example.com',
            'phoneNumber' => '777-888-9999',
            'fax' => '111-222-3333',
        ],
        [
            'id' => 28,
            'companyName' => 'STS525',
            'transactionName' => 'Transaction BB',
            'address' => '525 Maple St',
            'email' => 'example28@example.com',
            'phoneNumber' => '333-444-5555',
            'fax' => '666-777-8888',
        ],
        [
            'id' => 29,
            'companyName' => 'TUT626',
            'transactionName' => 'Transaction CC',
            'address' => '626 Pine St',
            'email' => 'example29@example.com',
            'phoneNumber' => '111-333-5555',
            'fax' => '777-888-9999',
        ],
        [
            'id' => 30,
            'companyName' => 'UVU727',
            'transactionName' => 'Transaction DD',
            'address' => '727 Cedar St',
            'email' => 'example30@example.com',
            'phoneNumber' => '444-555-6666',
            'fax' => '111-222-3333',
        ],
    ];

    public function index()
    {
        $customers = $this->data;
        
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
    public function store(CreateCustomerRequest $request)
    {
        $request->session()->flash('success', 'Add Customer successful!');

        return redirect()->route('customers.index');
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
        $customer = collect($this->data)->where('id', $id)->first();

        if (empty($customer)) {
            abort(404);
        }

        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateCustomerRequest $request, string $id)
    {
        $index = array_search($id, array_column($this->data, 'id'));

        if ($index === false) {
            abort(404);
        }

        $request->session()->flash('success', 'Update Customer successful!');

        return redirect()->route('customers.index');
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

        $request->session()->flash('success', 'Delete Customer successful!');
        
        return redirect()->route('customers.index');
    }
}
