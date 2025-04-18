@extends('admin.layouts.app')
@section('css')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>{{ $pageTitle }}</h3>
                    {{-- {{ Breadcrumbs::render('admin.tours.index') }} --}}
                </div>

            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-sm-12">
                <div class="card">
                    <form action="{{ route('admin.tours.update', $tour->id) }}" method="POST" enctype="multipart/form-data"
                        class="form theme-form">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Tour Name</label>
                                        <input type="text" name="tour_name" class="form-control"
                                            value="{{ old('tour_name', $tour->tour_name) }}" placeholder="Enter tour name">
                                        @error('tour_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Destination</label>
                                        <input type="text" name="destination" class="form-control"
                                            value="{{ old('destination', $tour->destination) }}"
                                            placeholder="Enter destination">
                                        @error('destination')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Country</label>
                                        <input type="text" name="country" class="form-control"
                                            value="{{ old('country', $tour->country) }}" placeholder="Enter country">
                                        @error('country')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">City</label>
                                        <input type="text" name="city" class="form-control"
                                            value="{{ old('city', $tour->city) }}" placeholder="Enter city">
                                        @error('city')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Duration</label>
                                        <input type="text" name="duration" class="form-control"
                                            value="{{ old('duration', $tour->duration) }}"
                                            placeholder="Enter duration (e.g., 3 days)">
                                        @error('duration')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Currency</label>
                                        <input type="text" name="currency" class="form-control"
                                            value="{{ old('currency', $tour->currency) }}"
                                            placeholder="Enter currency (e.g., USD)">
                                        @error('currency')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Price</label>
                                        <input type="number" name="price" class="form-control"
                                            value="{{ old('price', $tour->price) }}" placeholder="Enter price">
                                        @error('price')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Tour Image</label>
                                        <input type="file" name="tour_img" class="form-control">
                                        @if ($tour->tour_img)
                                            <img src="{{ asset('storage/' . $tour->tour_img) }}" alt="Tour Image"
                                                width="120" class="mt-2">
                                        @endif
                                        @error('tour_img')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select name="is_active" class="form-select">
                                            <option value="1"
                                                {{ old('is_active', $tour->is_active) == 1 ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="0"
                                                {{ old('is_active', $tour->is_active) == 0 ? 'selected' : '' }}>Inactive
                                            </option>
                                        </select>
                                        @error('is_active')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('admin.tours.index') }}" class="btn btn-light">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
@section('js')
@endsection
