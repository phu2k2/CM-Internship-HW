<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory,SoftDeletes;
    protected $primaryKey = "employee_id";
    protected $keyType = "string";
    protected $appends = ["EmployeeName" , "Salary"];
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

    public function orders()
    {
        return $this->hasMany(Order::class , 'employee_id' , 'employee_id');
    }

    public function getEmployeeNameAttribute()
    {
        return $this->attributes['last_name'] . " " . $this->attributes['first_name'];
    }

    public function getSalaryAttribute()
    {
        return $this->attributes['base_salary'] + $this->attributes['allowance'];
    }
}
