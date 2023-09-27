<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest\CreateCustomerRequest;
use App\Http\Requests\CustomerRequest\UpdateCustomerRequest;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     private $data = [
        [
            'id' => 1,
            'company_name' => 'ABC123',
            'transaction_name' => 'Transaction A',
            'address' => '123 Main St',
            'email' => 'example1@example.com',
            'phone_number' => '123-456-7890',
            'fax' => '987-654-3210',
        ],
        [
            'id' => 2,
            'company_name' => 'XYZ456',
            'transaction_name' => 'Transaction B',
            'address' => '456 Elm St',
            'email' => 'example2@example.com',
            'phone_number' => '555-555-5555',
            'fax' => '111-111-1111',
        ],
        [
            'id' => 3,
            'company_name' => 'DEF789',
            'transaction_name' => 'Transaction C',
            'address' => '789 Oak St',
            'email' => 'example3@example.com',
            'phone_number' => '777-777-7777',
            'fax' => '222-222-2222',
        ],
        [
            'id' => 4,
            'company_name' => 'GHI101',
            'transaction_name' => 'Transaction D',
            'address' => '101 Pine St',
            'email' => 'example4@example.com',
            'phone_number' => '999-999-9999',
            'fax' => '333-333-3333',
        ],
        [
            'id' => 5,
            'company_name' => 'JKL202',
            'transaction_name' => 'Transaction E',
            'address' => '202 Cedar St',
            'email' => 'example5@example.com',
            'phone_number' => '444-444-4444',
            'fax' => '555-555-5555',
        ],
        [
            'id' => 6,
            'company_name' => 'MNO303',
            'transaction_name' => 'Transaction F',
            'address' => '303 Birch St',
            'email' => 'example6@example.com',
            'phone_number' => '666-666-6666',
            'fax' => '777-777-7777',
        ],
        [
            'id' => 7,
            'company_name' => 'PQR404',
            'transaction_name' => 'Transaction G',
            'address' => '404 Oak St',
            'email' => 'example7@example.com',
            'phone_number' => '888-888-8888',
            'fax' => '999-999-9999',
        ],
        [
            'id' => 8,
            'company_name' => 'STU505',
            'transaction_name' => 'Transaction H',
            'address' => '505 Maple St',
            'email' => 'example8@example.com',
            'phone_number' => '111-222-3333',
            'fax' => '444-555-6666',
        ],
        [
            'id' => 9,
            'company_name' => 'VWX606',
            'transaction_name' => 'Transaction I',
            'address' => '606 Pine St',
            'email' => 'example9@example.com',
            'phone_number' => '777-888-9999',
            'fax' => '111-222-3333',
        ],
        [
            'id' => 10,
            'company_name' => 'YZA707',
            'transaction_name' => 'Transaction J',
            'address' => '707 Cedar St',
            'email' => 'example10@example.com',
            'phone_number' => '333-444-5555',
            'fax' => '666-777-8888',
        ],
        [
            'id' => 11,
            'company_name' => 'BCB808',
            'transaction_name' => 'Transaction K',
            'address' => '808 Elm St',
            'email' => 'example11@example.com',
            'phone_number' => '111-333-5555',
            'fax' => '777-888-9999',
        ],
        [
            'id' => 12,
            'company_name' => 'CDC909',
            'transaction_name' => 'Transaction L',
            'address' => '909 Oak St',
            'email' => 'example12@example.com',
            'phone_number' => '444-555-6666',
            'fax' => '111-222-3333',
        ],
        [
            'id' => 13,
            'company_name' => 'DED010',
            'transaction_name' => 'Transaction M',
            'address' => '010 Maple St',
            'email' => 'example13@example.com',
            'phone_number' => '777-888-9999',
            'fax' => '111-222-3333',
        ],
        [
            'id' => 14,
            'company_name' => 'EFE111',
            'transaction_name' => 'Transaction N',
            'address' => '111 Pine St',
            'email' => 'example14@example.com',
            'phone_number' => '333-444-5555',
            'fax' => '666-777-8888',
        ],
        [
            'id' => 15,
            'company_name' => 'FGF212',
            'transaction_name' => 'Transaction O',
            'address' => '212 Cedar St',
            'email' => 'example15@example.com',
            'phone_number' => '111-333-5555',
            'fax' => '777-888-9999',
        ],
        [
            'id' => 16,
            'company_name' => 'GHG313',
            'transaction_name' => 'Transaction P',
            'address' => '313 Elm St',
            'email' => 'example16@example.com',
            'phone_number' => '444-555-6666',
            'fax' => '111-222-3333',
        ],
        [
            'id' => 17,
            'company_name' => 'HIH414',
            'transaction_name' => 'Transaction Q',
            'address' => '414 Oak St',
            'email' => 'example17@example.com',
            'phone_number' => '777-888-9999',
            'fax' => '111-222-3333',
        ],
        [
            'id' => 18,
            'company_name' => 'IJI515',
            'transaction_name' => 'Transaction R',
            'address' => '515 Maple St',
            'email' => 'example18@example.com',
            'phone_number' => '333-444-5555',
            'fax' => '666-777-8888',
        ],
        [
            'id' => 19,
            'company_name' => 'JKJ616',
            'transaction_name' => 'Transaction S',
            'address' => '616 Pine St',
            'email' => 'example19@example.com',
            'phone_number' => '111-333-5555',
            'fax' => '777-888-9999',
        ],
        [
            'id' => 20,
            'company_name' => 'KLK717',
            'transaction_name' => 'Transaction T',
            'address' => '717 Cedar St',
            'email' => 'example20@example.com',
            'phone_number' => '444-555-6666',
            'fax' => '111-222-3333',
        ],
        [
            'id' => 21,
            'company_name' => 'LML818',
            'transaction_name' => 'Transaction U',
            'address' => '818 Elm St',
            'email' => 'example21@example.com',
            'phone_number' => '777-888-9999',
            'fax' => '111-222-3333',
        ],
        [
            'id' => 22,
            'company_name' => 'MNM919',
            'transaction_name' => 'Transaction V',
            'address' => '919 Oak St',
            'email' => 'example22@example.com',
            'phone_number' => '333-444-5555',
            'fax' => '666-777-8888',
        ],
        [
            'id' => 23,
            'company_name' => 'NON020',
            'transaction_name' => 'Transaction W',
            'address' => '020 Maple St',
            'email' => 'example23@example.com',
            'phone_number' => '111-333-5555',
            'fax' => '777-888-9999',
        ],
        [
            'id' => 24,
            'company_name' => 'OPO121',
            'transaction_name' => 'Transaction X',
            'address' => '121 Pine St',
            'email' => 'example24@example.com',
            'phone_number' => '444-555-6666',
            'fax' => '111-222-3333',
        ],
        [
            'id' => 25,
            'company_name' => 'PQP222',
            'transaction_name' => 'Transaction Y',
            'address' => '222 Cedar St',
            'email' => 'example25@example.com',
            'phone_number' => '111-333-5555',
            'fax' => '777-888-9999',
        ],
        [
            'id' => 26,
            'company_name' => 'QRQ323',
            'transaction_name' => 'Transaction Z',
            'address' => '323 Elm St',
            'email' => 'example26@example.com',
            'phone_number' => '444-555-6666',
            'fax' => '111-222-3333',
        ],
        [
            'id' => 27,
            'company_name' => 'RSR424',
            'transaction_name' => 'Transaction AA',
            'address' => '424 Oak St',
            'email' => 'example27@example.com',
            'phone_number' => '777-888-9999',
            'fax' => '111-222-3333',
        ],
        [
            'id' => 28,
            'company_name' => 'STS525',
            'transaction_name' => 'Transaction BB',
            'address' => '525 Maple St',
            'email' => 'example28@example.com',
            'phone_number' => '333-444-5555',
            'fax' => '666-777-8888',
        ],
        [
            'id' => 29,
            'company_name' => 'TUT626',
            'transaction_name' => 'Transaction CC',
            'address' => '626 Pine St',
            'email' => 'example29@example.com',
            'phone_number' => '111-333-5555',
            'fax' => '777-888-9999',
        ],
        [
            'id' => 30,
            'company_name' => 'UVU727',
            'transaction_name' => 'Transaction DD',
            'address' => '727 Cedar St',
            'email' => 'example30@example.com',
            'phone_number' => '444-555-6666',
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
    public function update(UpdateCustomerRequest $request, string $id)
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
