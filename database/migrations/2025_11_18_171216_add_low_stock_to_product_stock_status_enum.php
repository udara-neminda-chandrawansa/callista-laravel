<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // For MySQL, we need to use raw SQL to modify enum values
        DB::statement("ALTER TABLE product MODIFY COLUMN stock_status ENUM('in_stock', 'low_stock', 'out_of_stock') NOT NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove low_stock from enum and revert to original values
        // First, update any low_stock records to in_stock to avoid constraint violations
        DB::table('product')->where('stock_status', 'low_stock')->update(['stock_status' => 'in_stock']);
        
        // Then modify the enum to remove low_stock
        DB::statement("ALTER TABLE product MODIFY COLUMN stock_status ENUM('in_stock', 'out_of_stock') NOT NULL");
    }
};
