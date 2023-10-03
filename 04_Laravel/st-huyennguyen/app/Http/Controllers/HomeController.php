<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Employee;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Product;
use App\Models\Supplier;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function practice($id)
    {
        match ($id) {
            '1' => $this->exercise1(),
            '2' => $this->exercise2(),
            '3' => $this->exercise3(),
            '4' => $this->exercise4(),
            '5' => $this->exercise5(),
            '6' => $this->exercise6(),
            '7' => $this->exercise7(),
            '8' => $this->exercise8(),
            '9' => $this->exercise9(),
            '10' => $this->exercise10(),
            '11' => $this->exercise11(),
            default => dump("Not found exercise")
        };
        die();
    }

    public function exercise1()
    {
        // 1. Công ty Việt Tiến đã cung cấp những mặt hàng nào?
        $companyName = 'Việt Tiến';
        /**
         * Solution: scopeWhereCompanyName
         */
        $suppliers = Supplier::with('products:id,company_id,product_name')
                                ->companyName($companyName)->get();

        foreach ($suppliers as $supplier) {
            dump('Company: ' . $supplier->company_name);
            foreach ($supplier->products as $product) {
                dump($product->product_name);
            }
        }
    }

    public function exercise2()
    {
        // 2. Loại hàng thực phẩm do những công ty nào cung cấp, địa chỉ của công ty đó?
        /**
         * Solution: whereHas
         * retrieve all suppliers name that have at least one product
         * that has category where category name equal $categoryName
         */
        $categoryName = 'Thực phẩm';
        $suppliers = Supplier::distinct()
                                ->whereHas('products.category', fn ($query) => (
                                    $query->categoryName($categoryName)))
                                ->select('company_name', 'address')
                                ->get();

        foreach ($suppliers as $supplier) {
            dump($supplier->company_name . ' - address: ' . $supplier->address);
        }
    }

    public function exercise3()
    {
        // 3. Những khách hàng nào (tên giao dịch) đã đặt mua mặt hàng sữa hộp của công ty?
        /**
         * Solution:
         * First, retrieve all order that have product like Sữa hộp into orderdetail
         * And then, relationship with customers table
         */
        $productName = 'Sữa hộp';
        $orders = Order::whereHas('products', fn ($query) => (
                            $query->productName($productName)))
                        ->with('customer:id,transaction_name')
                        ->get();

        foreach ($orders as $order) {
            dump($order->customer->transaction_name);
        }
    }

    public function exercise4()
    {
        // 4. Đơn đặt hàng số 1 do ai đặt và do nhân viên nào lập, thời gian và địa điểm giao hàng là ở đâu?
        /**
         * Solution:
         * Relationship with customers and employees table
         * scopeOfOrder with order have id equal $orderId
         * accessors getFullNameAttribute
         */
        $orderId = 1;
        $order = Order::with(['customer:id,transaction_name',
                                'employee:id,employee_id,last_name,first_name'])
                        ->ofOrder($orderId);

        $delivery_date = Carbon::parse($order->delivery_date)->format('H:i:s d/m/Y');
        dump($order->customer->transaction_name . '  - ' . $order->employee->full_name);
        dump($delivery_date . ' - ' . $order->destination);
    }

    public function exercise5()
    {
        // 5. Hãy cho biết số tiền lương mà công ty phải trả cho mỗi nhân viên là bao nhiêu
            // (lương=lương cơ bản+phụ cấp)?
        /**
         * retrieve all employees
         * return Salary: accessors getSalaryAttribute
        */
        $employees = Employee::select('employee_id', 'last_name', 'first_name', 'base_salary', 'allowance')->get();

        foreach ($employees as $employee) {
            dump($employee->employee_id . ' - ' . $employee->full_name . ': ' . number_format($employee->salary));
        }
    }

    public function exercise6()
    {
        // 6. Trong đơn đặt hàng số 3 đặt mua những mặt hàng nào và số tiền mà khách hàng
            // phải trả cho mỗi mặt hàng là bao nhiêu
            // (số tiền phải trả=số lượng x giá bán – số lượng x mức giảm giá)?
        /**
         * First: retrieve all order detail that have invoice_id = 3
         * And then, loops order detail and show information: product name and price total
         * Price for each product: accessors getPriceTotalAttribute
         */
        $orderId = 3;
        $order = Order::with('products:id,product_id,product_name')
                                ->ofOrder($orderId);

        foreach ($order->products as $product) {
            dump($product->product_name . ', price: ' . number_format($product->price_total));
        }
    }

    public function exercise7()
    {
        // 7. Hãy cho biết có những khách hàng nào lại chính là đối tác cung cấp hàng cho công ty?
            // (tức là có cùng tên giao dịch)
        /**
         * Solution 1: join table
         */
        $companies = Customer::joinSuppliers()
                                ->select('customers.transaction_name')
                                ->get();

        foreach ($companies as $company) {
            dump($company->transaction_name);
        }

        /**
         * Solution 2: subquery
         */
        $suppliers = Supplier::select('transaction_name')->get();
        $companies = Customer::select('transaction_name')
                                ->whereIn('transaction_name', $suppliers)
                                ->get();

        foreach ($companies as $company) {
            dump($company->transaction_name);
        }
    }

    public function exercise8()
    {
        // 8. Trong công ty có những nhân viên nào có cùng ngày tháng năm sinh?
        $employees = Employee::select('birthday')
                                ->selectRaw('GROUP_CONCAT(last_name, " " , first_name separator ", ") AS list_employees')
                                ->groupBy('birthday')
                                ->havingRaw('count(birthday) > 1')
                                ->orderBy('birthday')
                                ->get();

        foreach ($employees as $employee) {
            dump($employee->birthday . ' ' . $employee->list_employees);
        }
    }

    public function exercise9()
    {
        // 9. Những đơn hàng nào yêu cầu giao hàng ngay tại công ty đặt hàng và những đơn đó là của công ty nào?
        /**
         * whereHas: retrieve all order that have destination like address customer.
         */
        $orders = Order::whereHas('customer', fn ($query) => (
                            $query->whereRaw('orders.destination = customers.address')))
                        ->with('customer:id,transaction_name')
                        ->get();

        foreach ($orders as $order) {
            dump('Order ID: ' . $order->id . ', customer: ' . $order->customer->transaction_name . ' ');
        }
    }

    public function exercise10()
    {
        // 10. Những mặt hàng nào chưa từng được khách hàng đặt mua?
        /**
         * doesnHave('orders'): retrieve all products that don't have any orders.
         */
        $products = Product::doesntHave('orders')
                            ->select('product_id', 'product_name')
                            ->get();

        foreach ($products as $product) {
            dump($product->product_id . ' - ' . $product->product_name);
        }
    }

    public function exercise11()
    {
        // 11. Những nhân viên nào của công ty chưa từng lập hóa đơn đặt hàng nào?
        /**
         * doesnHave('orders'): retrieve all employees that don't have any orders.
         */
        $employees = Employee::doesntHave('orders')
                                ->select('employee_id', 'last_name', 'first_name')
                                ->get();

        foreach ($employees as $employee) {
            dump($employee->employee_id . ': ' . $employee->full_name);
        }
    }
}
