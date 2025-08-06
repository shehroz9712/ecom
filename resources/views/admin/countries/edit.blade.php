@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="page-header mb-4">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h3 class="mb-0">Edit Country</h3>
                {{ Breadcrumbs::render('admin.countries.edit', $country) }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('admin.countries.update', $country->id) }}" method="POST" class="form theme-form">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            {{-- Name --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $country->name) }}" placeholder="Enter country name">
                                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            {{-- Code --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Code</label>
                                <input type="text" name="code" class="form-control" value="{{ old('code', $country->code) }}" placeholder="Enter country code">
                                @error('code') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            {{-- Status --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option value="active" {{ $country->status === 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ $country->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.countries.index') }}" class="btn btn-light">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
