@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="page-header mb-4">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h3 class="mb-0">Edit Slider</h3>
                    {{ Breadcrumbs::render('admin.sliders.edit', $slider) }}
                </div>
            </div>
        </div>

        <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data"
            class="card">
            @csrf
            @method('PUT')

            <div class="card-body row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" value="{{ old('title', $slider->title) }}" class="form-control">
                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Subtitle</label>
                    <input type="text" name="subtitle" value="{{ old('subtitle', $slider->subtitle) }}"
                        class="form-control">
                    @error('subtitle')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Background Image</label>
                    <input type="file" name="bg_image" class="form-control">
                    @if ($slider->bgImage)
                        <small class="d-block mt-1">Current: <img src="{{ asset('storage/' . $slider->bgImage->path) }}"
                                alt="bg image" height="40"></small>
                    @endif
                    @error('bg_image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Main Image</label>
                    <input type="file" name="main_image" class="form-control">
                    @if ($slider->mainImage)
                        <small class="d-block mt-1">Current: <img src="{{ asset('storage/' . $slider->mainImage->path) }}"
                                alt="main image" height="40"></small>
                    @endif
                    @error('main_image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Button Text</label>
                    <input type="text" name="button_text" value="{{ old('button_text', $slider->button_text) }}"
                        class="form-control">
                    @error('button_text')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Button Link</label>
                    <input type="text" name="button_link" value="{{ old('button_link', $slider->button_link) }}"
                        class="form-control">
                    @error('button_link')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Background Color</label>
                    <input type="color" name="bg_color" value="{{ old('bg_color', $slider->bg_color) }}"
                        class="form-control form-control-color">
                    @error('bg_color')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" rows="3" class="form-control">{{ old('description', $slider->description) }}</textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Animation Options</label>
                    <textarea name="animation_options" rows="2" class="form-control">{{ old('animation_options', $slider->animation_options) }}</textarea>
                    @error('animation_options')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="active" {{ old('status', $slider->status) === 'active' ? 'selected' : '' }}>Active
                        </option>
                        <option value="inactive" {{ old('status', $slider->status) === 'inactive' ? 'selected' : '' }}>
                            Inactive</option>
                    </select>
                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

            </div>

            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Update Slider</button>
                <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
