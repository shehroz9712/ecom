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
        Schema::create('custom_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->longText('description')->nullable();
            $table->integer('sort')->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('custom_sections');
    }
};
