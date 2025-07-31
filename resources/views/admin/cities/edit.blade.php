@extends('admin.layouts.app')

@section('css')
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h3>Edit City</h3>
                {{ Breadcrumbs::render('admin.cities.edit', $city) }}
            </div>
            <div class="col-sm-6 text-end">
                <a href="{{ route('admin.cities.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.cities.update', $city->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header"><h5>City Information</h5></div>
            <div class="card-body row g-3">

                <div class="col-md-6">
                    <label for="name" class="form-label">City Name <span class="text-danger">*</span></label>
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name', $city->name) }}" required>
                    @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6">
                    <label for="state_id" class="form-label">State <span class="text-danger">*</span></label>
                    <select id="state_id" name="state_id" class="form-control @error('state_id') is-invalid @enderror" required>
                        <option value="">-- Select State --</option>
                        @foreach($states as $state)
                            <option value="{{ $state->id }}" {{ (old('state_id', $city->state_id) == $state->id) ? 'selected' : '' }}>
                                {{ $state->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('state_id') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6">
                    <label for="status" class="form-label">Status</label>
                    <select id="status" name="status" class="form-control @error('status') is-invalid @enderror">
                        <option value="active" {{ old('status', $city->status) === 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status', $city->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>

            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Update City</button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('js')
@endsection
