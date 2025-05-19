@extends('user.layouts.app')
@section('content')
    <div class="container">
        <h1>Add New {{ ucfirst($type) }} Address</h1>

        <form action="{{ route('user.addresses.store') }}" method="POST">
            @csrf
            <input type="hidden" name="type" value="{{ $type }}">

            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="full_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Company (Optional)</label>
                <input type="text" name="company" class="form-control">
            </div>

            <div class="form-group">
                <label>Address Line 1</label>
                <input type="text" name="address_line_1" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Address Line 2 (Optional)</label>
                <input type="text" name="address_line_2" class="form-control">
            </div>

            <div class="form-group">
                <label>City</label>
                <input type="text" name="city" class="form-control" required>
            </div>

            <div class="form-group">
                <label>State/Province</label>
                <input type="text" name="state" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Postal Code</label>
                <input type="text" name="postcode" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Country</label>
                <select name="country" class="form-control" required>
                    <!-- Populate with countries -->
                    <option value="US">United States</option>
                    <option value="CA">Canada</option>
                    <!-- Add more countries as needed -->
                </select>
            </div>

            @if ($type === 'billing')
                <div class="form-group">
                    <label>Phone (Optional)</label>
                    <input type="text" name="phone" class="form-control">
                </div>
            @endif

            <div class="form-check mb-3">
                <input type="checkbox" name="is_default" id="is_default" class="form-check-input" value="1">
                <label for="is_default" class="form-check-label">Set as default {{ $type }} address</label>
            </div>

            <button type="submit" class="btn btn-primary">Save Address</button>
        </form>
    </div>
@endsection
