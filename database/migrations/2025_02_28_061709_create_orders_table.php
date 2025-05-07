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

                // Order Identification
                $table->string('order_number', 20)->unique(); // More practical length for order numbers
                $table->string('invoice_number', 20)->nullable()->unique(); // Increased length

                // Pricing Information
                $table->string('currency', 3)->default('USD'); // ISO 4217 currency codes are 3 chars
                $table->decimal('subtotal', 12, 2); // Increased precision for large orders
                $table->decimal('discount_amount', 12, 2)->default(0.00);
                $table->decimal('tax_amount', 12, 2)->default(0.00);
                $table->string('tax_type', 50)->nullable(); // e.g., VAT, GST, etc.
                $table->decimal('shipping_amount', 12, 2)->default(0.00); // Added shipping cost
                $table->decimal('fees_amount', 12, 2)->default(0.00);
                $table->decimal('total_amount', 12, 2);

                // Payment Information
                $table->enum('payment_method', ['cod', 'bank_transfer', 'credit_card', 'paypal', 'stripe', 'other'])->default('cod');
                $table->enum('payment_status', ['pending', 'processing', 'paid', 'failed', 'refunded', 'partially_refunded', 'cancelled'])->default('pending');
                $table->string('transaction_id')->nullable(); // For payment gateway reference

                // Order Details
                $table->text('customer_note')->nullable();
                $table->text('admin_note')->nullable(); // For internal use

                // Shipping/Billing Information
                $table->foreignId('shipping_address_id')->nullable()->constrained('addresses')->onDelete('set null');
                $table->foreignId('billing_address_id')->nullable()->constrained('addresses')->onDelete('set null');

                // Promotions
                $table->string('coupon_code', 50)->nullable();
                $table->foreignId('coupon_id')->nullable()->constrained('coupons')->onDelete('set null');

                // Order Status
                $table->enum('status', ['pending', 'processing', 'on_hold', 'completed', 'cancelled', 'refunded', 'failed'])->default('pending');

                // Dates
                $table->timestamp('paid_at')->nullable();
                $table->timestamp('completed_at')->nullable();
                $table->timestamp('cancelled_at')->nullable();

                // User References
                $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
                $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
                $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('cascade');

                // Timestamps
                $table->timestamps();
                $table->softDeletes();

                // Indexes
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
