@extends('user.layouts.app')

@section('title', 'Checkout')

@section('content')
    <div class="page-content">
        <div class="container">
            <h2 class="checkout-title">Checkout</h2>
            <form action="{{ route('user.checkout.process') }}" method="POST">
                @csrf

                <div class="row">
                    <!-- Billing Details -->
                    <div class="col-lg-7">
                        <h3 class="title">Billing Details</h3>
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label>First Name *</label>
                                <input type="text" name="first_name" class="form-control" required>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label>Last Name *</label>
                                <input type="text" name="last_name" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Email Address *</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Phone *</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Address *</label>
                            <input type="text" name="address" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>City *</label>
                            <input type="text" name="city" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Postal Code *</label>
                            <input type="text" name="postal_code" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Country *</label>
                            <input type="text" name="country" class="form-control" required>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="col-lg-5">
                        <h3 class="title">Your Order</h3>
                        <table class="table table-order">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $subtotal = 0; @endphp
                                @foreach ($cartItems as $item)
                                    <tr>
                                        <td>
                                            {{ $item->product->name }}
                                            @if ($item->variant)
                                                ({{ $item->variant->attributes->pluck('attributeValue.value')->join(', ') }})
                                            @endif
                                            × {{ $item->qty }}
                                        </td>
                                        <td>{{ productAmount($item->price * $item->qty) }}</td>
                                    </tr>
                                    @php $subtotal += $item->price * $item->qty; @endphp
                                @endforeach
                                <tr class="summary-subtotal">
                                    <td>Subtotal:</td>
                                    <td>{{ productAmount($subtotal) }}</td>
                                </tr>
                                <tr class="summary-total">
                                    <td><strong>Total:</strong></td>
                                    <td><strong>{{ productAmount($subtotal) }}</strong></td>
                                </tr>
                            </tbody>
                        </table>

                        <h4 class="mt-4 mb-3">Payment Method</h4>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" id="cod"
                                value="cod" checked>
                            <label class="form-check-label" for="cod">
                                Cash on Delivery
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="payment_method" id="card"
                                value="card">
                            <label class="form-check-label" for="card">
                                Credit / Debit Card
                            </label>
                        </div>

                        <button type="submit" class="btn btn-dark btn-block">Place Order</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
