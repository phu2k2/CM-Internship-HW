<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function practice()
    {
        return $this->exciseTwo();
    }

    public function exciseOne()
    {
        return Supplier::where('company_name', 'Công ty may mặc Việt Tiến')
            ->first()
            ->products
            ->pluck('product_id', 'product_name');
    }

    public function exciseTwo()
    {
        // $foodSuppliers = Product::whereHas('category', function ($query) {
        //     $query->where('category_id', '=', 'VB');
        // })->with('supplier')->distinct()->get();
        $foodCategory = Category::where('category_id', 'VB')->first()->products;
        // $foodProducts = $foodCategory->products;
        // Tìm tất cả các nhà cung cấp của các sản phẩm thực phẩm
        // $foodSuppliers = $foodCategory->map(function ($product) {
        //     return $product->supplier;
        // })->unique();
        $foodSuppliers = Product::with(['category', 'supplier'])
        ->where('category_id', 'TP')
        ->select('supplier.company_id', 'supplier.company_name')
        ->get();
        return $foodSuppliers;
    }
}
