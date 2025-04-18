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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('invoice_number', 5)->nullable();
            $table->string('currency', 4);
            $table->decimal('discount_amount', 10, 2)->nullable(); // 10 total digits, 2 decimal places
            $table->decimal('tax_amount', 10, 2)->nullable(); // 10 total digits, 2 decimal places
            $table->string('tax_type', 100)->nullable();
            $table->decimal('fees_amount', 10, 2)->nullable(); // 10 total digits, 2 decimal places
            $table->decimal('subtotal', 10, 2); // 10 total digits, 2 decimal places
            $table->decimal('total_amount', 10, 2); // 10 total digits, 2 decimal places
            $table->text('description'); // Use 'text' instead of 'longText' for descriptions
            $table->enum('payment_type', ['paypal', 'payoneer', 'google pay', 'coins', 'stripe', 'free_premium']);
            $table->string('card_number')->nullable();
            $table->string('card_name')->nullable();
            $table->string('card_holder_email')->nullable();
            $table->string('address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('decline_issue')->nullable();
            $table->string('coupon_code', 150)->nullable();
            $table->integer('coupon_discount_percent')->nullable();
            $table->integer('used_coins')->nullable();
            $table->tinyInteger('is_coins')->default(0);

            // Define foreign keys
            $table->integer('template_id')->nullable(); // purchased template or cover_template id
            $table->boolean('is_resume_template')->default(false);
            $table->boolean('is_cover_template')->default(false);

            $table->enum('status', ['active', 'inactive'])->default('active');

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
        Schema::dropIfExists('orders');
    }
};
