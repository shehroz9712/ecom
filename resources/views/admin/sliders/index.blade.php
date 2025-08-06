@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Sliders</h3>
        <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary">Add New Slider</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Main Image</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sliders as $slider)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $slider->title }}</td>
                            <td>
                                @if($slider->mainImage)
                                    <img src="{{ asset('storage/' . $slider->mainImage->path) }}" alt="" height="40">
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-{{ $slider->status === 'active' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($slider->status) }}
                                </span>
                            </td>
                            <td>{{ $slider->created_at->format('d M Y') }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.sliders.show', $slider->id) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('admin.sliders.edit', $slider->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Delete this slider?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center">No sliders found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
