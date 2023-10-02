<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orderdetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'orderdetails';

    protected $fillable = [
        'invoice_id',
        'product_id',
        'price',
        'amount',
        'discount'
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'invoice_id', 'id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    public function getPriceTotalAttribute()
    {
        return $this->amount * ($this->price - $this->discount);
    }

    public function scopeOfOrder($query, $orderId)
    {
        return $query->where('invoice_id', $orderId);
    }
}
