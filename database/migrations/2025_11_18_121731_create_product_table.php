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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('old_price', 10, 2)->nullable();
            $table->decimal('new_price', 10, 2);
            $table->unsignedTinyInteger('rating')->default(0); // 1-5
            $table->string('barcode')->unique();
            $table->string('color')->nullable();
            $table->string('vendor')->nullable();
            $table->string('type')->nullable(); // e.g., "clothing", "electronics"
            $table->string('size')->nullable();
            $table->decimal('weight', 8, 2)->nullable();
            $table->enum('stock_status', ['in_stock', 'out_of_stock'])->default('in_stock');
            $table->json('tags')->nullable(); // e.g., ["summer", "sale"]
            $table->timestamps();
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
