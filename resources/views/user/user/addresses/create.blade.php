<form action="{{ isset($address) ? route('user.addresses.update', $address->id) : route('user.addresses.store') }}" method="POST">
    @csrf
    @if(isset($address))
        @method('PUT')
    @endif
    
    <input type="hidden" name="type" value="{{ $type }}">

    <div class="form-group">
        <label>Full Name</label>
        <input type="text" name="full_name" class="form-control" 
               value="{{ old('full_name', $address->full_name ?? '') }}" required>
    </div>

    <div class="form-group">
        <label>Company (Optional)</label>
        <input type="text" name="company" class="form-control" 
               value="{{ old('company', $address->company ?? '') }}">
    </div>

    <div class="form-group">
        <label>Address Line 1</label>
        <input type="text" name="address_line_1" class="form-control" 
               value="{{ old('address_line_1', $address->address_line_1 ?? '') }}" required>
    </div>

    <div class="form-group">
        <label>Address Line 2 (Optional)</label>
        <input type="text" name="address_line_2" class="form-control" 
               value="{{ old('address_line_2', $address->address_line_2 ?? '') }}">
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>City</label>
                <input type="text" name="city" class="form-control" 
                       value="{{ old('city', $address->city ?? '') }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>State/Province</label>
                <input type="text" name="state" class="form-control" 
                       value="{{ old('state', $address->state ?? '') }}" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Postal Code</label>
                <input type="text" name="postcode" class="form-control" 
                       value="{{ old('postcode', $address->postcode ?? '') }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Country</label>
                <select name="country" class="form-control" required>
                    @foreach(config('countries') as $code => $name)
                        <option value="{{ $code }}" 
                            {{ (old('country', $address->country ?? '') == $code) ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    @if ($type === 'billing')
        <div class="form-group">
            <label>Phone (Optional)</label>
            <input type="text" name="phone" class="form-control" 
                   value="{{ old('phone', $address->phone ?? '') }}">
        </div>
    @endif

    <div class="form-check mb-3">
        <input type="checkbox" name="is_default" id="is_default_{{ $type }}" 
               class="form-check-input" value="1"
               {{ (isset($address) && $address->is_default) ? 'checked' : '' }}>
        <label for="is_default_{{ $type }}" class="form-check-label">
            Set as default {{ $type }} address
        </label>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save Address</button>
        <button type="button" class="btn btn-secondary cancel-address-form" data-type="{{ $type }}">
            Cancel
        </button>
    </div>
</form>