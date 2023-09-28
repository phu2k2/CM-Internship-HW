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
        Schema::table('customers', function($table) {
            $table->softDeletes();
        });
        Schema::table('categories', function($table) {
            $table->softDeletes();
        });
        Schema::table('employees', function($table) {
            $table->softDeletes();
        });
        Schema::table('products', function($table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function($table) {
            $table->dropSoftDeletes();
        });
        Schema::table('categories', function($table) {
            $table->dropSoftDeletes();
        });
        Schema::table('employees', function($table) {
            $table->dropSoftDeletes();
        });
        Schema::table('products', function($table) {
            $table->dropSoftDeletes();
        });
    }
};
