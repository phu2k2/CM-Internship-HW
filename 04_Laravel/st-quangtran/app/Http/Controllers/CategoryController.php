<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\DeleteCategoryRequest;
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

    public function index()
    {
        $categories = $this->data;
        return view("admin.category.index", ['categories' => $categories]);
    }

    public function create()
    {
        return view("admin.category.create");
    }

    public function store(StoreCategoryRequest $request)
    {
    }

    public function show(string $id)
    {
    }

    public function edit(int $id)
    {
        return view("admin.category.edit", ['id' => $id]);
    }

    public function update(UpdateCategoryRequest $request, string $id)
    {
    }

    public function destroy(DeleteCategoryRequest $request, string $id)
    {
    }
}
