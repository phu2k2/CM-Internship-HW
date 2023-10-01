<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'company_id',
        'company_name',
        'transaction_name',
        'address',
        'phone',
        'email',
        'fax'
    ];
    protected $data = ['deleted_at'];
    public function product(): HasMany
    {
        return $this->hasMany(Product::class, 'company_id', 'company_id');
    }
}
