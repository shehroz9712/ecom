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
                    <form action="{{ route('admin.bookings.store') }}" method="POST" enctype="multipart/form-data"
                        class="form theme-form">
                        @csrf
                        <div class="card-body">
                            <!-- User Selection -->
                            <div class="row">


                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Agent</label>
                                        <select name="agent_id" class="form-select">
                                            @foreach ($agents as $agent)
                                                <option value="{{ $agent->id }}"
                                                    {{ old('agent_id') == $agent->id ? 'selected' : '' }}>
                                                    {{ $agent->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('agent_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Tour</label>
                                        <select name="tour_id" class="form-select">
                                            @foreach ($tours as $tour)
                                                <option value="{{ $tour->id }}"
                                                    {{ old('tour_id') == $tour->id ? 'selected' : '' }}>
                                                    {{ $tour->tour_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('tour_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Amount</label>
                                        <input type="number" name="amount" class="form-control" step="0.01"
                                            value="{{ old('amount') }}" placeholder="Enter amount">
                                        @error('amount')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Transaction Date</label>
                                        <input type="date" name="transaction_date" class="form-control"
                                            value="{{ old('transaction_date', now()->format('Y-m-d')) }}">
                                        @error('transaction_date')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select name="status" class="form-select">
                                            <option value="Pending"
                                                {{ old('status', 'Pending') == 'Pending' ? 'selected' : '' }}>Pending
                                            </option>
                                            <option value="Confirmed" {{ old('status') == 'Confirmed' ? 'selected' : '' }}>
                                                Confirmed</option>
                                            <option value="Cancelled" {{ old('status') == 'Cancelled' ? 'selected' : '' }}>
                                                Cancelled</option>
                                        </select>
                                        @error('status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('admin.bookings.index') }}" class="btn btn-light">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection

@section('js')
@endsection
