<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('store_likes', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('user_id')->constrained();
            $table->foreignUuid('store_id')->constrained('stores');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('store_likes');
    }
};
