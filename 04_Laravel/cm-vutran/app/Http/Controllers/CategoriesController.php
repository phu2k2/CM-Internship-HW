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
        //
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
    public function edit(string $Id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $Id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $Id)
    {
        //
    }
}
