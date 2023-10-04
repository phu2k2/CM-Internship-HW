<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;
    // SoftDeletes are implemented to prevent directly deleting Employees from the database
    // To enable the use of SoftDeletes, please run the migration file:
    // 2023_09_28_023151_add_soft_deletes_for_existing_tables.php

    protected $primaryKey = "employee_id";
    protected $keyType = "string";
    protected $fillable = [
        'employee_id',
        'last_name',
        'first_name',
        'birthday',
        'start_date',
        'address',
        'phone',
        'base_salary',
        'allowance'
    ];
}
