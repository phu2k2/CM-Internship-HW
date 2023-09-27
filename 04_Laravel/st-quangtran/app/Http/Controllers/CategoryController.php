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
            'category_id' => 'cat001',
            'category_name' => 'Category A',
        ],
        [
            'id' => 2,
            'category_id' => 'cat002',
            'category_name' => 'Category B',
        ],
        [
            'id' => 3,
            'category_id' => 'cat003',
            'category_name' => 'Category C',
        ],
        [
            'id' => 4,
            'category_id' => 'cat004',
            'category_name' => 'Category D',
        ],
        [
            'id' => 5,
            'category_id' => 'cat005',
            'category_name' => 'Category E',
        ],
        [
            'id' => 6,
            'category_id' => 'cat006',
            'category_name' => 'Category F',
        ],
        [
            'id' => 7,
            'category_id' => 'cat007',
            'category_name' => 'Category G',
        ],
    ];

    public function index()
    {
        $categories = $this->data;

        return view('admin.category.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        return redirect()->route('categories.index');
    }

    public function show(string $id)
    {
    }

    public function edit(int $id)
    {
        foreach ($this->data as $key => $value) {
            if ($value['id'] == $id) {
                $category = $value;
            }
        }

        return view('admin.category.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, string $id)
    {
    }

    public function destroy(DeleteCategoryRequest $request, string $id)
    {
    }
}
