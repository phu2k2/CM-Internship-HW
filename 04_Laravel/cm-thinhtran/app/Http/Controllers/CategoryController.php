<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    private $categories = [
        [ 'category_id' => 'TP',
          'category_name' => 'Thực phẩm' ],
        [ 'category_id' => 'DT',
          'category_name' => 'Ðiện tử' ],
        [ 'category_id' => 'MM',
          'category_name' => 'May mặc' ],
        [ 'category_id' => 'NT',
          'category_name' => 'Nội thất' ],
        [ 'category_id' => 'DC',
          'category_name' => 'Dụng cụ học tập' ]
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->categories;
        return view("admin.pages.category.index", compact('categories'));
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
    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();
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
        $categories = $this->categories;
        foreach ($categories as $category) {
            if ((int)$category['category_id'] === (int)$id) {
                return view("admin.pages.category.edit", compact('category'));
            }
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $validated = $request->validated();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
