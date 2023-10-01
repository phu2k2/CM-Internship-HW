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
    protected $data = ['deleted_at'];
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'id', 'customer_id');
    }
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }
    public function orderdetail(): HasMany
    {
        return $this->hasMany(OrderDetail::class, 'invoice_id', 'id');
    }
}
