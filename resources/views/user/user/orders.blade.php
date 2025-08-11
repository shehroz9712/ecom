@extends('user.layouts.app')
@section('content')
    <main class="main my-account">
        <div class="page-content pt-2">
            <div class="container">
                <div class="tab tab-vertical row gutter-lg">
                    @include('user.user.sidebar')

                    <div class="tab-content mb-6">
                        <!-- Dashboard Tab -->
                        <div class="tab-pane active in" id="account-orders">
                            <div class="icon-box icon-box-side icon-box-light">
                                <span class="icon-box-icon icon-orders">
                                    <i class="w-icon-orders"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title text-capitalize ls-normal mb-0">Orders</h4>
                                </div>
                            </div>
                            @if ($orders->count() > 0)
                                <table class="shop-table account-orders-table mb-6">
                                    <thead>
                                        <tr>
                                            <th class="order-id">Order</th>
                                            <th class="order-date">Date</th>
                                            <th class="order-status">Status</th>
                                            <th class="order-total">Total</th>
                                            <th class="order-actions">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td class="order-id">#{{ $order->order_number }}</td>
                                                <td class="order-date">{{ $order->created_at->format('F j, Y') }}</td>
                                                <td class="order-status">
                                                    <span
                                                        class="badge badge-{{ $order->status == 'completed' ? 'success' : 'danger' }}">
                                                        {{ ucfirst($order->status == 'completed' ? 'success' : 'danger') }}
                                                    </span>
                                                </td>
                                                <td class="order-total">
                                                    <span
                                                        class="order-price">{{ productAmount($order->total_amount) }}</span>
                                                    for
                                                    <span
                                                        class="order-quantity">{{ $order->orderDetails->sum('qty') }}</span>
                                                    items
                                                </td>
                                                <td class="order-action">
                                                    <a href="{{ route('user.orders.show', encrypt($order->id)) }}"
                                                        class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            @else
                                <p>You haven't placed any orders yet.</p>
                            @endif

                            <a href="{{ route('user.shop') }}" class="btn btn-dark btn-rounded btn-icon-right">
                                Go Shop <i class="w-icon-long-arrow-right"></i>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
