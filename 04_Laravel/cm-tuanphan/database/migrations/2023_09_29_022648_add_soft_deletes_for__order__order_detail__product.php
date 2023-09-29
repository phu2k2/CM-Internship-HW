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
        Schema::table('orders', function($table) {
            $table->softDeletes();
        });
        Schema::table('orderdetails', function($table) {
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
        Schema::table('orders', function($table) {
            if (Schema::hasColumn('orders', 'deleted_at')) {
                $table->dropSoftDeletes();
            }
        });
        Schema::table('orderdetails', function($table) {
            if (Schema::hasColumn('orderdetails', 'deleted_at')) {
                $table->dropSoftDeletes();
            }
        });
        Schema::table('products', function($table) {
            if (Schema::hasColumn('products', 'deleted_at')) {
                $table->dropSoftDeletes();
            }
        });
    }
};
