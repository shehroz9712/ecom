<?php

use Carbon\Carbon;
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
        Schema::create('admin_user_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('service_id')->references('id')->on('services')->onDelete('cascade');

            $table->decimal('service_price', 10, 2);

            $table->string('file', 150)->nullable();
            $table->string('modified_file', 150)->nullable();
            $table->date('expected_date')->default(Carbon::now()->addDays(3));

            $table->boolean('is_revision')->default(false);
            $table->tinyInteger('delievered')->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('cascade');
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
        Schema::dropIfExists('admin_user_services');
    }
};
