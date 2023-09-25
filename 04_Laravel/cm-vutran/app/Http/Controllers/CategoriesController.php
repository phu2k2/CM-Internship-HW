<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

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
        // Add more rows as needed
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
    public function update(Request $request, string $id)
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
