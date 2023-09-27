<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
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
        return view('admin.category.index', ['categories' => $this->categoriesData]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
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
        foreach ($this->categoriesData as $key => $value) {
            if ($value['category_id'] == $id) {
                $category = $value;
            }
        }
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        foreach ($this->categoriesData as $key => $value) {
            if ($value['category_id'] === $id) {
                unset($this->categoriesData[$key]);
            }
        }
        return redirect()->route('categories.index');
    }
}
