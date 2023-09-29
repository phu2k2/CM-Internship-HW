<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Employee;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function practice()
    {
        // Công ty Việt Tiến đã cung cấp những mặt hàng nào?
        $companyName = 'Việt Tiến';
        $suppliers = Supplier::with('products')->where('company_name', 'like', '%' . $companyName . '%')->get();

        // Loại hàng thực phẩm do những công ty nào cung cấp, địa chỉ của công ty đó?
        $categoryName = 'Thực phẩm';
        $suppliers = Product::distinct()->joinSuppliers()->joinCategories()
                                ->select('suppliers.company_name')
                                ->where('category_name', $categoryName)
                                ->get();

        // Những khách hàng nào (tên giao dịch) đã đặt mua mặt hàng sữa hộp của công ty?
        $productName = 'Sữa hộp';
        $customers = Order::joinOrderDetails()->joinCustomers()->joinProducts()
                            ->select('customers.transaction_name')
                            ->where('products.product_name', 'like', '%' . $productName . '%')
                            ->get();

        // Đơn đặt hàng số 1 do ai đặt và do nhân viên nào lập, thời gian và địa điểm giao hàng là ở đâu?
        $orderId = 1;
        $order = Order::joinCustomers()->joinEmployees()
                        ->select('customers.transaction_name', 'employees.*', 'orders.*')
                        ->where('orders.id', $orderId)->first();

        // Hãy cho biết số tiền lương mà công ty phải trả cho mỗi nhân viên là bao nhiêu (lương=lương cơ bản+phụ cấp)?
        $employees = Employee::all();
        foreach ($employees as $employee) {
            $employee->full_name = $employee->last_name . ' ' . $employee->first_name;
            $employee->salary = $employee->base_salary + $employee->allowance;
        }

        // Trong đơn đặt hàng số 3 đặt mua những mặt hàng nào và số tiền mà khách hàng
            // phải trả cho mỗi mặt hàng là bao nhiêu
            // (số tiền phải trả=số lượng x giá bán – số lượng x mức giảm giá)?
        $orderId = 3;
        $order = Orderdetail::with('product')->where('invoice_id', $orderId)->get();

        // Hãy cho biết có những khách hàng nào lại chính là đối tác cung cấp hàng
        $companies = Customer::join('suppliers', 'suppliers.transaction_name', 'customers.transaction_name')
                            ->select('customers.transaction_name')->get();

        // Trong công ty có những nhân viên nào có cùng ngày tháng năm sinh?
        $employees = Employee::selectRaw('birthday, group_concat(last_name," ",first_name separator ", ") as list_employees')
                                ->groupBy('birthday')->havingRaw('count(birthday) > 1')->orderBy('birthday')
                                ->get();

        // Những đơn hàng nào yêu cầu giao hàng ngay tại công ty đặt hàng và những đơn đó là của công ty nào?
        $customers = Order::joinCustomers()->whereRaw('orders.destination = customers.address')->get();

        // Những mặt hàng nào chưa từng được khách hàng đặt mua?
        $products = Product::leftJoin('orderdetails', 'orderdetails.product_id', 'products.product_id')
                            ->whereNull('orderdetails.product_id')->get();

        // Những nhân viên nào của công ty chưa từng lập hóa đơn đặt hàng nào?
        $employees = Employee::leftJoin('orders', 'orders.employee_id', 'employees.employee_id')
                                ->whereNull('orders.employee_id')->get();
    }
}
