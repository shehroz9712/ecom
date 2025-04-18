@extends('admin.layouts.app')
@section('css')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>{{ $pageTitle }}</h3>
                    {{ Breadcrumbs::render('admin.tours.index') }}
                </div>

            </div>
        </div>
    </div>


    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-sm-12">
                <div class="card">

                    <form action="{{ route('admin.tours.store') }}" method="POST" enctype="multipart/form-data"
                        class="form theme-form">
                        @csrf
                        <div class="card-body">
                            <!-- User Selection -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Tour Name</label>
                                        <input type="text" name="tour_name" class="form-control"
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
                                            placeholder="Enter country">
                                        @error('country')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">City</label>
                                        <input type="text" name="city" class="form-control" placeholder="Enter city">
                                        @error('city')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea name="description" id="descriptionEditor" class="form-control"></textarea>
                                        @error('description')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Currency</label>
                                        <input type="text" name="currency" class="form-control"
                                            placeholder="Enter currency (e.g., USD)">
                                        @error('currency')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Price</label>
                                        <input type="number" name="price" class="form-control" placeholder="Enter price">
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


                            </div>



                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
@endsection
