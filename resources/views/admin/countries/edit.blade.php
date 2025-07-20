@extends('admin.layouts.app')

@section('css')
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="page-header mb-4">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h3 class="mb-0">{{ $pageTitle ?? 'Edit User' }}</h3>
                {{ Breadcrumbs::render('admin.users.edit', $user) }}
            </div>
        </div>
    </div>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="form theme-form">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="card-body">
                <div class="row">

                    {{-- Name --}}
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    {{-- Status --}}
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="active" {{ old('status', $user->status) === 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status', $user->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    {{-- Password (optional) --}}
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">New Password (optional)</label>
                            <input type="password" name="password" class="form-control" placeholder="Leave blank to keep current password">
                            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                </div>

                {{-- Address Loop --}}
                <h5 class="mt-4">Addresses</h5>
                <div id="addresses">
                    @foreach ($user->addresses as $index => $address)
                        <div class="border p-3 mb-3 rounded">
                            <input type="hidden" name="addresses[{{ $index }}][id]" value="{{ $address->id }}">

                            <div class="row">
                                <div class="col-md-3">
                                    <label>Type</label>
                                    <select name="addresses[{{ $index }}][type]" class="form-select">
                                        <option value="billing" {{ $address->type == 'billing' ? 'selected' : '' }}>Billing</option>
                                        <option value="shipping" {{ $address->type == 'shipping' ? 'selected' : '' }}>Shipping</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>Full Name</label>
                                    <input type="text" name="addresses[{{ $index }}][full_name]" class="form-control" value="{{ $address->full_name }}">
                                </div>
                                <div class="col-md-3">
                                    <label>Phone</label>
                                    <input type="text" name="addresses[{{ $index }}][phone]" class="form-control" value="{{ $address->phone }}">
                                </div>
                                <div class="col-md-3">
                                    <label>Company</label>
                                    <input type="text" name="addresses[{{ $index }}][company]" class="form-control" value="{{ $address->company }}">
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label>Address Line 1</label>
                                    <input type="text" name="addresses[{{ $index }}][address_line_1]" class="form-control" value="{{ $address->address_line_1 }}">
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label>Address Line 2</label>
                                    <input type="text" name="addresses[{{ $index }}][address_line_2]" class="form-control" value="{{ $address->address_line_2 }}">
                                </div>
                                <div class="col-md-3 mt-2">
                                    <label>City</label>
                                    <input type="text" name="addresses[{{ $index }}][city]" class="form-control" value="{{ $address->city }}">
                                </div>
                                <div class="col-md-3 mt-2">
                                    <label>State</label>
                                    <input type="text" name="addresses[{{ $index }}][state]" class="form-control" value="{{ $address->state }}">
                                </div>
                                <div class="col-md-3 mt-2">
                                    <label>Postcode</label>
                                    <input type="text" name="addresses[{{ $index }}][postcode]" class="form-control" value="{{ $address->postcode }}">
                                </div>
                                <div class="col-md-3 mt-2">
                                    <label>Country</label>
                                    <input type="text" name="addresses[{{ $index }}][country]" class="form-control" value="{{ $address->country }}">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Update User</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-light">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection

@section('js')
@endsection
