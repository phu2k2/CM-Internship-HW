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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('InvoiceNumber');
            $table->unsignedBigInteger('CustomerID');
            $table->char('EmployeeCode', 4);
            $table->timestamp('OrderDate');
            $table->timestamp('DeliveryDate');
            $table->timestamp('ShipmentDate');
            $table->string('DeliveryLocation', 80);
            $table->timestamps();
    
            $table->foreign('CustomerID')->references('CustomerID')->on('customers');
            $table->foreign('EmployeeCode')->references('EmployeeCode')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
