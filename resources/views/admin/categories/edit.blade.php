@extends('admin.layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="page-header mb-4">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h3 class="mb-0">{{ $pageTitle }}</h3>
                    {{ Breadcrumbs::render('admin.categories.edit', $category) }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST"
                        enctype="multipart/form-data" class="form theme-form">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                {{-- Name --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ old('name', $category->name) }}" placeholder="Enter name">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Slug --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Slug</label>
                                    <input type="text" name="slug" class="form-control"
                                        value="{{ old('slug', $category->slug) }}" placeholder="Enter slug">
                                    @error('slug')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Icon --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Icon</label>
                                    <input type="text" name="icon" class="form-control"
                                        value="{{ old('icon', $category->icon) }}" placeholder="Enter icon (optional)">
                                    @error('icon')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Image --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Image</label>
                                    <input type="file" name="image" class="form-control">
                                    @if ($category->image)
                                        <img src="{{ asset('storage/' . $category->image) }}" alt="image" width="60"
                                            class="mt-2">
                                    @endif
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Order --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Order</label>
                                    <input type="number" name="order" class="form-control"
                                        value="{{ old('order', $category->order ?? 0) }}"
                                        placeholder="Enter display order">
                                    @error('order')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Status --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select">
                                        <option value="active"
                                            {{ old('status', $category->status) === 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="inactive"
                                            {{ old('status', $category->status) === 'inactive' ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                    @error('status')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">Update Category</button>
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-light">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
