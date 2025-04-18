<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();

            $table->string('name', 100);
            $table->tinyInteger('sort')->default(0);
            $table->string('image')->nullable();
            $table->integer('resume_templates')->default(0);
            $table->integer('cover_templates')->default(0);
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2);
            $table->integer('duration');
            $table->integer('coins')->nullable();
            $table->tinyInteger('display')->default(1);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->integer('spell_and_grammar_tries')->default(5)->nullable();
            $table->integer('resume_parser_tries')->default(5)->nullable();
            $table->integer('max_services')->nullable();
            $table->integer('ai_based_cover_letter_tries')->default(0)->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
