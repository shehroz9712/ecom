@extends('user.layouts.app')

@section('title', 'Checkout')

@section('content')

    <main class="main checkout">
        <div class="page-content">
            <div class="container">

                {{-- =======================
                     GUEST LOGIN TOGGLE
                ======================== --}}
                @guest('web')
                    <div class="login-toggle">
                        Returning customer?
                        <a href="#" class="show-login font-weight-bold text-uppercase text-dark">Login</a>
                    </div>
                    <form class="login-content d-none" method="POST" action="{{ route('login') }}">
                        @csrf
                        <p>If you have shopped with us before, please enter your details below.</p>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Username or email *</label>
                                    <input type="text" class="form-control form-control-md" name="email">
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Password *</label>
                                    <input type="password" class="form-control form-control-md" name="password">
                                </div>
                            </div>
                        </div>
                        <div class="form-group checkbox">
                            <input type="checkbox" class="custom-checkbox" id="remember" name="remember">
                            <label for="remember" class="mb-0 lh-2">Remember me</label>
                            <a href="{{ route('password.request') }}" class="ml-3">Lost your password?</a>
                        </div>
                        <button type="submit" class="btn btn-rounded btn-login">Login</button>
                    </form>
                @endguest

                {{-- =======================
                          COUPON
                ======================== --}}
                <div class="coupon-toggle">
                    Have a coupon?
                    <a href="#" class="show-coupon font-weight-bold text-uppercase text-dark">Enter your code</a>
                </div>
                <div class="coupon-content mb-4 d-none">
                    <p>If you have a coupon code, please apply it below.</p>
                    <div class="input-wrapper-inline">
                        <input type="text" id="coupon_code" class="form-control form-control-md mr-1 mb-2"
                            placeholder="Coupon code">
                        <button type="button" class="btn button btn-rounded btn-coupon mb-2" id="apply-coupon-btn">
                            Apply Coupon
                        </button>
                    </div>
                </div>

                {{-- =======================
                        CHECKOUT FORM
                ======================== --}}
                <form action="{{ route('user.checkout.process') }}" method="POST" id="checkoutForm"
                    class="form checkout-form">
                    @csrf

                    {{-- hidden raw fields for server validation at submit --}}
                    <input type="hidden" name="applied_coupon_code" id="applied_coupon_code" value="">
                    <input type="hidden" name="applied_coupon_id" id="applied_coupon_id" value="">
                    <input type="hidden" name="discount_raw" id="discount_raw" value="0">
                    <input type="hidden" name="shipping_cost_raw" id="shipping_cost_raw" value="0">
                    <input type="hidden" name="shipping_label" id="shipping_label" value="">
                    <input type="hidden" name="subtotal_raw" id="subtotal_raw" value="{{ $subtotal }}">
                    <input type="hidden" name="order_total_raw" id="order_total_raw" value="{{ $subtotal }}">
                    <div class="row mb-9">
                        {{-- =======================
                           BILLING DETAILS (Left)
                        ======================== --}}
                        <div class="col-lg-7 pr-lg-4 mb-4">
                            <h3 class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0">Billing Details</h3>

                            <div class="row gutter-sm">
                                <div class="col-xs-6 mb-3">
                                    <div class="form-group">
                                        <label>First Name *</label>
                                        <input type="text" name="first_name" class="form-control form-control-md"
                                            value="{{ old('first_name', auth('web')->user()->first_name ?? '') }}" required>
                                    </div>
                                </div>
                                <div class="col-xs-6 mb-3">
                                    <div class="form-group">
                                        <label>Last Name *</label>
                                        <input type="text" name="last_name" class="form-control form-control-md"
                                            value="{{ old('last_name', auth('web')->user()->last_name ?? '') }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Email Address *</label>
                                <input type="email" name="email" class="form-control form-control-md"
                                    value="{{ old('email', auth('web')->user()->email ?? '') }}" required>
                            </div>

                            @guest('web')
                                <div class="form-group checkbox-toggle pb-2">
                                    <input type="checkbox" class="custom-checkbox" id="createAccountCheckbox"
                                        name="create_account">
                                    <label for="createAccountCheckbox">Create an account?</label>
                                </div>
                                <div id="accountFields" class="d-none">
                                    <div class="form-group mb-3">
                                        <label>Password *</label>
                                        <input type="password" name="password" id="password"
                                            class="form-control form-control-md">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Confirm Password *</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control form-control-md">
                                    </div>
                                </div>
                            @endguest

                            <div class="form-group mb-3">
                                <label>Phone *</label>
                                <input type="text" name="phone" class="form-control form-control-md"
                                    value="{{ old('phone', auth('web')->user()->phone ?? '') }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label>Street Address *</label>
                                <input type="text" placeholder="House number and street name" name="address"
                                    class="form-control form-control-md mb-2"
                                    value="{{ old('address', optional($defaultAddress)->address_line_1) }}" required>
                                <input type="text" placeholder="Apartment, suite, unit, etc. (optional)"
                                    name="address_2" class="form-control form-control-md"
                                    value="{{ old('address_2', optional($defaultAddress)->address_line_2) }}">
                            </div>

                            {{-- Country -> State -> City --}}
                            <div class="row gutter-sm">
                                <div class="col-md-6 mb-3">
                                    <label>Country *</label>
                                    <select name="country_id" id="country" class="form-control form-control-md"
                                        required>
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $c)
                                            <option value="{{ $c->id }}"
                                                {{ (int) old('country_id', $prefillCountryId) === (int) $c->id ? 'selected' : '' }}>
                                                {{ $c->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>State/Province *</label>
                                    <select name="state_id" id="state" class="form-control form-control-md" required>
                                        <option value="">Select State</option>
                                        @foreach ($states as $s)
                                            <option value="{{ $s->id }}"
                                                {{ (int) old('state_id', $prefillStateId) === (int) $s->id ? 'selected' : '' }}>
                                                {{ $s->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>City *</label>
                                    <select name="city_id" id="city" class="form-control form-control-md" required>
                                        <option value="">Select City</option>
                                        @foreach ($cities as $ct)
                                            <option value="{{ $ct->id }}"
                                                {{ (int) old('city_id', $prefillCityId) === (int) $ct->id ? 'selected' : '' }}>
                                                {{ $ct->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Postal Code *</label>
                                    <input type="text" name="postal_code" class="form-control form-control-md"
                                        value="{{ old('postal_code', optional($defaultAddress)->postcode) }}">
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <label for="order-notes">Order notes (optional)</label>
                                <textarea class="form-control mb-0" id="order-notes" name="order_notes" cols="30" rows="4"
                                    placeholder="Notes about your order, e.g. special instructions">{{ old('order_notes') }}</textarea>
                            </div>
                        </div>

                        {{-- =======================
                          ORDER SUMMARY (Right)
                        ======================== --}}
                        <div class="col-lg-5 mb-4 sticky-sidebar-wrapper">
                            <div class="order-summary-wrapper sticky-sidebar">
                                <h3 class="title text-uppercase ls-10">Your Order</h3>
                                <div class="order-summary">
                                    <table class="order-table">
                                        <thead>
                                            <tr>
                                                <th><b>Product</b></th>
                                                <th><b>Qty</b></th>
                                                <th><b>Price</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $subtotalB = 0.0;
                                                $totalWeightB = 0.0;
                                            @endphp

                                            @foreach ($cartItems as $item)
                                                @php
                                                    $line = (float) $item->price * (int) $item->qty;
                                                    $subtotalB += $line;
                                                    $w = (float) ($item->product->weight ?? 0);
                                                    $totalWeightB += $w * (int) $item->qty;
                                                @endphp
                                                <tr class="bb-no">
                                                    <td class="product-name">
                                                        {{ $item->product->name }}
                                                        @if ($item->variant && $item->variant->attributes)
                                                            ({{ $item->variant->attributes->pluck('attributeValue.value')->join(', ') }})
                                                        @endif

                                                    </td>
                                                    <td>
                                                        <span class="product-quantity">{{ $item->qty }}</span> × <span
                                                            class="product-quantity">{{ $item->price }}</span>
                                                    </td>
                                                    <td class="product-total">{{ productAmount($line) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                        <tfoot>
                                            <tr class="cart-subtotal bb-no">
                                                <td colspan="2"><b>Subtotal</b></td>
                                                <td><b id="subtotal-amount">{{ productAmount($subtotal) }}</b></td>
                                            </tr>

                                            {{-- hidden initially, shown after coupon applied --}}
                                            <tr id="discount-row" class="d-none">
                                                <td colspan="2"><b>Discount (<span id="applied-code"></span>)</b></td>
                                                <td><b id="discount-amount">-</b></td>
                                            </tr>

                                            {{-- Shipping --}}
                                            <tr class="shipping-row">
                                                <td colspan="2">
                                                    <b>Shipping</b>
                                                    <div class="small text-muted" id="shipping-note"></div>
                                                </td>
                                                <td><b id="shipping-amount">{{ productAmount(0) }}</b></td>
                                            </tr>

                                            <tr class="order-total">
                                                <td colspan="2"><b>Total</b></th>
                                                <td><b id="order-total">{{ productAmount($subtotal) }}</b></td>
                                            </tr>
                                        </tfoot>
                                    </table>

                                    {{-- Payment --}}
                                    <div class="payment-methods" id="payment_method">
                                        <h4 class="title font-weight-bold ls-25 pb-0 mb-1">Payment Methods</h4>
                                        <div class="accordion payment-accordion">
                                            <div class="card">
                                                <div class="card-header">
                                                    <label>
                                                        <input type="radio" name="payment_method" value="cod"
                                                            class="me-2" checked>
                                                        Cash on Delivery
                                                    </label>
                                                </div>
                                                <div class="card-body collapsed">
                                                    <p class="mb-0">Pay with cash upon delivery.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Submit --}}
                                    <div class="form-group place-order pt-6">
                                        <button type="submit" class="btn btn-dark btn-block btn-rounded">
                                            Place Order
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div> {{-- /.row --}}
                </form>

            </div>
        </div>
    </main>

    @php
        $shippingRules = is_string($settings->shipping ?? null)
            ? (json_decode($settings->shipping, true) ?:
            [])
            : $settings->shipping ?? [];
        $currency = $settings->currency ?? 'PKR';
        $currencyPosition = ($settings->currency_position ?? 'left') === 'right' ? 'right' : 'left';
    @endphp
@endsection

@section('script')

    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            /* ===============================
               1) Blade-injected constants
               =============================== */
            const initialSubtotal = parseFloat(@json($subtotal)); // e.g. 12345.00
            const totalWeight = parseFloat(@json($totalWeight)); // e.g. 2.5 (KG)
            const shippingRules = @json(is_string($settings->shipping ?? null) ? (json_decode($settings->shipping, true) ?: []) : $settings->shipping ?? []);
            const currency = @json($settings->currency ?? 'PKR');
            const currencyPosition = @json(($settings->currency_position ?? 'left') === 'right' ? 'right' : 'left');

            const routeStates = @json(route('user.geo.states'));
            const routeCities = @json(route('user.geo.cities'));
            const urlCoupon = @json(route('user.checkout.applyCoupon'));
            const csrfToken = @json(csrf_token());

            /* ===============================
               2) DOM refs
               =============================== */
            // Toggles
            const showLoginBtn = document.querySelector('.show-login');
            const loginBox = document.querySelector('.login-content');
            const showCouponBtn = document.querySelector('.show-coupon');
            const couponBox = document.querySelector('.coupon-content');

            // Account fields (guest only)
            const createAccountCheckbox = document.getElementById('createAccountCheckbox');
            const accountFields = document.getElementById('accountFields');
            const passwordField = document.getElementById('password');
            const passwordConfirmField = document.getElementById('password_confirmation');
            const checkoutForm = document.getElementById('checkoutForm');

            // Dependent dropdowns
            const countryEl = document.getElementById('country');
            const stateEl = document.getElementById('state');
            const cityEl = document.getElementById('city');

            // Order summary fields
            const subtotalEl = document.getElementById('subtotal-amount');
            const discountRow = document.getElementById('discount-row');
            const discountEl = document.getElementById('discount-amount');
            const appliedCodeEl = document.getElementById('applied-code');
            const shippingEl = document.getElementById('shipping-amount');
            const shippingNote = document.getElementById('shipping-note');
            const orderTotalEl = document.getElementById('order-total');

            // Hidden raw inputs (server submit)
            const appliedCouponCodeInput = document.getElementById('applied_coupon_code');
            const appliedCouponIdInput = document.getElementById('applied_coupon_id');
            const discountRawInput = document.getElementById('discount_raw');
            const subtotalRawInput = document.getElementById('subtotal_raw');
            const shippingRawInput = document.getElementById('shipping_cost_raw');
            const shippingLabelInput = document.getElementById('shipping_label');
            const totalRawInput = document.getElementById('order_total_raw');

            // Coupon controls
            const couponBtn = document.getElementById('apply-coupon-btn');
            const couponInp = document.getElementById('coupon_code');

            /* ===============================
               3) Local state
               =============================== */
            let subtotalRaw = initialSubtotal; // number
            let discountRaw = parseFloat(discountRawInput?.value || 0) || 0;

            /* ===============================
               4) Helpers
               =============================== */
            function formatCurrency(amount) {
                const formatted = Number(amount || 0).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                return (currencyPosition === 'left') ?
                    `${currency} ${formatted}` :
                    `${formatted} ${currency}`;
            }

            function currentText(sel) {
                const opt = sel?.options?.[sel.selectedIndex];
                return opt ? opt.text.trim() : '';
            }

            function matchLocation(ruleLocation, countryName, cityName) {
                // City-specific rule as array
                if (Array.isArray(ruleLocation)) {
                    const c = (cityName || '').toLowerCase();
                    return ruleLocation.map(x => String(x).toLowerCase()).includes(c);
                }
                // Country-based rules
                const rl = String(ruleLocation).toLowerCase();
                if (rl === 'pakistan') return countryName.toLowerCase() === 'pakistan';
                if (rl === 'other country') return countryName && countryName.toLowerCase() !== 'pakistan';
                // Direct equals (for exact country/city names)
                return rl === countryName.toLowerCase();
            }

            function computeShipping() {
                const cn = currentText(countryEl);
                const ct = currentText(cityEl);

                let match = null;
                for (const r of (Array.isArray(shippingRules) ? shippingRules : [])) {
                    if (matchLocation(r.location, cn, ct)) {
                        match = r;
                        break;
                    }
                }
                if (!match) {
                    return {
                        cost: 0,
                        note: 'No matching shipping rule',
                        label: ''
                    };
                }
                const base = parseFloat(match.base_rate || 0);
                const perKg = parseFloat(match.per_kg_rate || 0);
                const weight = parseFloat(totalWeight) || 0;
                const cost = base + perKg * weight;

                const label = Array.isArray(match.location) ? match.location.join(', ') : String(match.location);

                return {
                    cost,
                    note: `${label}: base ${formatCurrency(base)} + ${formatCurrency(perKg)} / kg × ${weight}kg`,
                    label
                };
            }

            function recalcTotals() {
                // Compute shipping
                const ship = computeShipping();

                // Show shipping
                if (shippingEl) shippingEl.textContent = formatCurrency(ship.cost);
                if (shippingNote) shippingNote.textContent = ship.note || '';

                // Update hidden shipping fields
                if (shippingRawInput) shippingRawInput.value = String(ship.cost);
                if (shippingLabelInput) shippingLabelInput.value = ship.label || '';

                // Total = Subtotal - Discount + Shipping
                const total = Math.max(0, (subtotalRaw - discountRaw) + ship.cost);
                if (orderTotalEl) orderTotalEl.textContent = formatCurrency(total);
                if (totalRawInput) totalRawInput.value = String(total);
            }

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

            /* ===============================
               5) UI Toggles
               =============================== */
            showLoginBtn?.addEventListener('click', function(e) {
                e.preventDefault();
                loginBox?.classList.toggle('d-none');
            });
            showCouponBtn?.addEventListener('click', function(e) {
                e.preventDefault();
                couponBox?.classList.toggle('d-none');
            });

            // Create account toggle
            createAccountCheckbox?.addEventListener('change', function() {
                accountFields?.classList.toggle('d-none', !this.checked);
                if (passwordField) passwordField.required = this.checked;
                if (passwordConfirmField) passwordConfirmField.required = this.checked;
            });

            // Validate password matching (only when create account ticked)
            checkoutForm?.addEventListener('submit', function(event) {
                if (createAccountCheckbox?.checked) {
                    if (!passwordField?.value || !passwordConfirmField?.value) {
                        event.preventDefault();
                        alert('Please fill in both password fields.');
                        return;
                    }
                    if (passwordField.value !== passwordConfirmField.value) {
                        event.preventDefault();
                        alert('Passwords do not match.');
                        return;
                    }
                }
            });

            /* ===============================
               6) Dependent dropdown events
               =============================== */
            countryEl?.addEventListener('change', function() {
                const cid = this.value;
                refreshStates(cid).finally(recalcTotals);
            });

            stateEl?.addEventListener('change', function() {
                const sid = this.value;
                refreshCities(sid).finally(recalcTotals);
            });

            cityEl?.addEventListener('change', recalcTotals);

            /* ===============================
               7) Coupon (AJAX apply)
               =============================== */
            couponBtn?.addEventListener('click', function(e) {
                e.preventDefault();
                const code = (couponInp?.value || '').trim();
                if (!code) {
                    alert('Please enter a coupon code.');
                    return;
                }

                couponBtn.disabled = true;
                couponBtn.textContent = 'Applying...';

                fetch(urlCoupon, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            code
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (!data.success) {
                            // Reset discount UI
                            alert(data.message || 'Unable to apply coupon.');
                            discountRaw = 0.0;
                            discountRow?.classList.add('d-none');
                            if (appliedCodeEl) appliedCodeEl.textContent = '';
                            if (discountEl) discountEl.textContent = '-';

                            // Reset displayed subtotal (if server sent formatted subtotal)
                            if (subtotalEl && data.subtotal) subtotalEl.textContent = data.subtotal;

                            // Reset hidden fields
                            appliedCouponCodeInput && (appliedCouponCodeInput.value = '');
                            appliedCouponIdInput && (appliedCouponIdInput.value = '');
                            discountRawInput && (discountRawInput.value = '0');
                            subtotalRawInput && (subtotalRawInput.value = String(initialSubtotal));

                            subtotalRaw = initialSubtotal;
                            recalcTotals();
                            return;
                        }

                        // Raw numbers (for calculations)
                        subtotalRaw = parseFloat(data.subtotal_raw ?? initialSubtotal) ||
                            initialSubtotal;
                        discountRaw = parseFloat(data.discount_raw ?? 0) || 0;

                        // UI (formatted coming from server helper)
                        if (appliedCodeEl) appliedCodeEl.textContent = data.code || '';
                        if (discountEl) discountEl.textContent = data.discount || '-';
                        if (subtotalEl && data.subtotal) subtotalEl.textContent = data.subtotal;
                        discountRow?.classList.remove('d-none');

                        // Hidden fields
                        appliedCouponCodeInput && (appliedCouponCodeInput.value = data.code || '');
                        appliedCouponIdInput && (appliedCouponIdInput.value = data.coupon_id ?? '');
                        discountRawInput && (discountRawInput.value = String(discountRaw));
                        subtotalRawInput && (subtotalRawInput.value = String(subtotalRaw));

                        recalcTotals();
                    })
                    .catch(err => {
                        console.error(err);
                        alert('Something went wrong applying the coupon.');
                    })
                    .finally(() => {
                        couponBtn.disabled = false;
                        couponBtn.textContent = 'Apply Coupon';
                    });
            });

            /* ===============================
               8) First render totals
               =============================== */
            recalcTotals();
        });
    </script>

@endsection
