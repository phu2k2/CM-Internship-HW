<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private function generateUniqueCategoryId()
    {
        do {
            $categoryId = Str::upper(Str::random(2));
            $existingCategory = Category::where('category_id', $categoryId)->first();
        } while ($existingCategory);

        return $categoryId;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Number of records displayed per page
        $perPage = 10;

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
        try {
            // Create a new Category instance
            $category = new Category();
    
            // Set the attributes for the new category
            $category->category_id = $this->generateUniqueCategoryId();
            $category->category_name = $request->input('category_name');
    
            // Save the new category to the database
            $category->save();
    
            return redirect()->route('categories.create')->with('success', 'Successfully added category!');
        } catch (Exception $e) {
            return redirect()->route('categories.create')->with('error', 'An error occurred while adding category!');
        }
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
        try {
            $category = Category::findOrFail($id);

            return view('admin.category.edit', compact('category'));
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->category_name = $request->input('category_name');

            $category->save();

            return redirect()->route('categories.edit', $category->id)->with('success', 'Updated category information successfully!');
        } catch (Exception $e) {
            return redirect()->route('categories.edit', $id)->with('error', 'Updating category information failed, Please try again!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
    
            return redirect()->route('categories.index')->with('success', 'Category has been deleted successfully!');;
        } catch (ModelNotFoundException $e) {
            return redirect()->route('categories.index')->with('error', 'Failed to delete category. An error occurred. Please try again!');;
        }
    }
}
