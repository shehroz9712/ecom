@extends('admin.layouts.app')
@section('css')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>{{ $pageTitle }}</h3>
                    {{ Breadcrumbs::render('admin.bookings.show', $booking) }}
                </div>

            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Booking ID: {{ $booking->id }}
                    </div>
                    <div class="card-body">
                        <p><strong>Agent:</strong> {{ $booking->agent->name }}</p>
                        <p><strong>Tour:</strong> {{ $booking->tour->tour_name }}</p>
                        <p><strong>Amount:</strong> {{ $booking->amount }}</p>
                        <p><strong>Transaction Date:</strong> {{ $booking->transaction_date }}</p>
                        <p><strong>Status:</strong>
                            @if ($booking->status == 'Pending')
                                <span class="badge bg-warning">Pending</span>
                            @elseif($booking->status == 'Confirmed')
                                <span class="badge bg-success">Confirmed</span>
                            @elseif($booking->status == 'Cancelled')
                                <span class="badge bg-danger">Cancelled</span>
                            @endif
                        </p>



                        <div class="mt-4">
                            <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">Back to List</a>
                            <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this booking?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
@section('js')
@endsection
