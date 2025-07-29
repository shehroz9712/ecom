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

            $table->string('order_number', 20)->nullable()->unique();
            $table->string('invoice_number', 20)->nullable()->unique();

            $table->string('currency', 3)->default('PKR');
            $table->decimal('subtotal', 12, 2);
            $table->decimal('discount_amount', 12, 2)->default(0.00);
            $table->decimal('tax_amount', 12, 2)->default(0.00);
            $table->string('tax_type', 50)->nullable();
            $table->decimal('shipping_amount', 12, 2)->default(0.00);
            $table->decimal('fees_amount', 12, 2)->default(0.00);
            $table->decimal('total_amount', 12, 2);

            $table->enum('payment_method', ['cod', 'bank_transfer', 'credit_card', 'paypal', 'stripe', 'other'])->default('cod');
            $table->enum('payment_status', ['pending', 'processing', 'paid', 'failed', 'refunded', 'partially_refunded', 'cancelled'])->default('pending');
            $table->string('transaction_id')->nullable();

            $table->text('customer_note')->nullable();
            $table->text('admin_note')->nullable();

            $table->foreignId('shipping_address_id')->nullable()->constrained('addresses')->nullOnDelete();
            $table->foreignId('billing_address_id')->nullable()->constrained('addresses')->nullOnDelete();

            $table->enum('status', ['pending', 'processing', 'on_hold', 'completed', 'cancelled', 'refunded', 'failed'])->default('pending');

            $table->timestamp('paid_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();

            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('created_by')->constrained('users')->cascadeOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();

            $table->index('order_number');
            $table->index('status');
            $table->index('user_id');
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
