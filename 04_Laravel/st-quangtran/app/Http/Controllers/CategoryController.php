<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $data = [
        [
            'id' => 1,
            'categoryId' => 'cat001',
            'categoryName' => 'Category A',
        ],
        [
            'id' => 2,
            'categoryId' => 'cat002',
            'categoryName' => 'Category B',
        ],
        [
            'id' => 3,
            'categoryId' => 'cat003',
            'categoryName' => 'Category C',
        ],
        [
            'id' => 4,
            'categoryId' => 'cat004',
            'categoryName' => 'Category D',
        ],
        [
            'id' => 5,
            'categoryId' => 'cat005',
            'categoryName' => 'Category E',
        ],
        [
            'id' => 6,
            'categoryId' => 'cat006',
            'categoryName' => 'Category F',
        ],
        [
            'id' => 7,
            'categoryId' => 'cat007',
            'categoryName' => 'Category G',
        ],
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->data;
        return view("admin.category.show", compact("categories"));
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
    public function edit(string $id)
    {
        $category = null;
        foreach ($this->data as $item) {
            if ($item['id'] == $id) {
                $category = $item;
                break;
            }
        }
        if (!$category) {
            abort(404);
        }
        return view('admin.category.update', compact('category'));
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
        //
    }
}
