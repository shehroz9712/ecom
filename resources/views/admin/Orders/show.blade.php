@extends('admin.layouts.app')

@section('css')
@endsection

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>Order #{{ $order->order_number }}</h3>
                {{ Breadcrumbs::render('admin.orders.show', $order) }}
            </div>
        </div>
    </div>

    <!-- Order Details -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Order Summary
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Invoice:</strong> {{ $order->invoice_number ?? 'N/A' }}</p>
                            <p><strong>Total Amount:</strong> {{ $order->currency }} {{ number_format($order->total_amount, 2) }}</p>
                            <p><strong>Status:</strong> <span class="badge bg-info">{{ ucfirst($order->status) }}</span></p>
                            <p><strong>Payment:</strong> {{ ucfirst($order->payment_status) }} via {{ ucfirst($order->payment_method) }}</p>
                            <p><strong>Created At:</strong> {{ $order->created_at->format('d M Y') }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Customer Note:</strong><br>{{ $order->customer_note ?? 'None' }}</p>
                            <p><strong>Admin Note:</strong><br>{{ $order->admin_note ?? 'None' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Addresses -->
            <div class="card mt-3">
                <div class="card-header bg-secondary text-white">
                    Billing & Shipping Address
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Billing Address</h5>
                            @if($order->billingAddress)
                                <p>{{ $order->billingAddress->full_name }}</p>
                                <p>{{ $order->billingAddress->address_line_1 }}</p>
                                <p>{{ $order->billingAddress->city }}, {{ $order->billingAddress->state }} {{ $order->billingAddress->postcode }}</p>
                                <p>{{ $order->billingAddress->country }}</p>
                                <p>Phone: {{ $order->billingAddress->phone }}</p>
                            @else
                                <p class="text-muted">Not available</p>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <h5>Shipping Address</h5>
                            @if($order->shippingAddress)
                                <p>{{ $order->shippingAddress->full_name }}</p>
                                <p>{{ $order->shippingAddress->address_line_1 }}</p>
                                <p>{{ $order->shippingAddress->city }}, {{ $order->shippingAddress->state }} {{ $order->shippingAddress->postcode }}</p>
                                <p>{{ $order->shippingAddress->country }}</p>
                                <p>Phone: {{ $order->shippingAddress->phone }}</p>
                            @else
                                <p class="text-muted">Not available</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products -->
            <div class="card mt-3">
                <div class="card-header bg-dark text-white">
                    Products in Order
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>Product</th>
                                    <th>Variant</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->orderDetails as $detail)
                                    <tr>
                                        <td>{{ $detail->product->name }}</td>
                                        <td>
                                            @foreach ($detail->variant->variantAttributes as $attr)
                                                <span class="badge bg-secondary">{{ $attr->attribute->name }}: {{ $attr->attributeValue->value }}</span>
                                            @endforeach
                                        </td>
                                        <td>{{ $order->currency }} {{ number_format($detail->price, 2) }}</td>
                                        <td>
                                            @if ($detail->media_id)
                                                <img src="{{ asset('storage/' . $detail->media_id) }}" alt="Product Image" width="50">
                                            @else
                                                <span class="text-muted">No image</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="mt-4">
                <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Back to Orders</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection