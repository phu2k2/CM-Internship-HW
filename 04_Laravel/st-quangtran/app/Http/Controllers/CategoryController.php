<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        for ($i = 0; $i < 10; $i++) {
            $categories[] = [
                'id' => $i + 1,
                'category_id' => rand(1, 1000),
                'category_name' => 'Category ' . $i,
                'created_at' => now()->subDays(rand(1, 365))->format('Y-m-d'),
                'updated_at' => now()->subDays(rand(1, 365))->format('Y-m-d'),
            ];
        }

        return view("admin.category.index", ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.category.create");
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
        return view("admin.category.edit", ['id' => $id]);
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
