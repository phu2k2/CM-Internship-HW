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
        ],
        [
            'id' => 4,
            'category_id' => 'NT',
            'category_name' => 'Nội thất',
        ],
        [
            'id' => 5,
            'category_id' => 'DC',
            'category_name' => 'Dụng cụ học tập',
        ],
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->data;
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        return view('category.edit', compact('category'));

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