@extends('admin.layouts.app')

@section('css')
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="page-header mb-4">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h3 class="mb-0">{{ $pageTitle ?? 'Create Category' }}</h3>
                {{ Breadcrumbs::render('admin.categories.create') }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body row">
                        {{-- Name --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter category name">
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Slug --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Slug</label>
                            <input type="text" name="slug" value="{{ old('slug') }}" class="form-control" placeholder="Enter slug">
                            @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Icon --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Icon</label>
                            <input type="text" name="icon" value="{{ old('icon') }}" class="form-control" placeholder="Icon class (optional)">
                            @error('icon') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Image --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" class="form-control">
                            @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Order --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Order</label>
                            <input type="number" name="order" value="{{ old('order', 0) }}" class="form-control">
                            @error('order') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Status --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Create Category</button>
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-light">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
