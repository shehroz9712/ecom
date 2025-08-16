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
                                            <th class="text-dark">Qty</th>
                                            <th class="text-dark text-right">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->orderDetails as $item)
                                            <tr>
                                                <td>
                                                    {{ $item->product->name }}
                                                </td>
                                                <td> {{ $item->qty }}</td>
                                                <td>{{ productAmount($item->price) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="2">Subtotal:</th>
                                            <td>{{ productAmount($order->subtotal) }}</td>
                                        </tr>
                                        <tr>
                                            <th colspan="2">Shipping:</th>
                                            <td>{{ productAmount($order->shipping_amount) ?? 'Flat rate' }}</td>
                                        </tr>
                                        <tr>
                                            <th colspan="2">Payment method:</th>
                                            <td>{{ ucfirst($order->payment_method) ?? 'N/A' }}</td>
                                        </tr>
                                        <tr class="total">
                                            <th colspan="2" class="border-no">Total:</th>
                                            <td class="border-no">{{ productAmount($order->total_amount) }}</td>
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
