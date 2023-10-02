<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Employee;
use App\Models\Product;
use DB;

class HomeController extends Controller
{
    public function index($question) 
    {
        $str = "cau" . $question;
        return $this->$str();
    }

    function cau1()
    {
        return Supplier::where("company_name" , 'like' , '%' . "Việt Tiến" . '%')->first()->products;
    }

    function cau2() {
        return Supplier::select('company_name', 'address')->distinct()
        ->whereHas('products.category', function ($query) {
            $query->where('category_name', 'Thực phẩm');
        })->get();
    }

    function cau3()
    {
        return Customer::select('company_name', 'transaction_name')->distinct()
        ->whereHas('orders.orderDetails.product' , function ($query) {
            $query->where('product_name' , 'like' , '%' . 'sữa hộp' . '%');
        })->get();
    }

    function cau4()
    {
        $orders = Order::find(1);
        return [
            "KhachHangDatHang" => $orders->customer->company_name,
            "NhanVienLapDon" => $orders->employee->first_name . " " . $orders->employee->last_name,
        ];
    }

    function cau5()
    {
        $employees = Employee::get();
        $exportedData = $employees->map(function ($employee) {
            return [
                'employee_id' => $employee->employee_id,
                'employee_name' => $employee->EmployeeName,
                'salary' => $employee->Salary,
            ];
        });
        return $exportedData;
    }

    function cau6()
    { 
        $orders = OrderDetail::where('invoice_id', 3)->with("product")->get();

        $exportedData = $orders->map(function ($order) {
            return [
                "product_name" => $order->product->product_name,
                "final_price" => $order->amount * ($order->product->price - $order->discount)
            ];
        });

        return $exportedData;
        // return OrderDetail::where('invoice_id', 3)
        //     ->join('products', 'orderdetails.product_id', '=', 'products.product_id')
        //     ->selectRaw(
        //         'products.product_name AS product_name,
        //         (orderdetails.amount * (products.price - orderdetails.discount)) AS final_price'
        //     )
        //     ->get();
    }

    function cau7()
    {
        return Customer::distinct()->join('suppliers', 'customers.transaction_name' , '=' , 'suppliers.transaction_name')->pluck('suppliers.company_name');
    }

    function cau8()
    {
        return Employee::select(DB::raw('GROUP_CONCAT(last_name, " ", first_name SEPARATOR ", ") as employee_names'), 'birthday', DB::raw('COUNT(*) as amount'))
        ->groupBy('birthday')
        ->havingRaw('COUNT(*) > 1')
        ->get();
    }

    function cau9()
    {
        return Order::join('customers', 'customers.id', '=', 'orders.customer_id')
        ->whereColumn('customers.address', '=', 'orders.destination')
        ->select('customers.company_name')
        ->distinct()
        ->get();
    }

    function cau10()
    {
        return Product::leftJoin('orderdetails', 'products.product_id', '=', 'orderdetails.product_id')
        ->whereNull('orderdetails.invoice_id')
        ->select('products.product_name')
        ->get();
    }

    function cau11()
    { 
        return Employee::leftJoin('orders', 'employees.employee_id', '=', 'orders.employee_id')
        ->whereNull('orders.id')
        ->select('*')
        ->get();
    }
}
