<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            // Personal Information
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            // Verification & Security
            $table->timestamp('email_verified_at')->nullable();
            $table->string('verify_code', 10)->nullable();
            $table->string('email_verification_token')->nullable()->unique();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->rememberToken();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
