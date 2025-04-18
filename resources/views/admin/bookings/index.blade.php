@extends('admin.layouts.app')
@section('css')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>{{ $pageTitle }}</h3>
                    {{ Breadcrumbs::render('admin.bookings.index') }}
                </div>

            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('admin.bookings.create') }}" class="btn btn-primary">Add Bookings</a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Tour</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Transaction Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $booking)
                                        <tr>
                                            <td>{{ $booking->id }}</td>
                                            <td>{{ $booking->agent->name }}</td>
                                            <td>{{ $booking->tour->tour_name }}</td>
                                            <td>{{ $booking->amount }}</td>
                                            <td>{{ $booking->status }}</td>
                                            <td>{{ $booking->transaction_date }}</td>
                                            <td>
                                                <a href="{{ route('admin.bookings.show', $booking->id) }}"
                                                    class="action-btn"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('admin.bookings.edit', $booking->id) }}"
                                                    class="action-btn"><i class="fa fa-pencil-square-o"></i></a>
                                                <form id="delete-form-{{ $booking->id }}"
                                                    action="{{ route('admin.bookings.destroy', $booking->id) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                                <a href="#" class="action-btn"
                                                    onclick="event.preventDefault(); if(confirm('Are you sure?')) document.getElementById('delete-form-{{ $booking->id }}').submit();"
                                                    class="text-danger">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
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
    <!-- Container-fluid Ends-->
@endsection
@section('js')
@endsection
