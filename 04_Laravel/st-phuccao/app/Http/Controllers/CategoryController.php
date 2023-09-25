<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $categoriesData = [
        [
            'category_id' => '01',
            'category_name' => 'Category 1',
            'create_at' => '1/1/2019'
        ],
        [
            'category_id' => '02',
            'category_name' => 'Category 2',
            'create_at' => '1/1/2020'

        ],
        [
            'category_id' => '03',
            'category_name' => 'Category 3',
            'create_at' => '1/1/2021'

        ],
    ];

    public function index()
    {
        $data = $this->categoriesData;
        return view('admin.categories_manage.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories_manage.add_category');
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
        $isEdit = true;
        foreach ($this->categoriesData as $key => $value) {
            if ($value['category_id'] == $id) {
                $category = $value;
            }
        }
        return view('admin.categories_manage.edit_category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
