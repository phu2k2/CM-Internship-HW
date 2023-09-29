<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'customers';
    protected $fillable = [
        'company_name',
        'transaction_name',
        'address',
        'email',
        'phone',
        'fax'
    ];
    protected $data = ['deleted_at'];
}
