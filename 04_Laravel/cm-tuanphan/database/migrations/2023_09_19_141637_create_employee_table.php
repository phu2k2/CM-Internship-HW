<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->char('EmployeeCode', 4)->primary();
            $table->string('LastName', 40);
            $table->string('FirstName', 10);
            $table->timestamp('BirthDate');
            $table->timestamp('StartDate');
            $table->string('Address', 60);
            $table->string('PhoneNumber', 15);
            $table->decimal('BaseSalary', 10, 2);
            $table->decimal('Allowance', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee');
    }
};
