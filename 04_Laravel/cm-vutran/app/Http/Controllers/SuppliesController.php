<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplieRequest\CreateSupplieRequest;
use App\Http\Requests\SupplieRequest\UpdateSupplieRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SuppliesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplies = Supplier::get();
        
        return view('supplies.index', compact('supplies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supplies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateSupplieRequest $request)
    {
        $validatedData = $request->validated();
        $supplie = new Supplier();
        $supplie->create($validatedData);

        $request->session()->flash('success', 'Add Supply successful!');
        
        return redirect()->route('supplies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $Id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $supplie = Supplier::find($id);

        if (!$supplie) {
            abort(404);
        }

        return view('supplies.edit', compact('supplie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplieRequest $request, string $id)
    {
        $supplie = Supplier::find($id);

        if (!$supplie) {
            abort(404);
        }

        $validatedData = $request->validated();
        $supplie->update($validatedData);

        $request->session()->flash('success', 'Update Supply successful!');

        return redirect()->route('supplies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $supplie = Supplier::find($id);

        if (!$supplie) {
            abort(404);
        }

        $supplie->delete();

        $request->session()->flash('success', 'Delete Supply successful!');

        return redirect()->route('supplies.index');
    }
}
