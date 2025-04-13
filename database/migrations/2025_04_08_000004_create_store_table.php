<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('stores', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->json('location')->nullable();
            $table->string('whatsapp_url')->nullable();
            $table->text('bio')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('store');
    }
};
