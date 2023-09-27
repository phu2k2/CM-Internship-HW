<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest\DeleteCategoryRequest;
use App\Http\Requests\CategoryRequest\StoreCategoryRequest;
use App\Http\Requests\CategoryRequest\UpdateCategoryRequest;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = DB::table('categories')->get();

        return view('sections.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sections.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $isStored = DB::table('categories')->insert([
            'category_id' => $request->input('category_id'),
            'category_name' => $request->input('category_name')
        ]);
        if ($isStored) {
            session()->flash('status', 'Đã thêm dữ liệu thành công');
        }

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = DB::table('categories')->where('id', $id)->first();

        return view('sections.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = DB::table('categories')->where('id', $id)->first();

        return view('sections.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        DB::table('categories')
            ->where('id', $id)
            ->update([
                'category_id' => $request->input('category_id'),
                'category_name' => $request->input('category_name')
            ]);

        return redirect()->route('categories.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteCategoryRequest $request, string $id)
    {
        $records = DB::table('categories')->delete($id);
        if ($records) {
            session()->flash('status', 'Đã xóa dữ liệu thành công');
        }

        return redirect()->route('categories.index');
    }
}
