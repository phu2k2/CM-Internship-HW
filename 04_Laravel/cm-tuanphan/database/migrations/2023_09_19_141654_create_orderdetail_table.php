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
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->unsignedBigInteger('InvoiceNumber');
            $table->char('ProductCode', 4);
            $table->decimal('UnitPrice', 10, 2);
            $table->integer('Quantity');
            $table->decimal('DiscountAmount', 10, 2);
            $table->timestamps();
    
            $table->foreign('InvoiceNumber')->references('InvoiceNumber')->on('orders');
            $table->foreign('ProductCode')->references('ProductCode')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderdetail');
    }
};
