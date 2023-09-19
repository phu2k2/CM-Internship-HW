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
        Schema::create('customers', function (Blueprint $table) {
            $table->id('CustomerID');
            $table->string('CompanyName', 50);
            $table->string('TradingName', 20)->nullable();
            $table->string('Address', 50);
            $table->string('Email', 30);
            $table->string('PhoneNumber', 15);
            $table->string('FaxNumber', 15)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
