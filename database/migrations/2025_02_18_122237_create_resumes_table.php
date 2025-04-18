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
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();

            $table->string('resume_title', 100)->nullable();
            $table->string('resume_first_name', 100)->nullable();
            $table->string('resume_last_name', 100)->nullable();
            $table->string('resume_job_title', 100)->nullable();
            $table->string('resume_phone_no', 50)->nullable();
            $table->string('resume_email', 50)->nullable();
            $table->string('resume_website_link', 255)->nullable();
            $table->longText('resume_summary')->nullable();
            
            $table->string('heading_fontsize', 50)->nullable();
            $table->string('paragraph_fontsize', 50)->nullable();
            $table->string('heading_font_style', 100)->nullable();
            $table->string('paragraph_font_style', 100)->nullable();
            $table->string('top_bottom_margins', 50)->nullable();
            $table->string('side_margins', 50)->nullable();
            $table->string('paragraph_spacing', 50)->nullable();
            $table->string('section_spacing', 50)->nullable();
            $table->string('color', 50)->nullable();

            $table->boolean('show_experience')->default(true);
            $table->boolean('show_certificates')->default(true);
            $table->boolean('show_awards')->default(true);
            $table->boolean('show_references')->default(true);
            $table->boolean('show_languages')->default(true);
            $table->boolean('show_technical_skills')->default(true);
            $table->boolean('show_soft_skills')->default(true);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->unsignedBigInteger('template_id');

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
        Schema::dropIfExists('resumes');
    }
};
