<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function practice()
    {
        return $this->exciseSix();
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
        // \DB::enableQueryLog();

        Supplier::whereHas('products.category', function ($query) {
            $query->where('category_name', 'LIKE', '%Thực phẩm%');
        })
        ->select('company_id', 'company_name', 'address')
        ->get();

        // dd(\DB::getQueryLog());

    }

    public function exciseThree()
    {
        // $milk = Product::with('orderdetails')->where('product_name', 'LIKE' ,'%Sữa hộp%')->get();

        // foreach ($milk as $m) {
        //     echo $m->orderdetails->order()."</br>";
        // }
        $customersByProductName = Product::where('product_name','LIKE', '%Sữa hộp%')
            ->firstOrFail()
            ->orderDetails()->with('orders');
            // ->get();
        // // return $milk;
        return $customersByProductName;
    }

    public function exciseFour()
    {
        $order = Order::with(['customer','employee'])->find(1); 
        return [
            'Customer' => $order->customer,
            'Employee' => $order->employee,
            'Delivery Time' => $order->delivery_date,
            'Delivery Location' => $order->destination,
        ];
    }

    public function exciseFive()
    {
        return Employee::selectRaw(
            'id,
            first_name,
            last_name,
            (base_salary + allowance) AS total_salary'
        )
        ->get();
    }

    public function exciseSix()
    {
        $orderNumber = 3;

        $orderDetails = OrderDetail::with('product')->find($orderNumber);
        return $orderDetails;
    }

    public function exciseSeven()
    {
        $partners = Customer::select('company_name')
        ->whereIn('transaction_name', function ($query) {
            $query->select('transaction_name')
                ->from('suppliers');
        })
        ->get();
    }
}
