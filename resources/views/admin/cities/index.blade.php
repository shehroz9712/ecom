@extends('admin.layouts.app')

@section('css')
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="page-header d-flex justify-content-between align-items-center">
        <div>
            <h3 class="mb-0">Cities</h3>
            {{ Breadcrumbs::render('admin.cities.index') }}
        </div>
        <a href="{{ route('admin.cities.create') }}" class="btn btn-primary">Add New City</a>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="basic-1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>State</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cities as $city)
                            <tr>
                                <td>{{ $city->id }}</td>
                                <td>{{ $city->name }}</td>
                                <td>{{ $city->state->name ?? '-' }}</td>
                                <td>{!! StatusBadge($city->status) !!}</td>
                                <td>{{ $city->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.cities.show', $city->id) }}" class="btn btn-sm btn-info">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <a href="{{ route('admin.cities.edit', $city->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fa fa-pencil"></i>
                                    </a>

                                    <form action="{{ route('admin.cities.destroy', $city->id) }}"
                                          method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure?')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<!-- Optional: If you're using DataTables or other JS libraries -->
@endsection
