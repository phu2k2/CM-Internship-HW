<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use View;
use App\Http\Requests\CategoriesRequest;

class CategoriesController extends Controller
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

    public function store(Request $res)
    {
        dd($res->all());
    }

    public function edit(string $categoryID)
    {
        $categories = Category::get();
        $editingCategory = Category::findOrFail($categoryID);
        return view("admin.manages.categories.edit" , compact("categories", "editingCategory", "categoryID"));
    }

    public function update(Request $res, string $id)
    {
        dd($res->all());
    }
}
