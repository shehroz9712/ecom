@extends('user.layouts.app')
@section('content')
<main class="main my-account">
    <div class="page-content pt-2">
        <div class="container">
            <div class="tab tab-vertical row gutter-lg">
                @include('user.user.sidebar')

                <div class="tab-content mb-6">
                    <!-- Dashboard Tab -->
                    <div class="tab-pane active in" id="account-dashboard">
                        <div class="icon-box icon-box-side icon-box-light">
                            <span class="icon-box-icon icon-orders">
                                <i class="w-icon-orders"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title text-capitalize ls-normal mb-0">Orders</h4>
                            </div>
                        </div>
                        @if ($orders->count() > 0)
                        <table class="shop-table account-orders-table mb-6">
                            <thead>
                                <tr>
                                    <th class="order-id">Order</th>
                                    <th class="order-date">Date</th>
                                    <th class="order-status">Status</th>
                                    <th class="order-total">Total</th>
                                    <th class="order-actions">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td class="order-id">#{{ $order->order_number }}</td>
                                    <td class="order-date">{{ $order->created_at->format('F j, Y') }}</td>
                                    <td class="order-status">
                                        <span class="badge badge-{{ $order->status == 'completed' ? 'success' : 'danger' }}">
                                            {{ ucfirst($order->status == 'completed' ? 'success' : 'danger') }}
                                        </span>
                                    </td>
                                    <td class="order-total">
                                        <span class="order-price">{{ productAmount($order->total_amount) }}</span>
                                        for
                                        <span class="order-quantity">{{ $order->orderDetails->sum('qty') }}</span>
                                        items
                                    </td>
                                    <td class="order-action">
                                        <a href="{{ route('user.orders.show', encrypt($order->id)) }}"
                                            class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <p>You haven't placed any orders yet.</p>
                        @endif

                        <a href="{{ route('user.shop') }}" class="btn btn-dark btn-rounded btn-icon-right">
                            Go Shop <i class="w-icon-long-arrow-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
<!-- Address Modal -->
<div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="addressForm" method="POST" action="{{ route('user.addresses.store') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addressModalLabel">Add Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <div class="col-md-6 mb-3">
                        <label for="type">Type</label>
                        <select name="type" class="form-control" required>
                            <option value="billing">Billing</option>
                            <option value="shipping">Shipping</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="full_name">Full Name</label>
                        <input type="text" name="full_name" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="address_line_1">Address Line 1</label>
                        <input type="text" name="address_line_1" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="address_line_2">Address Line 2</label>
                        <input type="text" name="address_line_2" class="form-control">
                    </div>
                    <div class="row gutter-sm">
                        <div class="col-md-6 mb-3">
                            <label>Country *</label>
                            <select name="country_id" id="country" class="form-control form-control-md" required>
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
                            <select name="state_id" id="state" class="form-control form-control-md" required>
                                <option value="">Select State</option>

                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>City *</label>
                            <select name="city_id" id="city" class="form-control form-control-md" required>
                                <option value="">Select City</option>

                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="postcode">Postcode</label>
                            <input type="text" name="postcode" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>
                                <input type="checkbox" name="is_default" value="1">
                                Set as default
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save Address</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
        </form>
    </div>
</div>

@endsection
@section('js')
<script>
    const countryEl = document.getElementById('country');
    const stateEl = document.getElementById('state');
    const cityEl = document.getElementById('city');
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