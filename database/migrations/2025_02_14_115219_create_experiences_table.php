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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('job_position');
            $table->string('company_name');
            $table->string('state', 50);
            $table->string('city', 50);
            $table->enum('type', ['Onsite', 'Remote', 'Hybrid']);
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->tinyInteger('currently_working')->default(0);
            $table->longText('company_description');
            $table->longText('job_description');
            $table->tinyInteger('sort')->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->foreignId('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreignId('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('updated_by')->nullable()->constrained('id')->on('users')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
