<?php

namespace App\Http\Controllers;

use App\Http\Requests\Supplier\DeleteSupplierRequest;
use App\Http\Requests\Supplier\StoreSupplierRequest;
use App\Http\Requests\Supplier\UpdateSupplierRequest;
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

    public function index()
    {
        $suppliers = $this->data;

        return view('admin.supplier.index', ['suppliers' => $suppliers]);
    }

    public function create()
    {
        return view('admin.supplier.create');
    }

    public function store(StoreSupplierRequest $request)
    {
        return redirect()->route('admin.supplier.index');
    }

    public function show(string $id)
    {
    }

    public function edit(int $id)
    {
        foreach ($this->data as $key => $value) {
            if ($value['id'] == $id) {
                $supplier = $value;
            }
        }

        return view('admin.supplier.edit', compact('supplier'));
    }

    public function update(UpdateSupplierRequest $request, string $id)
    {
    }

    public function destroy(DeleteSupplierRequest $request, string $id)
    {
    }
}
