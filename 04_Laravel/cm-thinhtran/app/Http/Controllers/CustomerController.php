<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $customers = [
        [
            'id' => 1,
            'company_name' => 'ABC123',
            'short_name' => 'Transaction A',
            'city' => '123 Main St',
            'email' => 'example1@example.com',
            'phone' => '123-456-7890',
            'other_info' => '987-654-3210',
        ],
        [
            'id' => 2,
            'company_name' => 'XYZ456',
            'short_name' => 'Transaction B',
            'city' => '456 Elm St',
            'email' => 'example2@example.com',
            'phone' => '555-555-5555',
            'other_info' => '111-111-1111',
        ],
        [
            'id' => 3,
            'company_name' => 'DEF789',
            'short_name' => 'Transaction C',
            'city' => '789 Oak St',
            'email' => 'example3@example.com',
            'phone' => '777-777-7777',
            'other_info' => '222-222-2222',
        ],
        [
            'id' => 4,
            'company_name' => 'GHI101',
            'short_name' => 'Transaction D',
            'city' => '101 Pine St',
            'email' => 'example4@example.com',
            'phone' => '999-999-9999',
            'other_info' => '333-333-3333',
        ],
        [
            'id' => 5,
            'company_name' => 'JKL202',
            'short_name' => 'Transaction E',
            'city' => '202 Cedar St',
            'email' => 'example5@example.com',
            'phone' => '444-444-4444',
            'other_info' => '555-555-5555',
        ],
        [
            'id' => 6,
            'company_name' => 'MNO303',
            'short_name' => 'Transaction F',
            'city' => '303 Birch St',
            'email' => 'example6@example.com',
            'phone' => '666-666-6666',
            'other_info' => '777-777-7777',
        ],
    ];

    /**
     * Display a listing of the resource.
     */
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
    public function store(Request $request)
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
