@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Slider Detail</h3>
        <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">Back to List</a>
    </div>

    <div class="card p-4">
        <div class="row">
            <div class="col-md-6 mb-3">
                <h5>Title</h5>
                <p>{{ $slider->title }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <h5>Subtitle</h5>
                <p>{{ $slider->subtitle }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <h5>Button Text</h5>
                <p>{{ $slider->button_text }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <h5>Button Link</h5>
                <p>{{ $slider->button_link }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <h5>Background Image</h5>
                @if($slider->bgImage)
                    <img src="{{ asset('storage/' . $slider->bgImage->path) }}" class="img-fluid rounded" height="100">
                @endif
            </div>

            <div class="col-md-6 mb-3">
                <h5>Main Image</h5>
                @if($slider->mainImage)
                    <img src="{{ asset('storage/' . $slider->mainImage->path) }}" class="img-fluid rounded" height="100">
                @endif
            </div>

            <div class="col-md-6 mb-3">
                <h5>Background Color</h5>
                <div style="width: 60px; height: 30px; background-color: {{ $slider->bg_color }};"></div>
            </div>

            <div class="col-md-6 mb-3">
                <h5>Status</h5>
                <span class="badge bg-{{ $slider->status == 'active' ? 'success' : 'secondary' }}">
                    {{ ucfirst($slider->status) }}
                </span>
            </div>

            <div class="col-md-12 mb-3">
                <h5>Description</h5>
                <p>{{ $slider->description }}</p>
            </div>

            <div class="col-md-12 mb-3">
                <h5>Animation Options</h5>
                <pre>{{ $slider->animation_options }}</pre>
            </div>
        </div>
    </div>
</div>
@endsection
