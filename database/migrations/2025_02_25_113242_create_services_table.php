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
        Schema::create('services', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('slug')->nullable();

                $table->string('media_id', 200)->nullable();

                $table->decimal('price', 10, 2);
                $table->decimal('discounted_price', 10, 2)->default(0);
                $table->longText('description');

                $table->text('other_heading')->nullable();
                $table->longText('other_description')->nullable();
                $table->tinyInteger('is_paid')->default(1);
                $table->enum('status', ['active', 'inactive'])->default('active');
                $table->unsignedBigInteger('created_by');
                $table->unsignedBigInteger('updated_by')->nullable();
                $table->timestamps();
                $table->softDeletes();
      
                $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
