<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function generateUniqueCategoryId()
    {
        do {
            $categoryId = Str::random(2); 

            $existingCategory = Category::where('category_id', $categoryId)->first();
        } while ($existingCategory);

        return $categoryId;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = 10; // Number of records displayed per page

        $categories = Category::paginate($perPage);
    
        return view('admin.category.index', compact('categories'));
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
        // Create a new Category instance
        $category = new Category();

        // Generate a unique category_id
        $uniqueCategoryId = $this->generateUniqueCategoryId();

        // Set the attributes for the new category
        $category->category_id = $uniqueCategoryId;
        $category->category_name = $request->input('category_name');

        // Save the new category to the database
        $category->save();

        return redirect()->route('categories.index');
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
        $category = Category::find($id);

        if (!$category) {
            abort(404);
        }
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $category = Category::find($id);

        if(!$category) {
            abort(404);
        }

        $category->category_name = $request->input('category_name');
        
        $category->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            abort(404);
        }

        $category->delete();

        return redirect()->route('categories.index');
    }
}
