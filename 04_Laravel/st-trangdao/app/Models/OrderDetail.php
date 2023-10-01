<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'orderdetails';
    protected $fillable = [
        'invoice_id',
        'product_id',
        'price',
        'amount',
        'discount',
    ];
    protected $data = ['deleted_at'];
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'id', 'invoice_id');
    }
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
