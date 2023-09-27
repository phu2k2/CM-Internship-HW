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

    public function store(CreateCategoryRequest $res)
    {
        dd($res->all());
    }

    public function edit(string $categoryID)
    {
        $categories = Category::get();
        $editingCategory = Category::findOrFail($categoryID);
        return view("admin.manages.categories.edit" , compact("categories", "editingCategory", "categoryID"));
    }

    public function update(EditCategoryRequest $res, string $id)
    {
        dd($res->all());
    }

    public function destroy(string $id)
    {
        return redirect()->back()->with('success', 'Delete Category With ID ' . $id . ' Successfully');
    }
}
