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
        Schema::create('resume_headers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('email', 255)->nullable();
            $table->string('job_position', 255)->nullable();
            $table->string('contact', 255)->nullable();
            $table->string('phone_number', 255)->nullable();
            $table->string('website', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('postal_code', 10)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');

            // Add foreignId key
            $table->foreignId('resume_id')->references('id')->on('resumes')->onDelete('cascade');
            $table->foreignId('media_id')->references('id')->on('media')->onDelete('cascade');
            $table->foreignId('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreignId('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreignId('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resume_headers');
    }
};
