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
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('contact', 25)->nullable();
            $table->string('phone_number', 25)->nullable();
            $table->string('mobile_number', 25)->nullable();

            $table->string('media_id')->nullable();

            $table->string('job_position')->nullable();


            // Address Information
            $table->unsignedBigInteger('country_id')->nullable()->index()->comment('Country ID');
            $table->unsignedBigInteger('state_id')->nullable()->index()->comment('State ID');
            $table->unsignedBigInteger('city_id')->nullable()->index()->comment('City ID');
            $table->string('address')->nullable();

            $table->string('postal_code', 20)->nullable();
            $table->string('website')->nullable();


            // Referral System
            $table->string('referral_link')->nullable()->unique();
            $table->unsignedBigInteger('referral_by')->nullable()->default(0);

            $table->string('device_id')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('provider_name')->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->string('verify_code', 10)->nullable();
            $table->string('email_verification_token')->nullable()->unique();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->boolean('allow_shares')->default(true);
            $table->rememberToken();

            // Role Management
            $table->unsignedInteger('role_id')->default(0);


            // Login Tracking
            $table->dateTime('last_login_at')->nullable();
            $table->ipAddress('last_login_ip')->nullable();

            $table->timestamps();
            $table->softDeletes();

            // Foreign Keys
            // $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');
            // $table->foreign('package_id')->references('id')->on('packages')->onDelete('set null');
            // $table->foreign('referral_by')->references('id')->on('users')->onDelete('set null');
            // $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('set null');
            // $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            // $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            // $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
