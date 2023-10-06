<?php

namespace App\Http\Controllers;

use App\Http\Requests\Categories\UpdateCategoryRequest;
use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();

        return view('admin/category/index', compact('categories'));
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
    public function store(CreateCategoryRequest $request)
    {
        Category::create([
            'category_id' => $request->category_id,
            'category_name' => $request->category_name
        ]);

        return redirect(route('categories.index'));
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
        $category = Category::findOrFail($id);

        return view('admin/category/edit', compact('category'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $category = Category::findOrFail($id);
        $category->update([
            'category_id' => $request->category_id,
            'category_name' => $request->category_name
        ]);

        return redirect()->route('categories.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        session()->flash('status', 'Delete success!');

        return redirect()->route('categories.index');
    }
}
