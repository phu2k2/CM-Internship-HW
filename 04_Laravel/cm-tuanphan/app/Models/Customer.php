<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;
    // SoftDeletes are implemented to prevent directly deleting Customers from the database
    // To enable the use of SoftDeletes, please run the migration file:
    // 2023_09_28_023151_add_soft_deletes_for_existing_tables.php

    protected $fillable = [
        'company_name',
        'transaction_name',
        'address',
        'email',
        'phone_number',
        'fax'
    ];
}
