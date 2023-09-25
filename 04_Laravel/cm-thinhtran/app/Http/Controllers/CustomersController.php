<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private $customerList = [
        [1, 'Công ty sữa Việt Nam', 'VINAMILK', 'Hà Nội', 'vinamilk@vietnam.com', '04-891135', ''],
        [2, 'Công ty may mặc Việt Tiến', 'VIETTIEN', 'Sài Gòn', 'viettien@vietnam.com', '08-808803', ''],
        [3, 'tổng công ty thực phẩm dinh dưỡng NUTIFOOD', 'NUTIFOOD', 'Sài Gòn', 'nutifood@vietnam.com', '08-809890', ''],
        [4, 'Công ty điện máy Hà Nội', 'MACHANOI', 'Hà Nội', 'machanoi@vietnam.com', '04-898399', ''],
        [5, 'Hãng hàng không Vietnam Airlines', 'VIETNAMAIRLINE', 'Sài Gòn', 'vietnamairline@vietnam.com', '08-888888', ''],
        [6, 'Công ty dụng cụ học sinh MIC', 'MIC', 'Hà Nội', 'mic@vietnam.com', '04-804408', '']
    ];

    public function convertKeyValue()
    {
        $customers = [];
        foreach ($this->customerList as $customer) {
            $customers[] = [
                'id' => $customer[0],
                'company_name' => $customer[1],
                'short_name' => $customer[2],
                'city' => $customer[3],
                'email' => $customer[4],
                'phone' => $customer[5],
                'other_info' => $customer[6]
            ];
        }
        return $customers;
    }

    public function index()
    {
        $customers = $this->convertKeyValue();
        return view("admin.pages.customer.customers", compact('customers'));
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
        $customers = $this->convertKeyValue();
        $customers[] = [
            'id' => $request->input('id'),
            'company_name' => $request->input('company_name'),
            'short_name' => $request->input('short_name'),
            'city' => $request->input('city'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'other_info' => $request->input('other_info')
        ];
        // dd($customers);
        // array_push($customers, $newCustomer);
        return view("admin.pages.customer.customers", compact('customers'));
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
        $customers = $this->convertKeyValue();
        foreach ($customers as $editCustomer) {
            if ((int)$editCustomer['id'] === (int)$id) {
                return view("admin.pages.customer.edit", compact('editCustomer'));
            }
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customers = $this->convertKeyValue();
        foreach ($customers as $updateCustomer) {
            if ((int)$updateCustomer['id'] === (int)$id) {
                $updateCustomer = [
                    'id' => $request->input('id'),
                    'company_name' => $request->input('company_name'),
                    'short_name' => $request->input('short_name'),
                    'city' => $request->input('city'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'other_info' => $request->input('other_info')
                ];
                return view("admin.pages.customer.edit", compact('updateCustomer'));
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
