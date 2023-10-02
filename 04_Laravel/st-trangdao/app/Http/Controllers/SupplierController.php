<?php

namespace App\Http\Controllers;

use App\Http\Requests\Supplier\CreateRequestSupplier;
use App\Http\Requests\Supplier\DeleteRequestSupplier;
use App\Http\Requests\Supplier\UpdateRequestSupplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    private $data = [
        [
            'id' => 1,
            'company_id' => 'VNM',
            'company_name' => 'Công ty sữa Việt Nam',
            'transaction_name' => 'VINAMILK',
            'address' => 'Hà Nội',
            'phone' => '0402891135',
            'fax' => '',
            'email' => 'vinamilk@vietnam.com'
        ],
        [
            'id' => 2,
            'company_id' => 'MVT',
            'company_name' => 'Công ty may mặc Việt Tiến',
            'transaction_name' => 'VIETTIEN',
            'address' => 'Sài Gòn',
            'phone' => '0891808803',
            'fax' => '',
            'email' => 'viettien@vietnam.com'
        ],
        [
            'id' => 3,
            'company_id' => 'SCM',
            'company_name' => 'Siêu thị Coop-mart',
            'transaction_name' => 'COOPMART',
            'address' => 'Quy Nhơn',
            'phone' => '0561888666',
            'fax' => '',
            'email' => 'coopmart@vietnam.com'
        ]
    ];

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $suppliers = $this->data;

        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequestSupplier $request)
    {
        session()->flash('message', 'Successfully created!');

        return redirect()->route('suppliers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        foreach ($this->data as $key => $value) {
            if ($value['id'] == $id) {
                $supplier = $value;
            }
        }

        return view('suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        foreach ($this->data as $key => $value) {
            if ($value['id'] == $id) {
                $supplier = $value;
            }
        }

        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequestSupplier $request, string $id)
    {
        session()->flash('message', 'Successfully updated!');

        return redirect()->route('suppliers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteRequestSupplier $request, string $id)
    {
        session()->flash('message', 'Successfully deleted!');

        return redirect()->route('suppliers.index');
    }
}
