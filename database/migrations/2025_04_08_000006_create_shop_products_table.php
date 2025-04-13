<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('shop_products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('store_id')->constrained('stores');
            $table->foreignUuid('category_id')->constrained('shop_categories');
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 16, 2);
            $table->string('link_tokopedia')->nullable();
            $table->string('link_shopee')->nullable();
            $table->string('link_gofood')->nullable();
            $table->string('link_shopee_food')->nullable();
            $table->string('thumbnail')->nullable();
            $table->integer('stock')->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('shop_products');
    }
};
