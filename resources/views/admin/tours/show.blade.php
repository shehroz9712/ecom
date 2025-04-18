@extends('admin.layouts.app')
@section('css')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>{{ $pageTitle }}</h3>
                    {{ Breadcrumbs::render('admin.tours.show', $tour) }}
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
                        {{ $tour->tour_name }}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Destination:</strong> {{ $tour->destination }}</p>
                                <p><strong>Country:</strong> {{ $tour->country }}</p>
                                <p><strong>City:</strong> {{ $tour->city }}</p>
                                <p><strong>Duration:</strong> {{ $tour->duration ?? 'N/A' }}</p>
                                <p><strong>Price:</strong> {{ $tour->currency }} {{ $tour->price }}</p>
                                <p><strong>Status:</strong>
                                    @if ($tour->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-6">
                                @if ($tour->tour_img)
                                    <img src="{{ asset('assets/uploads/tour/' . $tour->tour_img) }}" alt="Tour Image"
                                        class="img-fluid rounded shadow">
                                @else
                                    <p>No image available</p>
                                @endif
                            </div>
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('admin.tours.index') }}" class="btn btn-secondary">Back to List</a>
                            <a href="{{ route('admin.tours.edit', $tour->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.tours.destroy', $tour->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this tour?')">Delete</button>
                            </form>
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
