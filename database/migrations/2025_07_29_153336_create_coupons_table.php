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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('code');
            $table->longText('description')->nullable();
            $table->string('discount_type')->comment('flat/percentage');
            $table->double('discount_value')->default(0.00);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->double('min_spend')->default(0.00);
            $table->double('max_discount_amount')->default(0.00);
            $table->integer('total_usage_limit')->default(1);
            $table->integer('total_usage_count')->default(0);
            $table->boolean('is_for_guest')->default(0);
            $table->integer('user_usage_limit')->default(1);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('updated_by')->nullable()->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
