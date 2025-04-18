@extends('admin.layouts.app')
@section('css')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>{{ $pageTitle }}</h3>
                    {{ Breadcrumbs::render('admin.tours.edit', $tour) }}
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
                        @method('PUT') <!-- Laravel method spoofing for update -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Tour Name</label>
                                        <input type="text" name="tour_name" class="form-control"
                                            value="{{ old('tour_name', $tour->tour_name ?? '') }}"
                                            placeholder="Enter tour name">
                                        @error('tour_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Destination</label>
                                        <input type="text" name="destination" class="form-control"
                                            value="{{ old('destination', $tour->destination ?? '') }}"
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
                                            value="{{ old('country', $tour->country ?? '') }}" placeholder="Enter country">
                                        @error('country')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">City</label>
                                        <input type="text" name="city" class="form-control"
                                            value="{{ old('city', $tour->city ?? '') }}" placeholder="Enter city">
                                        @error('city')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea name="description" id="descriptionEditor" class="form-control">{{ old('description', $tour->description ?? '') }}</textarea>
                                        @error('description')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Currency</label>
                                        <input type="text" name="currency" class="form-control"
                                            value="{{ old('currency', $tour->currency ?? '') }}"
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
                                            value="{{ old('price', $tour->price ?? '') }}" placeholder="Enter price">
                                        @error('price')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Tour Image</label>
                                        <input type="file" name="image" class="form-control" accept="image/*"
                                            onchange="previewImage(event)">
                                        @error('image')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Image Preview</label>
                                        <img id="tourImagePreview"
                                            src="{{ asset('assets/uploads/tour/' . $tour->tour_img) }}"
                                            class="img-thumbnail" style="max-width: 200px;">
                                    </div>
                                </div>
                            </div>



                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('admin.tours.index') }}" class="btn btn-light">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
@section('js')
    <!-- Container-fluid starts-->
    <script src="https://cdn.tiny.cloud/1/angawkv2xx2vxc4g4fmmz2kga206yrhmrnuu1i2avvbr1n6d/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: '#descriptionEditor',
            height: 300,
            menubar: false,
            plugins: 'lists link image preview',
            toolbar: 'undo redo | bold italic | bullist numlist | link image preview',
        });

        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                document.getElementById('tourImagePreview').src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
