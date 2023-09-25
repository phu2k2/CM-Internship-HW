<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private $suppliersList = [
        ['DAF', 'Nội thất Đài Loan Dafuco', 'DAFUCO', 'Quy Nhơn', 'dafuco@vietnam.com', '056-888111', null],
        ['DQV', 'Công ty máy tính Quang Vũ', 'QUANGVU', 'Quy Nhơn', 'quangvu@vietnam.com', '056-888777', null],
        ['GOL', 'Công ty sản xuất dụng cụ học sinh Golden', 'GOLDEN', 'Quy Nhơn', 'golden@vietnam.com', '056-891135', null],
        ['MVT', 'Công ty may mặc Việt Tiến', 'VIETTIEN', 'Sài Gòn', 'viettien@vietnam.com', '08-808803', null],
        ['SCM', 'Siêu thị Coop-mart', 'COOPMART', 'Quy Nhơn', 'coopmart@vietnam.com', '056-888666', null],
        ['VNM', 'Công ty sữa Việt Nam', 'VINAMILK', 'Hà Nội', 'vinamilk@vietnam.com', '04-891135', null]
    ];

    public function convertKeyValue()
    {
        $suppliers = [];
        foreach ($this->suppliersList as $supplier) {
            $suppliers[] = [
                'company_id' => $supplier[0],
                'company_name' => $supplier[1],
                'transaction_name' => $supplier[2],
                'address' => $supplier[3],
                'email' => $supplier[4],
                'phone' => $supplier[5],
                'fax' => $supplier[6],
            ];
        }
        return $suppliers;
    }

    public function index()
    {
        $suppliers = $this->convertKeyValue();
        return view("admin.pages.supplier.suppliers", compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
