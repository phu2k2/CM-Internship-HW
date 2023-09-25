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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->char('company_id', 3)->unique();
            $table->string('company_name', 50);
            $table->string('transaction_name', 20)->unique();
            $table->string('address', 50);
            $table->string('phone', 15)->unique();
            $table->string('fax', 15)->unique();
            $table->string('email', 30)->unique();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};