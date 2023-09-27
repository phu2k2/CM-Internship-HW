<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $primaryKey = "employee_id";
    protected $keyType = "string";
    protected $fillable = [
        'first_name',
        'last_name',
        'birthday',
        'start_date',
        'address',
        'phone',
        'base_salary',
        'allowance',
    ];
}
