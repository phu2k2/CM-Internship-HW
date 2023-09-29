<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'suppliers';
    protected $fillable = [
        'company_id',
        'company_name',
        'transaction_name',
        'address',
        'phone',
        'email',
        'fax'
    ];
}
