<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'product_id',
        'product_name',
        'company_id',
        'category_id',
        'amount',
        'unit',
        'price'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'company_id', 'company_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    } 
}
