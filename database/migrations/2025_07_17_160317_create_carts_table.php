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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("userId");
            $table->unsignedBigInteger("productId");
            $table->foreign("userId")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("productId")->references("id")->on("products")->onDelete("cascade");
            $table->integer("quantity")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
