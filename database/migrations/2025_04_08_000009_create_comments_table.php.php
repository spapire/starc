<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained()->onDelete('cascade'); // hanya user yang bisa komentar
            $table->foreignUuid('shop_product_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('parent_id')->nullable()->constrained('comments')->onDelete('cascade'); // untuk reply
            $table->text('content');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
