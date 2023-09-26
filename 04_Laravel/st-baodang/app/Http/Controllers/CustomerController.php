<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest\DeleteCustomerRequest;
use App\Http\Requests\CustomerRequest\StoreCustomerRequest;
use App\Http\Requests\CustomerRequest\UpdateCustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = DB::table('customers')->get();

        return view('sections.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sections.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        $isStored = DB::table('customers')->insert([
            'company_name' => $request->input('company_name'),
            'transaction_name' => $request->input('transaction_name'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'fax' => $request->input('fax')
        ]);

        if ($isStored) {
            session()->flash('success', 'Đã thêm dữ liệu thành công');
        }

        return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = DB::table('customers')->where('id', $id)->first();

        return view('sections.customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = DB::table('customers')->where('id', $id)->first();

        return view('sections.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, string $id)
    {
        DB::table('customers')->where('id', $id)->update([
            'company_name' => $request->input('company_name'),
            'transaction_name' => $request->input('transaction_name'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'fax' => $request->input('fax')
        ]);

        return redirect()->route('customer.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteCustomerRequest $request, string $id)
    {
        $records = DB::table('customers')->delete($id);
        if ($records) {
            session()->flash('success', 'Đã xóa dữ liệu thành công');
        }

        return redirect()->route('customer.index');
    }
}
