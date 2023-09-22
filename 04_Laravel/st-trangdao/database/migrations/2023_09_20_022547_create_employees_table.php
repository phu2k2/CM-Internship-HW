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
            $table->id();
            $table->char('employee_id', 1)->unique();
            $table->string('last_name', 40);
            $table->string('first_name', 10);
            $table->timestamp('birthday');
            $table->timestamp('start_date');
            $table->string('address', 60);
            $table->string('phone', 15)->unique();
            $table->unsignedDecimal('base_saraly', 10, 2);
            $table->unsignedDecimal('allowance', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
