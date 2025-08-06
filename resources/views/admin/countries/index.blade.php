@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="page-header mb-4 d-flex justify-content-between align-items-center">
        <h3 class="mb-0">Countries</h3>
        <a href="{{ route('admin.countries.create') }}" class="btn btn-primary">+ Add Country</a>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($countries as $country)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $country->name }}</td>
                            <td>{{ $country->code }}</td>
                            <td>
                                <span class="badge bg-{{ $country->status === 'active' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($country->status) }}
                                </span>
                            </td>
                            <td>{{ $country->created_at->format('d M Y') }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.countries.show', $country->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('admin.countries.edit', $country->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.countries.destroy', $country->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Delete this country?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center">No countries found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
