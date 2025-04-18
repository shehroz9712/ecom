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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('slug')->nullable();
            $table->unsignedBigInteger('image')->nullable();
            $table->mediumText('short_description');
            $table->longText('long_description');
            $table->bigInteger('views')->default(0);
            $table->string('author_name', 100);
            $table->unsignedBigInteger('author_image')->nullable();
            $table->longText('meta_keyword')->nullable();
            $table->longText('meta_description')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('image')->references('id')->on('media')->onDelete('cascade');
            $table->foreign('author_image')->references('id')->on('media')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
