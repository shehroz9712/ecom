@extends('user.layouts.app')
@section('content')
    <!-- Start of Main -->
    <main class="main cart">

        <!-- Start of PageContent -->
        <div class="page-content">
            <div class="container">
                <div class="row gutter-lg mb-10">
                    <div class="col-lg-8 pr-lg-4 mb-6">
                        <table class="shop-table cart-table">
                            <thead>
                                <tr>
                                    <th class="product-name"><span>Product</span></th>
                                    <th></th>
                                    <th class="product-price"><span>Price</span></th>
                                    <th class="product-quantity"><span>Quantity</span></th>
                                    <th class="product-subtotal"><span>Subtotal</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($cartItems as $item)
                                    <tr>
                                        <td class="product-thumbnail">
                                            <div class="p-relative">
                                                <a href="{{ route('product.show', $item->product->slug ?? '#') }}">
                                                    <figure>
                                                        <img src="{{ asset($item->product->image ?? 'default.jpg') }}"
                                                            alt="{{ $item->product->name }}" width="300" height="338">
                                                    </figure>
                                                </a>
                                                <form action="{{ route('user.cart.remove', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-close"><i
                                                            class="fas fa-times"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                        <td class="product-name">
                                            <a href="{{ route('product.show', $item->product->slug ?? '#') }}">
                                                {{ $item->product->name ?? 'Unknown Product' }}
                                            </a>
                                        </td>
                                        <td class="product-price"><span
                                                class="amount">${{ number_format($item->price, 2) }}</span></td>
                                        <td class="product-quantity">
                                            <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="input-group">
                                                    <input class="quantity form-control" type="number" name="qty"
                                                        value="{{ $item->qty }}" min="1" max="100000">
                                                    <button type="submit" class="quantity-plus w-icon-plus"></button>
                                                    <button type="submit" class="quantity-minus w-icon-minus"></button>
                                                </div>
                                            </form>
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="amount">${{ number_format($item->price * $item->qty, 2) }}</span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Your cart is empty.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            </tbody>
                        </table>

                        <div class="cart-action mb-6">
                            <a href="#" class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i
                                    class="w-icon-long-arrow-left"></i>Continue Shopping</a>
                            <button type="submit" class="btn btn-rounded btn-default btn-clear" name="clear_cart"
                                value="Clear Cart">Clear Cart</button>
                            <button type="submit" class="btn btn-rounded btn-update disabled" name="update_cart"
                                value="Update Cart">Update Cart</button>
                        </div>

                        <form class="coupon">
                            <h5 class="title coupon-title font-weight-bold text-uppercase">Coupon Discount</h5>
                            <input type="text" class="form-control mb-4" placeholder="Enter coupon code here..."
                                required />
                            <button class="btn btn-dark btn-outline btn-rounded">Apply Coupon</button>
                        </form>
                    </div>
                    <div class="col-lg-4 sticky-sidebar-wrapper">
                        <div class="sticky-sidebar">
                            <div class="cart-summary mb-4">
                                <h3 class="cart-title text-uppercase">Cart Totals</h3>
                                <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                    <label class="ls-25">Subtotal</label>
                                    <span>RS {{ number_format($subtotal, 2) }}</span>
                                </div>

                                <hr class="divider">

                                <ul class="shipping-methods mb-2">
                                    <li>
                                        <label class="shipping-title text-dark font-weight-bold">Shipping</label>
                                    </li>
                                    <li>
                                        <div class="custom-radio">
                                            <input type="radio" id="free-shipping" class="custom-control-input"
                                                name="shipping">
                                            <label for="free-shipping" class="custom-control-label color-dark">Free
                                                Shipping</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-radio">
                                            <input type="radio" id="local-pickup" class="custom-control-input"
                                                name="shipping">
                                            <label for="local-pickup" class="custom-control-label color-dark">Local
                                                Pickup</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-radio">
                                            <input type="radio" id="flat-rate" class="custom-control-input"
                                                name="shipping">
                                            <label for="flat-rate" class="custom-control-label color-dark">Flat
                                                rate:
                                                $5.00</label>
                                        </div>
                                    </li>
                                </ul>

                                <div class="shipping-calculator">
                                    <p class="shipping-destination lh-1">Shipping to <strong>CA</strong>.</p>

                                    <form class="shipping-calculator-form">
                                        <div class="form-group">
                                            <div class="select-box">
                                                <select name="country" class="form-control form-control-md">
                                                    <option value="default" selected="selected">United States
                                                        (US)
                                                    </option>
                                                    <option value="us">United States</option>
                                                    <option value="uk">United Kingdom</option>
                                                    <option value="fr">France</option>
                                                    <option value="aus">Australia</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="select-box">
                                                <select name="state" class="form-control form-control-md">
                                                    <option value="default" selected="selected">California
                                                    </option>
                                                    <option value="ohaio">Ohaio</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-md" type="text" name="town-city"
                                                placeholder="Town / City">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-md" type="text" name="zipcode"
                                                placeholder="ZIP">
                                        </div>
                                        <button type="submit" class="btn btn-dark btn-outline btn-rounded">Update
                                            Totals</button>
                                    </form>
                                </div>

                                <hr class="divider mb-6">
                                <div class="order-total d-flex justify-content-between align-items-center">
                                    <label>Total</label>
                                    <span class="ls-50">RS {{ number_format($subtotal, 2) }}</span>
                                </div>
                                <a href="#" class="btn btn-block btn-dark btn-icon-right btn-rounded  btn-checkout">
                                    Proceed to checkout<i class="w-icon-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
    <!-- End of Main -->
@endsection
