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
        Schema::create('digital_signatures', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('media_id')->nullable();

            $table->string('alignment', 100)->nullable();
            $table->string('size', 100)->nullable();
            $table->string('text', 100)->nullable();
            $table->string('font', 100)->nullable();
            $table->string('color', 100)->nullable();
            $table->tinyInteger('is_draw')->default(0);
            $table->tinyInteger('is_upload')->default(0);
            $table->tinyInteger('is_text')->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('media_id')->references('id')->on('media')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('digital_signatures');
    }
};
