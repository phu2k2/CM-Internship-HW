<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use View;
use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\Categories\EditCategoryRequest;

class CategoryController extends Controller
{
    public function __construct()
    {
        View::share('pageTitle', 'Quản lý danh mục');
    }

    public function index()
    {
        $categories = Category::get();
        return view("admin.manages.categories.index" , compact("categories"));
    }

    public function store(CreateCategoryRequest $req)
    {
        $category = Category::create($req->except("_token"));
        if ($category) {
            return redirect()->back()->with('success', 'Category created successfully');
        } else {
            return redirect()->back()->withError('Category creation failed');
        }
    }

    public function edit(string $categoryID)
    {
        $categories = Category::get();
        $editingCategory = Category::findOrFail($categoryID);
        return view("admin.manages.categories.edit" , compact("categories", "editingCategory"));
    }

    public function update(EditCategoryRequest $req, string $id)
    {
        if(Category::find($id)->update($req->except("_token" , "_method"))) {
            return redirect()->back()->with('success', 'Edit category successfully');
        } else {
            return redirect()->back()->withError('Editing category failed');
        }
    }

    public function destroy(string $id)
    {
        return redirect()->back()->with('success', 'Delete Category With ID ' . $id . ' Successfully');
    }
}
