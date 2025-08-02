@extends('admin.layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>{{ $pageTitle }}</h3>
                    {{ Breadcrumbs::render('admin.users.show', $user) }}
                </div>
            </div>
        </div>
    </div>

    <!-- User Details -->
    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        {{ $user->name }}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- User Info -->
                            <div class="col-md-6">
                                <p><strong>Email:</strong> {{ $user->email }}</p>
                                <p><strong>Status:</strong> {!! StatusBadge($user->status) !!}</p>
                                <p><strong>Created At:</strong> {{ $user->created_at->format('d M, Y') }}</p>
                            </div>
                            <!-- User Addresses -->
                            <div class="col-md-6">
                                <h5>Addresses</h5>
                                @forelse($user->addresses as $address)
                                    <div class="mb-2 border p-2 rounded">
                                        <p><strong>Type:</strong> {{ ucfirst($address->type) }}</p>
                                        <p>{{ $address->full_name }}, {{ $address->address_line_1 }}</p>
                                        <p>{{ $address->city }}, {{ $address->state }} - {{ $address->postcode }}</p>
                                        <p>{{ $address->country }}, Phone: {{ $address->phone }}</p>
                                        @if ($address->is_default)
                                            <span class="badge bg-success">Default</span>
                                        @endif
                                    </div>
                                @empty
                                    <p>No addresses available</p>
                                @endforelse
                            </div>
                        </div>

                        <!-- Orders -->
                        <div class="mt-4">
                            <h5>User Orders</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Order #</th>
                                            <th>Invoice #</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Payment</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($user->orders as $order)
                                            <tr>
                                                <td>{{ $order->order_number }}</td>
                                                <td>{{ $order->invoice_number ?? 'N/A' }}</td>
                                                <td>{{ $order->currency }} {{ number_format($order->total_amount, 2) }}
                                                </td>
                                                <td><span class="badge bg-info">{{ ucfirst($order->status) }}</span></td>
                                                <td>{{ ucfirst($order->payment_status) }}</td>
                                                <td>{{ $order->created_at->format('d M Y') }}</td>
                                                <td>
                                                    <a href="{{ route('admin.orders.show', $order->id) }}"
                                                        class="btn btn-sm btn-primary">View</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">No orders found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Footer buttons -->
                        <div class="mt-4">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back to List</a>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
