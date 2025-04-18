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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();

            $table->integer('coins')->default(0);
            $table->string('job_title')->nullable();
            $table->string('experience')->nullable();
            $table->longText('summary')->nullable();
            $table->dateTime('coin_start_date')->nullable();
            $table->dateTime('coin_end_date')->nullable();

            // Resume & Cover Templates
            $table->integer('max_resume_templates')->default(0);
            $table->integer('used_resume_templates')->default(0);
            $table->integer('max_cover_templates')->default(0);
            $table->integer('used_cover_templates')->default(0);
            $table->integer('max_services')->default(0);
            $table->integer('used_services')->default(0);

            // AI Features & Usage Limits
            $table->integer('max_spell_grammar_tries')->default(0);
            $table->integer('used_spell_grammar_tries')->default(5);
            $table->integer('max_resume_parser_tries')->default(0);
            $table->integer('used_resume_parser_tries')->default(5);
            $table->integer('max_ai_cover_letter_tries')->default(0);
            $table->integer('used_ai_cover_letter_tries')->default(0);

            // Package & Subscription Details
            $table->unsignedInteger('package_id')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();

            $table->unsignedInteger('payment_method_id')->nullable(); // No ENUM, more flexibility
            // Profile Progress
            $table->unsignedInteger('profile_percentage')->default(0);
            //
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};