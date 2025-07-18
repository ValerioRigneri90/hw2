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
        Schema::create('description_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('productId');
            $table->foreign("productId")->references("id")->on("products")->onDelete("cascade");
            $table->text("content")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('description_products');
    }
};
