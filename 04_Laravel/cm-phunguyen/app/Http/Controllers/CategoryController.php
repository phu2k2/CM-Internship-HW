<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoriesData = [
        [
            'category_id' => 'C1',
            'category_name' => 'Electronics',
            'created_at' => "2023-09-26 10:00:00",
            'updated_at' => "2023-09-26 10:30:00",
        ],
        [
            'category_id' => 'C2',
            'category_name' => 'Clothing',
            'created_at' => "2023-09-26 11:15:00",
            'updated_at' => "2023-09-26 11:45:00",
        ],
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->categoriesData;
        return view('admin/category/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/category/create');
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
        $category = null;
        foreach ($this->categoriesData as $key => $value) {
            if ($value['category_id'] == $id) {
                $category = $value;
                break;
            }
        }
        return view(('admin/category/edit'), compact('category'));
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
