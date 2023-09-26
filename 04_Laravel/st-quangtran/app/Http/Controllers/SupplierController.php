<?php

namespace App\Http\Controllers;

use App\Http\Requests\Supplier\StoreSupplierRequest;
use App\Http\Requests\Supplier\UpdateSupplierRequest;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    private $data = [
        [
            'id' => 1,
            'companyId' => 'ABC123',
            'transactionName' => 'Transaction A',
            'address' => '123 Main St',
            'email' => 'example1@example.com',
            'phoneNumber' => '123-456-7890',
            'fax' => '987-654-3210',
        ],
        [
            'id' => 2,
            'companyId' => 'XYZ456',
            'transactionName' => 'Transaction B',
            'address' => '456 Elm St',
            'email' => 'example2@example.com',
            'phoneNumber' => '555-555-5555',
            'fax' => '111-111-1111',
        ],
        [
            'id' => 3,
            'companyId' => 'DEF789',
            'transactionName' => 'Transaction C',
            'address' => '789 Oak St',
            'email' => 'example3@example.com',
            'phoneNumber' => '777-777-7777',
            'fax' => '222-222-2222',
        ],
        [
            'id' => 4,
            'companyId' => 'GHI101',
            'transactionName' => 'Transaction D',
            'address' => '101 Pine St',
            'email' => 'example4@example.com',
            'phoneNumber' => '999-999-9999',
            'fax' => '333-333-3333',
        ],
        [
            'id' => 5,
            'companyId' => 'JKL202',
            'transactionName' => 'Transaction E',
            'address' => '202 Cedar St',
            'email' => 'example5@example.com',
            'phoneNumber' => '444-444-4444',
            'fax' => '555-555-5555',
        ],
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = $this->data;

        return view('admin.supplier.show', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.supplier.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupplierRequest $request)
    {
        return redirect()->route('admin.supplier.index');
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
    public function edit($id)
    {
        $supplier = null;
        foreach ($this->data as $item) {
            if ($item['id'] == $id) {
                $supplier = $item;
                break;
            }
        }
        if (!$supplier) {
            abort(404);
        }

        return view('admin.supplier.update', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, string $id)
    {
        return redirect()->route('admin.customer.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
