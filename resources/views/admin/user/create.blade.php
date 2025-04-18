@extends('admin.layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>{{ $pageTitle }}</h3>
                    {{ Breadcrumbs::render('admin.users.index') }}

                </div>
            </div>
        </div>
    </div>

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row starter-main">
            <div class="col-sm-12">
                <div class="card">

                    <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data"
                        class="form theme-form">
                        @csrf

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">First Name</label>
                                        <input type="text" name="first_name" class="form-control"
                                            value="{{ old('first_name') }}" placeholder="Enter first name">
                                        @error('first_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" name="last_name" class="form-control"
                                            value="{{ old('last_name') }}" placeholder="Enter last name">
                                        @error('last_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ old('email') }}" placeholder="Enter email">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Enter password">
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" name="phone_number" class="form-control"
                                            value="{{ old('phone_number') }}" placeholder="Enter phone number">
                                        @error('phone_number')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Company</label>
                                        <input type="text" name="company" class="form-control"
                                            value="{{ old('company') }}" placeholder="Enter Company">
                                        @error('company')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>





                        </div>

                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-light">Cancel</a>
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
