<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        for ($i = 0; $i < 10; $i++) {
            $suppliers[] = [
                'id' => rand(1, 1000),
                'company_name' => 'Company ' . $i,
                'transaction_name' => 'Transaction ' . $i,
                'address' => 'Address ' . $i,
                'email' => 'email' . $i . '@example.com',
                'phone' => '123-456-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'fax' => 'Fax ' . $i,
                'created_at' => now()->subDays(rand(1, 365))->format('Y-m-d'),
                'updated_at' => now()->subDays(rand(1, 365))->format('Y-m-d')
            ];
        }

        return view("admin.supplier.index", ['suppliers' => $suppliers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customer.create');
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
    public function edit(int $id)
    {
        return view('admin.customer.edit', ['id' => $id]);
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
    public function destroy(int $id)
    {
        //
    }
}
