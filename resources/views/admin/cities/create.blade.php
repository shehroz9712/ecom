@extends('admin.layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="page-header mb-4">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h3 class="mb-0">{{ $pageTitle }}</h3>
                    {{ Breadcrumbs::render('admin.users.create') }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{ route('admin.users.store') }}" method="POST" class="form theme-form">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                {{-- Name --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter name">
                                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                {{-- Email --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Enter email">
                                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                {{-- Password --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Enter password">
                                    @error('password') <small class="text-danger">{{ $message }}</small> @enderror
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

                            <hr>
                            <h5 class="mb-3">Addresses</h5>

                            <div id="address-wrapper">
                                {{-- Address Row Template --}}
                                <div class="address-group row mb-3">
                                    <div class="col-md-2">
                                        <label>Type</label>
                                        <select name="addresses[0][type]" class="form-select">
                                            <option value="billing">Billing</option>
                                            <option value="shipping">Shipping</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Full Name</label>
                                        <input type="text" name="addresses[0][full_name]" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <label>Company</label>
                                        <input type="text" name="addresses[0][company]" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <label>City</label>
                                        <input type="text" name="addresses[0][city]" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <label>Country</label>
                                        <input type="text" name="addresses[0][country]" class="form-control">
                                    </div>
                                    <div class="col-md-2 d-flex align-items-end">
                                        <button type="button" class="btn btn-danger btn-sm remove-address">Remove</button>
                                    </div>
                                </div>
                            </div>

                            <button type="button" id="add-address" class="btn btn-outline-primary btn-sm mb-3">+ Add Address</button>
                        </div>

                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">Create User</button>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-light">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        let addressIndex = 1;
        document.getElementById('add-address').addEventListener('click', function () {
            const wrapper = document.getElementById('address-wrapper');
            const newRow = document.createElement('div');
            newRow.classList.add('row', 'mb-3', 'address-group');
            newRow.innerHTML = `
                <div class="col-md-2">
                    <select name="addresses[${addressIndex}][type]" class="form-select">
                        <option value="billing">Billing</option>
                        <option value="shipping">Shipping</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <input type="text" name="addresses[${addressIndex}][full_name]" class="form-control" placeholder="Full Name">
                </div>
                <div class="col-md-2">
                    <input type="text" name="addresses[${addressIndex}][company]" class="form-control" placeholder="Company">
                </div>
                <div class="col-md-2">
                    <input type="text" name="addresses[${addressIndex}][city]" class="form-control" placeholder="City">
                </div>
                <div class="col-md-2">
                    <input type="text" name="addresses[${addressIndex}][country]" class="form-control" placeholder="Country">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="button" class="btn btn-danger btn-sm remove-address">Remove</button>
                </div>
            `;
            wrapper.appendChild(newRow);
            addressIndex++;
        });

        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-address')) {
                e.target.closest('.address-group').remove();
            }
        });
    </script>
@endsection
