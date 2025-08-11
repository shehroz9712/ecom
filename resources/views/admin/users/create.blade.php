@extends('admin.layouts.app')

@section('css')
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="page-header mb-4">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h3 class="mb-0">{{ $pageTitle ?? 'Create User' }}</h3>
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
                            <div class="address-group row mb-3">
                                {{-- Type --}}
                                <div class="col-md-2">
                                    <label>Type</label>
                                    <select name="addresses[0][type]" class="form-select">
                                        <option value="billing">Billing</option>
                                        <option value="shipping">Shipping</option>
                                    </select>
                                </div>

                                {{-- Full Name --}}
                                <div class="col-md-2">
                                    <label>Full Name</label>
                                    <input type="text" name="addresses[0][full_name]" class="form-control">
                                </div>

                                {{-- Phone --}}
                                <div class="col-md-2">
                                    <label>Phone</label>
                                    <input type="text" name="addresses[0][phone]" class="form-control">
                                </div>

                                {{-- Country --}}
                                <div class="col-md-2">
                                    <label>Country</label>
                                    <select name="addresses[0][country_id]" class="form-select country-select">
                                        <option value="">Select Country</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- State --}}
                                <div class="col-md-2">
                                    <label>State</label>
                                    <select name="addresses[0][state_id]" class="form-select state-select">
                                        <option value="">Select State</option>
                                    </select>
                                </div>

                                {{-- City --}}
                                <div class="col-md-2">
                                    <label>City</label>
                                    <select name="addresses[0][city_id]" class="form-select city-select">
                                        <option value="">Select City</option>
                                    </select>
                                </div>

                                {{-- Postcode --}}
                                <div class="col-md-2 mt-3">
                                    <label>Postcode</label>
                                    <input type="text" name="addresses[0][postcode]" class="form-control">
                                </div>

                                {{-- Address Line 1 --}}
                                <div class="col-md-3 mt-3">
                                    <label>Address Line 1</label>
                                    <input type="text" name="addresses[0][address_line_1]" class="form-control">
                                </div>

                                {{-- Address Line 2 --}}
                                <div class="col-md-3 mt-3">
                                    <label>Address Line 2</label>
                                    <input type="text" name="addresses[0][address_line_2]" class="form-control">
                                </div>

                                {{-- Default --}}
                                <div class="col-md-1 mt-4">
                                    <label>Default</label>
                                    <input type="checkbox" name="addresses[0][is_default]" value="1">
                                </div>

                                {{-- Remove Button --}}
                                <div class="col-md-1 d-flex align-items-end">
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

    // Add address row
    document.getElementById('add-address').addEventListener('click', function () {
        const wrapper = document.getElementById('address-wrapper');
        const template = wrapper.querySelector('.address-group').cloneNode(true);

        template.querySelectorAll('input, select').forEach(el => {
            let name = el.getAttribute('name');
            name = name.replace(/\[\d+\]/, `[${addressIndex}]`);
            el.setAttribute('name', name);
            el.value = '';
        });

        wrapper.appendChild(template);
        addressIndex++;
    });

    // Remove address
    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-address')) {
            e.target.closest('.address-group').remove();
        }
    });

    // Load states
    document.addEventListener('change', function (e) {
        if (e.target.classList.contains('country-select')) {
            const countryId = e.target.value;
            const stateSelect = e.target.closest('.address-group').querySelector('.state-select');
            const citySelect = e.target.closest('.address-group').querySelector('.city-select');

            stateSelect.innerHTML = '<option value="">Loading...</option>';
            citySelect.innerHTML = '<option value="">Select City</option>';

            fetch(`{{ route('user.geo.states') }}?country_id=${countryId}`)
                .then(res => res.json())
                .then(data => {
                    stateSelect.innerHTML = '<option value="">Select State</option>';
                    data.forEach(state => {
                        stateSelect.innerHTML += `<option value="${state.id}">${state.name}</option>`;
                    });
                });
        }
    });

    // Load cities
    document.addEventListener('change', function (e) {
        if (e.target.classList.contains('state-select')) {
            const stateId = e.target.value;
            const citySelect = e.target.closest('.address-group').querySelector('.city-select');

            citySelect.innerHTML = '<option value="">Loading...</option>';

            fetch(`{{ route('user.geo.cities') }}?state_id=${stateId}`)
                .then(res => res.json())
                .then(data => {
                    citySelect.innerHTML = '<option value="">Select City</option>';
                    data.forEach(city => {
                        citySelect.innerHTML += `<option value="${city.id}">${city.name}</option>`;
                    });
                });
        }
    });
</script>
@endsection
