<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest\CreateSupplierRequest;
use App\Http\Requests\SupplierRequest\DeleteSupplierRequest;
use App\Http\Requests\SupplierRequest\UpdateSupplierRequest;
use App\Models\Supplier;
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
            'phone' => '04-891135',
            'fax' => '',
            'email' => 'vinamilk@vietnam.com'
        ],
        [
            'id' => 2,
            'company_id' => 'MVT',
            'company_name' => 'Công ty may mặc Việt Tiến',
            'transaction_name' => 'VIETTIEN',
            'address' => 'Sài Gòn',
            'phone' => '08-808803',
            'fax' => '',
            'email' => 'viettien@vietnam.com'
        ],
        [
            'id' => 3,
            'company_id' => 'SCM',
            'company_name' => 'Siêu thị Coop-mart',
            'transaction_name' => 'COOPMART',
            'address' => 'Quy Nhơn',
            'phone' => '056-888666',
            'fax' => '',
            'email' => 'coopmart@vietnam.com'
        ],
        [
            'id' => 4,
            'company_id' => 'DQV',
            'company_name' => 'Công ty máy tính Quang Vũ',
            'transaction_name' => 'QUANGVU',
            'address' => 'Quy Nhơn',
            'phone' => '056-888777',
            'fax' => '',
            'email' => 'quangvu@vietnam.com'
        ],
        [
            'id' => 5,
            'company_id' => 'DAF',
            'company_name' => 'Nội thất Đài Loan Dafuco',
            'transaction_name' => 'DAFUCO',
            'address' => 'Quy Nhơn',
            'phone' => '056-888111',
            'fax' => '',
            'email' => 'dafuco@vietnam.com'
        ],
        [
            'id' => 6,
            'company_id' => 'GOL',
            'company_name' => 'Công ty sản xuất dụng cụ học sinh Golden',
            'transaction_name' => 'GOLDEN',
            'address' => 'Quy Nhơn',
            'phone' => '056-891135',
            'fax' => '',
            'email' => 'golden@vietnam.com'
        ],
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::paginate(15);
        return view('supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supplier.create');
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
        foreach ($this->data as $key => $value) {
            if ($value['id'] == $id) {
                $supplier = $value;
            }
        }
        return view('supplier.show', compact('supplier'));
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
        return view('supplier.edit', compact('supplier'));
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
    public function destroy(DeleteSupplierRequest $request, string $id)
    {
        //
    }
}
