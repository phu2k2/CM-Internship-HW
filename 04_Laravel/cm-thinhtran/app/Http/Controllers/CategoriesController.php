<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    private $categoryList = [
        ['TP', 'Thực phẩm' ],
        ['DT', 'Ðiện tử' ],
        ['MM', 'May mặc' ],
        ['NT', 'Nội thất' ],
        ['DC', 'Dụng cụ học tập' ]
    ];

    public function convertKeyValue()
    {
        $categories = [];
        foreach ($this->categoryList as $category) {
            $categories[] = [
                'category_id' => $category[0],
                'category_name' => $category[1]
            ];
        }
        return $categories;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = $this->convertKeyValue();
        return view("admin.pages.category.categories", compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
