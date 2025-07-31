@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="page-header d-flex justify-content-between align-items-center">
            <div>
                <h3 class="mb-0">City Detail</h3>
                {{ Breadcrumbs::render('admin.cities.show', $city) }}
            </div>
            <a href="{{ route('admin.cities.index') }}" class="btn btn-secondary">Back to List</a>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <td>{{ $city->id }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $city->name }}</td>
                    </tr>
                    <tr>
                        <th>State</th>
                        <td>{{ $city->state->name ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{!! StatusBadge($city->status) !!}</td>
                    </tr>
                    <tr>
                        <th>Created By</th>
                        <td>{{ $city->creator->name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Updated By</th>
                        <td>{{ $city->updater->name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{ $city->created_at->format('d M, Y h:i A') }}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>{{ $city->updated_at->format('d M, Y h:i A') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
