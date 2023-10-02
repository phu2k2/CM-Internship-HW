<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $data = [
        [
            'id' => 1,
            'category_id' => 'TP',
            'category_name' => 'Thực phẩm',
        ],
        [
            'id' => 2,
            'category_id' => 'DT',
            'category_name' => 'Ðiện tử',
        ],
        [
            'id' => 3,
            'category_id' => 'MM',
            'category_name' => 'May mặc',
        ]
    ];

    /**
     * Display a listing of the resource.
     */
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        foreach ($this->data as $key => $value) {
            if ($value['id'] == $id) {
                $category = $value;
            }
        }

        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        foreach ($this->data as $key => $value) {
            if ($value['id'] == $id) {
                $category = $value;
            }
        }

        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}