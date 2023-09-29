<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CreateRequestCategory;
use App\Http\Requests\Category\DeleteRequestCategory;
use App\Http\Requests\Category\UpdateRequestCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

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
    public function store(CreateRequestCategory $request)
    {

        $category = Category::create($request->validated());
        if ($category) {
            session()->flash('message', 'Successfully created!');
        } else {
            session()->flash('error', 'New creation failed!');
        }

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);

        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);

        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequestCategory $request, string $id)
    {
        $category = Category::find($id);
        if (!$category) {
            session()->flash('error', 'Data not found!');
            return redirect()->route('categories.index');
        }

        $category->update($request->validated());

        if ($category->wasChanged()) {
            session()->flash('message', 'Successfully updated!');
        } else {
            session()->flash('error', 'No changes made.');
        }

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteRequestCategory $request, string $id)
    {
        $category = Category::find($id);
        if (!$category) {
            session()->flash('error', 'Data not found!');
            return redirect()->route('categories.index');
        }
        if ($category->delete($id)) {
            session()->flash('message', 'Successfully deleted!');
        } else {
            session()->flash('error', 'Deleted failed!');
        }

        return redirect()->route('categories.index');
    }
}
