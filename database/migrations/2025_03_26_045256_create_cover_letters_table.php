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
        Schema::create('cover_letters', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cover_template_id')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->string('cover_letter_title');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->date('date')->nullable();
            $table->string('contact_person_name', 50)->nullable();
            $table->string('contact_person_designation', 100)->nullable();
            $table->string('contact_person_email', 50)->nullable();
            $table->string('contact_person_phone', 50)->nullable();
            $table->string('company_name', 100)->nullable();
            $table->string('company_address', 100)->nullable();
            $table->string('phone_number');
            $table->string('email_address');
            $table->string('street_address')->nullable();
            $table->unsignedBigInteger('country_id');
            $table->string('state', 50)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('zip_code')->nullable();
            $table->string('experience')->default('5 years')->nullable();
            $table->string('job_position')->nullable();
            $table->enum('type', ['type', 'draw', 'upload'])->nullable();
            $table->string('signature')->nullable();
            $table->longText('body_detail')->nullable();
            $table->longText('closer_detail')->nullable();

            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('cover_letters');
    }
};
