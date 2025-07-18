@extends('admin.layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>{{ $pageTitle ?? 'Attribute Details' }}</h3>
                    {{ Breadcrumbs::render('admin.attributes.show', $attribute) }}
                </div>
            </div>
        </div>
    </div>

    <!-- Attribute Details -->
    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        {{ $attribute->name }}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Attribute Info -->
                            <div class="col-md-6">
                                <p><strong>Name:</strong> {{ $attribute->name }}</p>
                                <p><strong>Slug:</strong> {{ $attribute->slug }}</p>
                                <p><strong>Created At:</strong> {{ $attribute->created_at->format('d M, Y') }}</p>
                                <p><strong>Status:</strong> {!! adminStatusBadge($attribute->status) !!}</p>
                            </div>

                            <!-- Attribute Values -->
                            <div class="col-md-6">
                                <h5>Attribute Values</h5>
                                @forelse($attribute->values as $value)
                                    <div class="mb-2 border p-2 rounded">
                                        <p><strong>Value:</strong> {{ $value->value }}</p>
                                        <p><strong>Slug:</strong> {{ $value->slug }}</p>
                                        @if ($value->is_default)
                                            <span class="badge bg-success">Default</span>
                                        @endif
                                    </div>
                                @empty
                                    <p>No values available</p>
                                @endforelse
                            </div>
                        </div>

                        <!-- Footer buttons -->
                        <div class="mt-4">
                            <a href="{{ route('admin.attributes.index') }}" class="btn btn-secondary">Back to List</a>
                            <a href="{{ route('admin.attributes.edit', $attribute->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.attributes.destroy', $attribute->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this attribute?')">Delete</button>
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
