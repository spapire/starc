<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('user_id')->constrained();
            $table->foreignUuid('product_id')->constrained('shop_products');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('likes');
    }
};

