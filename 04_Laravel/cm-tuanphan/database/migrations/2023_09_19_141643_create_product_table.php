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
        Schema::create('products', function (Blueprint $table) {
            $table->char('ProductCode', 4)->primary();
            $table->string('ProductName', 30);
            $table->char('CompanyCode', 3);
            $table->char('CategoryCode', 2);
            $table->integer('Quantity');
            $table->string('Unit', 10);
            $table->decimal('UnitPrice', 10, 2);
            $table->timestamps();
            
            $table->foreign('CategoryCode')->references('CategoryCode')->on('categories');
            $table->foreign('CompanyCode')->references('CompanyCode')->on('suppliers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
