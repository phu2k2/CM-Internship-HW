<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'employees';
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

    protected $attributes = [
        'allowance' => 0,
    ];
    protected $data = ['deleted_at'];
}
