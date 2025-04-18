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
        Schema::create('coin_plans', function (Blueprint $table) {
            $table->id();
            $table->integer('coins');
            $table->decimal('price', 8, 2)->nullable();
            $table->integer('discount')->nullable();
            $table->integer('duration')->nullable();
            $table->integer('referrals')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coin_plans');
    }
};
