<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest\CreateCategoryRequest;
use App\Http\Requests\CategoryRequest\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
    ];

    public function index()
    {
        $categories = $this->data;

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCategoryRequest $request)
    {
        $request->session()->flash('success', 'Add Category successful!');
        
        return redirect()->route('categories.index');
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
        $category = collect($this->data)->where('id', $id)->first();

        if (empty($category)) {
            abort(404);
        }

        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $index = array_search($id, array_column($this->data, 'id'));

        if ($index === false) {
            abort(404);
        }

        $request->session()->flash('success', 'Update Category successful!');

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $index = array_search($id, array_column($this->data, 'id'));

        if ($index === false) {
            abort(404);
        }

        $request->session()->flash('success', 'Delete Category successful!');

        return redirect()->route('categories.index');
    }
}
