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
        Schema::create('page_sections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('page_id');
            $table->string('section_layout')->nullable();
            $table->string('section_name');
            $table->string('heading');
            $table->longText('description');
            $table->text('images')->nullable();
            $table->string('button_name')->nullable();
            $table->string('button_url')->nullable();
            $table->text('counter')->nullable();
            $table->integer('sort')->default(1);
            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->timestamps();
            $table->softDeletes();
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_sections');
    }
};
