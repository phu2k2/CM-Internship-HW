<?php

namespace App\Http\Controllers;

use App\Http\Resources\SupplierResource;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierApiController extends Controller
{
    public function suppliersWithProducts()
    {
        return SupplierResource::collection(Supplier::with('products')->get());
    }
}
