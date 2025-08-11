@extends('user.layouts.app')
@section('content')
    <main class="main my-account">
        <div class="page-content pt-2">
            <div class="container">
                <div class=" tab-vertical row gutter-lg">
                    @include('user.user.sidebar')

                    <div class="tab-content mb-6">
                        <!-- Dashboard Tab -->
                        <div class="tab-pane active in" id="account-addresses">
                            <div class="align-items-center d-flex justify-content-between">

                                <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-map-marker">
                                        <i class="w-icon-map-marker"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title mb-0 ls-normal">Addresses</h4>
                                    </div>
                                </div>
                                <p>The following addresses will be used on the checkout page
                                    by default.</p>

                            </div>

                            <form action="{{ route('user.addresses.store') }}" method="post">

                                @csrf
                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <label for="full_name">Full Name</label>
                                        <input type="text" name="full_name" name="full_name" class="form-control" id="edit_full_name"
                                            required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" class="form-control" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="address_line_1">Address Line 1</label>
                                        <input type="text" name="address_line_1" class="form-control"
                                            id="edit_address_line_1" required>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="address_line_2">Address Line 2</label>
                                        <input type="text" name="address_line_2" class="form-control"
                                            id="edit_address_line_2">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Country *</label>
                                        <select name="country_id" id="country" name="country" class="form-control form-control-md"
                                            required>
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $c)
                                                <option value="{{ $c->id }}"
                                                    {{ (int) old('country_id') === (int) $c->id ? 'selected' : '' }}>
                                                    {{ $c->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>State/Province *</label>
                                        <select name="state_id" id="state" name="state" class="form-control form-control-md"
                                            required>
                                            <option value="">Select State</option>

                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>City *</label>
                                        <select name="city_id" id="city" name="city" class="form-control form-control-md" required>
                                            <option value="">Select City</option>

                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="postcode">Postcode</label>
                                        <input type="text" name="postcode" class="form-control" >
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label>
                                            <input type="checkbox" name="is_default" value="1">
                                            Set as default
                                        </label>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <button class="btn btn-dark btn-rounded btn-icon-right">Create
                                            Address<i class="w-icon-long-arrow-right"></i></button>
                                    </div>
                                </div>

                            </form>

                        </div>

                    </div>


                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')
    <script>
        const countryEl = document.getElementById('country');
        const stateEl = document.getElementById('state');
        const cityEl = document.getElementById('city');
        const routeStates = @json(route('user.geo.states'));
        const routeCities = @json(route('user.geo.cities'));
        const csrfToken = @json(csrf_token());
        countryEl?.addEventListener('change', function() {
            const cid = this.value;
            refreshStates(cid).finally(recalcTotals);
        });

        stateEl?.addEventListener('change', function() {
            const sid = this.value;
            refreshCities(sid).finally(recalcTotals);
        });

        function refreshStates(countryId) {
            stateEl.innerHTML = '<option value="">Loading...</option>';
            cityEl.innerHTML = '<option value="">Select City</option>';

            if (!countryId) {
                stateEl.innerHTML = '<option value="">Select State</option>';
                return Promise.resolve();
            }

            return fetch(`${routeStates}?country_id=${countryId}`)
                .then(res => res.json())
                .then(json => {
                    const opts = ['<option value="">Select State</option>'];
                    if (json.success) {
                        json.data.forEach(s => opts.push(`<option value="${s.id}">${s.name}</option>`));
                    }
                    stateEl.innerHTML = opts.join('');
                })
                .catch(() => {
                    stateEl.innerHTML = '<option value="">Select State</option>';
                });
        }

        function refreshCities(stateId) {
            cityEl.innerHTML = '<option value="">Loading...</option>';

            if (!stateId) {
                cityEl.innerHTML = '<option value="">Select City</option>';
                return Promise.resolve();
            }

            return fetch(`${routeCities}?state_id=${stateId}`)
                .then(res => res.json())
                .then(json => {
                    const opts = ['<option value="">Select City</option>'];
                    if (json.success) {
                        json.data.forEach(c => opts.push(`<option value="${c.id}">${c.name}</option>`));
                    }
                    cityEl.innerHTML = opts.join('');
                })
                .catch(() => {
                    cityEl.innerHTML = '<option value="">Select City</option>';
                });
        }
        $(document).ready(function() {
            // Toggle address forms
            $('.toggle-address-form').click(function() {
                const type = $(this).data('type');
                $(`#${type}-address-display`).hide();
                $(`#${type}-address-form`).show();
            });

            // Cancel button
            $(document).on('click', '.cancel-address-form', function() {
                const type = $(this).data('type');
                $(`#${type}-address-form`).hide();
                $(`#${type}-address-display`).show();
            });

            // Handle form submission
            $('form[id$="-address-form"]').on('submit', function(e) {
                e.preventDefault();
                const form = $(this);
                const type = form.find('input[name="type"]').val();

                $.ajax({
                    url: form.attr('action'),
                    method: form.attr('method'),
                    data: form.serialize(),
                    success: function(response) {
                        // Refresh the address display
                        $(`#${type}-address-display`).load(location.href +
                            ` #${type}-address-display > *`);
                        $(`#${type}-address-form`).hide();
                        $(`#${type}-address-display`).show();

                        // Show success message
                        alert('Address saved successfully');
                    },
                    error: function(xhr) {
                        // Handle errors
                        alert('An error occurred: ' + xhr.responseJSON.message);
                    }
                });
            });
        });
    </script>
@endsection
