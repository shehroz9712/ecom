@extends('user.layouts.app')

@section('title', 'Checkout')

@section('content')
    <main class="main checkout">

        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content">
            <div class="container">
                @if (!Auth::guard('web')->check())
                    <div class="login-toggle">
                        Returning customer? <a href="#"
                            class="show-login font-weight-bold text-uppercase text-dark">Login</a>
                    </div>
                    <form class="login-content">
                        <p>If you have shopped with us before, please enter your details below.
                            If you are a new customer, please proceed to the Billing section.</p>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Username or email *</label>
                                    <input type="text" class="form-control form-control-md" name="name" required>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Password *</label>
                                    <input type="text" class="form-control form-control-md" name="password" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group checkbox">
                            <input type="checkbox" class="custom-checkbox" id="remember" name="remember">
                            <label for="remember" class="mb-0 lh-2">Remember me</label>
                            <a href="#" class="ml-3">Lost your password?</a>
                        </div>
                        <button class="btn btn-rounded btn-login">Login</button>
                    </form>
                @endif

                <div class="coupon-toggle">
                    Have a coupon? <a href="#" class="show-coupon font-weight-bold text-uppercase text-dark">Enter
                        your code</a>
                </div>
                <div class="coupon-content mb-4">
                    <p>If you have a coupon code, please apply it below.</p>
                    <div class="input-wrapper-inline">
                        <input type="text" name="coupon_code" class="form-control form-control-md mr-1 mb-2"
                            placeholder="Coupon code" id="coupon_code">
                        <button type="submit" class="btn button btn-rounded btn-coupon mb-2" name="apply_coupon"
                            value="Apply coupon">Apply Coupon</button>
                    </div>
                </div>

                <form action="{{ route('user.checkout.process') }}" method="POST" id="checkoutForm"
                    class="form checkout-form">
                    @csrf
                    <div class="row mb-9">
                        <!-- Billing Details -->
                        <div class="col-lg-7 pr-lg-4 mb-4">
                            <h3 class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0">Billing Details</h3>
                            <div class="row gutter-sm">
                                <div class="col-xs-6 mb-3">
                                    <div class="form-group">
                                        <label>First Name *</label>
                                        <input type="text" name="first_name" class="form-control form-control-md"
                                            value="{{ old('first_name', auth()->user()->first_name ?? '') }}" required>
                                    </div>
                                </div>
                                <div class="col-xs-6 mb-3">
                                    <div class="form-group">
                                        <label>Last Name *</label>
                                        <input type="text" name="last_name" class="form-control form-control-md"
                                            value="{{ old('last_name', auth()->user()->last_name ?? '') }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Email Address *</label>
                                <input type="email" name="email" class="form-control form-control-md"
                                    value="{{ old('email', auth()->user()->email ?? '') }}" required>
                            </div>

                            @guest
                                <!-- Account creation option for guest -->
                                <div class="form-group checkbox-toggle pb-2">
                                    <input type="checkbox" class="custom-checkbox" id="createAccountCheckbox"
                                        name="create_account">
                                    <label for="createAccountCheckbox">Create an account?</label>
                                </div>
                                <div id="accountFields" class="d-none">
                                    <div class="form-group mb-3">
                                        <label>Password *</label>
                                        <input type="password" name="password" id="password"
                                            class="form-control form-control-md" data-require-on="createAccountCheckbox">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Confirm Password *</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control form-control-md" data-require-on="createAccountCheckbox">
                                    </div>
                                </div>
                            @endguest

                            <div class="form-group mb-3">
                                <label>Phone *</label>
                                <input type="text" name="phone" class="form-control form-control-md"
                                    value="{{ old('phone', auth()->user()->phone ?? '') }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label>Street Address *</label>
                                <input type="text" placeholder="House number and street name" name="address"
                                    class="form-control form-control-md mb-2" required>
                                <input type="text" placeholder="Apartment, suite, unit, etc. (optional)" name="address_2"
                                    class="form-control form-control-md">
                            </div>

                            <div class="row gutter-sm">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>City *</label>
                                        <input type="text" name="city" class="form-control form-control-md"
                                            required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Postal Code *</label>
                                        <input type="text" name="postal_code" class="form-control form-control-md"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Country *</label>
                                        <div class="select-box">
                                            <select name="country" class="form-control form-control-md">
                                                <option value="default" selected="selected">United States (US)</option>
                                                <option value="uk">United Kingdom (UK)</option>
                                                <option value="fr">France</option>
                                                <option value="aus">Australia</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <label for="order-notes">Order notes (optional)</label>
                                <textarea class="form-control mb-0" id="order-notes" name="order_notes" cols="30" rows="4"
                                    placeholder="Notes about your order, e.g special notes for delivery"></textarea>
                            </div>
                        </div>
                        <!-- Order Summary -->
                        <div class="col-lg-5 mb-4 sticky-sidebar-wrapper">
                            <div class="order-summary-wrapper sticky-sidebar">
                                <h3 class="title text-uppercase ls-10">Your Order</h3>
                                <div class="order-summary">
                                    <table class="order-table">
                                        <thead>
                                            <tr>
                                                <th colspan="2"><b>Product</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $subtotal = 0;
                                                $totalShipping = 0;
                                                $allProductsHaveCustomShipping = true;
                                                foreach ($cartItems as $item) {
                                                    if (!$item->product->custom_shipping_cost) {
                                                        $allProductsHaveCustomShipping = false;
                                                    }
                                                }
                                            @endphp
                                            @foreach ($cartItems as $item)
                                                <tr class="bb-no">
                                                    <td class="product-name">
                                                        {{ $item->product->name }}
                                                        @if ($item->variant)
                                                            ({{ $item->variant->attributes->pluck('attributeValue.value')->join(', ') }})
                                                        @endif
                                                        <i class="fas fa-times"></i>
                                                        <span class="product-quantity">{{ $item->qty }}</span>
                                                    </td>
                                                    <td class="product-total">
                                                        {{ productAmount($item->price * $item->qty) }}</td>
                                                </tr>
                                                @if ($item->product->custom_shipping_cost)
                                                    <tr class="bb-no">
                                                        <td class="product-name">Custom Shipping for
                                                            {{ $item->product->name }}</td>
                                                        <td class="product-total">
                                                            {{ productAmount($item->product->custom_shipping_cost * $item->qty) }}
                                                        </td>
                                                    </tr>
                                                    @php $totalShipping += $item->product->custom_shipping_cost * $item->qty; @endphp
                                                @endif
                                                @php $subtotal += $item->price * $item->qty; @endphp
                                            @endforeach
                                            <tr class="cart-subtotal bb-no">
                                                <td><b>Subtotal</b></td>
                                                <td><b>{{ productAmount($subtotal) }}</b></td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <!-- Shipping -->
                                            <tr class="shipping-methods">
                                                <td colspan="2" class="text-left">
                                                    <h4 class="title title-simple bb-no mb-1 pb-0 pt-3">Shipping</h4>
                                                    <ul id="shipping-method" class="mb-4">
                                                        {{-- @if (!$allProductsHaveCustomShipping)
                                                            <li>
                                                                <div class="custom-radio">
                                                                    <input type="hidden" name="shipping_method" value="default"
                                                                        data-cost="{{ $settings->shipping_cost ?? 0 }}">
                                                                    <label class="custom-control-label color-dark">
                                                                        {{ $settings->shipping_name ?? 'Standard Shipping' }}: 
                                                                        {{ productAmount($settings->shipping_cost ?? 0) }}
                                                                    </label>
                                                                </div>
                                                            </li>
                                                        @else
                                                            <li>
                                                                <label class="custom-control-label color-dark">
                                                                    Standard Shipping ({{ productAmount($settings->shipping_cost ?? 0) }}) included in custom shipping costs
                                                                </label>
                                                            </li>
                                                        @endif --}}
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th><b>Total</b></th>
                                                <td><b id="order-total">
                                                        @php
                                                            $finalTotal = $subtotal;
                                                            // if (!$allProductsHaveCustomShipping) {
                                                            //     $finalTotal += $settings->shipping_cost ?? 0;
                                                            // }
                                                        @endphp
                                                        {{ productAmount($finalTotal) }}
                                                    </b></td>
                                            </tr>
                                        </tfoot>
                                    </table>

                                    <!-- Payment Methods -->
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
                                                    <p class="mb-0">
                                                        Pay with cash upon delivery.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="form-group place-order pt-6">
                                        <button type="submit" class="btn btn-dark btn-block btn-rounded">Place
                                            Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const createAccountCheckbox = document.getElementById('createAccountCheckbox');
            const accountFields = document.getElementById('accountFields');
            const passwordField = document.getElementById('password');
            const passwordConfirmationField = document.getElementById('password_confirmation');
            const checkoutForm = document.getElementById('checkoutForm');

            // Toggle account fields and manage required attribute
            createAccountCheckbox?.addEventListener('change', function() {
                accountFields.classList.toggle('d-none', !this.checked);
                passwordField.required = this.checked;
                passwordConfirmationField.required = this.checked;
            });

            // Form validation to ensure password fields are filled when create account is checked
            checkoutForm.addEventListener('submit', function(event) {
                if (createAccountCheckbox.checked) {
                    if (!passwordField.value || !passwordConfirmationField.value) {
                        event.preventDefault();
                        alert('Please fill in both password fields to create an account.');
                    } else if (passwordField.value !== passwordConfirmationField.value) {
                        event.preventDefault();
                        alert('Passwords do not match.');
                    }
                }
            });
        });
    </script>
@endsection
