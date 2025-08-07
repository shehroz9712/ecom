@extends('user.layouts.app')
@section('content')
    <main class="main my-account">
        <div class="page-content pt-2">
            <div class="container">
                <div class=" tab-vertical row gutter-lg">
                    @include('user.user.sidebar')

                    <div class="tab-content mb-6">
                        <!-- Dashboard Tab -->
                        <div class="tab-pane active order">
                            <p class="mb-7">Order #{{ $order->id }} was placed on
                                {{ $order->created_at->format('F d, Y') }} and is currently {{ $order->status }}.</p>

                            <div class="order-details-wrapper mb-5">
                                <h4 class="title text-uppercase ls-25 mb-5">Order Details</h4>
                                <table class="order-table">
                                    <thead>
                                        <tr>
                                            <th class="text-dark">Product</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->orderDetails as $item)
                                            <tr>
                                                <td>
                                                    <a href="#">{{ $item->product->name }}</a>&nbsp;<strong>x
                                                        {{ $item->quantity }}</strong><br>
                                                    Vendor : <a href="#">{{ $item->vendor->name ?? 'N/A' }}</a>
                                                </td>
                                                <td>${{ number_format($item->total_price, 2) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Subtotal:</th>
                                            <td>${{ number_format($order->subtotal, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping:</th>
                                            <td>{{ $order->shipping_method ?? 'Flat rate' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Payment method:</th>
                                            <td>{{ $order->payment_method ?? 'N/A' }}</td>
                                        </tr>
                                        <tr class="total">
                                            <th class="border-no">Total:</th>
                                            <td class="border-no">${{ number_format($order->total, 2) }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>





                            <a href="{{ route('user.profile') }}"
                                class="btn btn-dark btn-rounded btn-icon-left btn-back mt-6 mb-6">
                                <i class="w-icon-long-arrow-left"></i>Back To List
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- End of Main -->
@endsection
