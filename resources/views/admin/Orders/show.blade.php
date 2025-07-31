@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="page-header mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h3 class="mb-0">Order Details</h3>
            {{ Breadcrumbs::render('admin.orders.show', $order) }}
        </div>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-secondary">← Back to Orders</a>
    </div>

    <div class="row">
        <!-- Order Summary -->
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header bg-light fw-bold">Order Info</div>
                <div class="card-body">
                    <p><strong>Order #:</strong> {{ $order->order_number }}</p>
                    <p><strong>Invoice #:</strong> {{ $order->invoice_number ?? 'N/A' }}</p>
                    <p><strong>Status:</strong> {!! StatusBadge($order->status) !!}</p>
                    <p><strong>Payment:</strong> {!! StatusBadge($order->payment_status) !!} ({{ ucfirst($order->payment_method) }})</p>
                    <p><strong>Placed on:</strong> {{ $order->created_at->format('d M, Y h:i A') }}</p>
                </div>
            </div>
        </div>

        <!-- Customer Info -->
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header bg-light fw-bold">Customer</div>
                <div class="card-body">
                    <p><strong>Name:</strong> {{ $order->user?->name ?? 'Guest' }}</p>
                    <p><strong>Email:</strong> {{ $order->user?->email ?? 'N/A' }}</p>
                    <p><strong>Note:</strong> {{ $order->customer_note ?? '-' }}</p>
                </div>
            </div>
        </div>

        <!-- Address Info -->
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header bg-light fw-bold">Shipping Address</div>
                <div class="card-body">
                    @if($order->shippingAddress)
                        <p>{{ $order->shippingAddress->full_name }}</p>
                        <p>{{ $order->shippingAddress->address_line_1 }}</p>
                        <p>{{ $order->shippingAddress->city?->name }}, {{ $order->shippingAddress->state?->name }}</p>
                        <p>{{ $order->shippingAddress->country?->name }}</p>
                        <p>{{ $order->shippingAddress->phone }}</p>
                    @else
                        <p class="text-muted">No shipping address</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header bg-light fw-bold">Billing Address</div>
                <div class="card-body">
                    @if($order->billingAddress)
                        <p>{{ $order->billingAddress->full_name }}</p>
                        <p>{{ $order->billingAddress->address_line_1 }}</p>
                        <p>{{ $order->billingAddress->city?->name }}, {{ $order->billingAddress->state?->name }}</p>
                        <p>{{ $order->billingAddress->country?->name }}</p>
                        <p>{{ $order->billingAddress->phone }}</p>
                    @else
                        <p class="text-muted">No billing address</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Ordered Items -->
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header bg-light fw-bold">Ordered Products</div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Variant</th>
                                <th>Qty</th>
                                <th>Unit Price</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->details as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->product_name }}</td>
                                    <td>
                                        @if($item->variant_attributes)
                                            @foreach(json_decode($item->variant_attributes, true) as $key => $value)
                                                <span class="badge bg-secondary">{{ $key }}: {{ $value }}</span>
                                            @endforeach
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->qty }}</td>
                                    <td>{{ productAmount($item->price, 2, $order->currency) }}</td>
                                    <td>{{ productAmount($item->price * $item->qty, 2, $order->currency) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Summary -->
        <div class="col-lg-6 offset-lg-6">
            <div class="card">
                <div class="card-header bg-light fw-bold">Order Summary</div>
                <div class="card-body">
                    <p><strong>Subtotal:</strong> {{ productAmount($order->subtotal, 2, $order->currency) }}</p>
                    <p><strong>Discount:</strong> -{{ productAmount($order->discount_amount, 2, $order->currency) }}</p>
                    <p><strong>Tax:</strong> +{{ productAmount($order->tax_amount, 2, $order->currency) }}</p>
                    <p><strong>Shipping:</strong> +{{ productAmount($order->shipping_amount, 2, $order->currency) }}</p>
                    <p><strong>Fees:</strong> +{{ productAmount($order->fees_amount, 2, $order->currency) }}</p>
                    <hr>
                    <h5><strong>Total:</strong> {{ productAmount($order->total_amount, 2, $order->currency) }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
