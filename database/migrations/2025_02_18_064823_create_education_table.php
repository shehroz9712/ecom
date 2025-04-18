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
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->string('institution');
            $table->string('degree', 50);
            $table->string('field');
            $table->enum('grade_type', ['cgpa', 'grade', 'percentage', 'none'])->default('none');
            $table->string('grade');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->boolean('currently_studying')->default(false);
            $table->tinyInteger('sort')->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
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
        Schema::dropIfExists('education');
    }
};
