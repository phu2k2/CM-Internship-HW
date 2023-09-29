<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'orders';

    protected $fillable = [
        'customer_id',
        'employee_id',
        'order_date',
        'delivery_date',
        'shipping_date',
        'destination',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }

    public function orderDetails(): HasMany
    {
        return $this->hasMany(Orderdetail::class, 'invoice_id', 'id');
    }

    /**
     * Scope a query to join customers table.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeJoinCustomers($query)
    {
        return $query->join('customers', 'customers.id', 'orders.customer_id');
    }

    /**
     * Scope a query to join employees table.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeJoinEmployees($query)
    {
        return $query->join('employees', 'employees.employee_id', 'orders.employee_id');
    }

    /**
     * Scope a query to join orderdetails table.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeJoinOrderDetails($query)
    {
        return $query->join('orderdetails', 'orderdetails.invoice_id', 'orders.id');
    }

    /**
     * Scope a query to join orderdetails table.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeJoinProducts($query)
    {
        return $query->join('products', 'products.product_id', 'orderdetails.product_id');
    }

    /**
     * Scope a query to only include users of a given type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $order_id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfOrder($query, $order_id)
    {
        return $query->where('orders.id', $order_id);
    }
}
