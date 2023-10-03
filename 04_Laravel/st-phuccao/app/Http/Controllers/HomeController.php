<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function practice()
    {
        return $this->exciseThree();
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
        \DB::enableQueryLog();

        Supplier::whereHas('products.category', function ($query) {
            $query->where('category_name', 'LIKE', '%Thực phẩm%');
        })
        ->select('company_id', 'company_name', 'address')
        ->get();

        dd(\DB::getQueryLog());

    }

    public function exciseThree()
    {
        // $milk = Product::with('orderdetails')->where('product_name', 'LIKE' ,'%Sữa hộp%')->get();

        // foreach ($milk as $m) {
        //     echo $m->orderdetails->order()."</br>";
        // }
        $customersByProductName = Product::where('product_name','LIKE', '%Sữa hộp%')
            ->firstOrFail()
            ->orderDetails();
            // ->get();
        // // return $milk;
        return $customersByProductName;
    }
}
