@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>{{ $pageTitle }}</h3>
                    {{ Breadcrumbs::render('admin.orders.index') }}
                </div>
            </div>
        </div>

        <div class="row starter-main">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">All Orders</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display table table-bordered" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>Order #</th>
                                        <th>Invoice</th>
                                        <th>User</th>
                                        <th>Total</th>
                                        <th>Payment</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->order_number }}</td>
                                            <td>{{ $order->invoice_number ?? 'N/A' }}</td>
                                            <td>{{ $order->user?->name ?? 'Guest' }}</td>
                                            <td>{{ $order->currency }} {{ number_format($order->total_amount, 2) }}</td>
                                            <td>{{ ucfirst($order->payment_status) }}</td>
                                            <td>
                                                <form action="{{ route('admin.orders.updateStatus', $order->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <select name="status" onchange="this.form.submit()"
                                                        class="form-select form-select-sm">
                                                        @foreach (['pending', 'processing', 'on_hold', 'completed', 'cancelled', 'refunded', 'failed'] as $status)
                                                            <option value="{{ $status }}"
                                                                @selected($order->status == $status)>
                                                                {{ ucfirst($status) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </form>
                                            </td>
                                            <td>{{ $order->created_at->format('d M Y') }}</td>
                                            <td>
                                                <a href="{{ route('admin.orders.show', $order->id) }}"
                                                    class="btn btn-sm btn-info">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
