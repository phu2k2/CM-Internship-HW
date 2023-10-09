<?php

namespace App\Http\Controllers;

use App\Http\Requests\Suppliers\CreateSupplierRequest;
use App\Http\Requests\Suppliers\UpdateSupplierRequest;

class SupplierController extends Controller
{
    private $suppliersData = [
        [
            'id' => 1,
            'company_id' => 'C001',
            'company_name' => 'ABC Corporation',
            'transaction_name' => 'Sales',
            'address' => '123 Main Street',
            'phone' => '+1 (555) 123-4567',
            'fax' => '+1 (555) 987-6543',
            'email' => 'abc@example.com',
            'created_at' => "2023-09-26 10:00:00",
            'updated_at' => "2023-09-26 10:30:00",
        ],
        [
            'id'=> 2,
            'company_id' => 'C002',
            'company_name' => 'XYZ Enterprises',
            'transaction_name' => 'Marketing',
            'address' => '456 Elm Street',
            'phone' => '+1 (555) 789-0123',
            'fax' => '+1 (555) 567-8901',
            'email' => 'xyz@example.com',
            'created_at' => "2023-09-26 11:15:00",
            'updated_at' => "2023-09-26 11:45:00",
        ],
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->suppliersData;
        return view('admin/supplier/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/supplier/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateSupplierRequest $request)
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
        $supplier = null;
        foreach ($this->suppliersData as $key => $value) {
            if ($value['id'] == $id) {
                $supplier = $value;
                break;
            }
        }
        return view(('admin/supplier/edit'), compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, string $id)
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
