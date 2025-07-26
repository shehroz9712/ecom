    @extends('user.layouts.app')
    @section('content')
        <!-- Start of Main -->
        <main class="main cart">
            <!-- Start of PageContent -->
            <div class="page-content">
                <div class="container">
                    <div class="row gutter-lg mb-10">
                        <div class="col-lg-12 pr-lg-12 mb-6">
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
                                                    <a
                                                        href="{{ route('user.product.detail', $item->product->slug ?? '#') }}">
                                                        <figure>
                                                            <img src="{{ productImage($item->product->main_image->image) }}"
                                                                alt="{{ $item->product->name }}" width="300"
                                                                height="338">
                                                        </figure>
                                                    </a>
                                                    <form action="{{ route('user.cart.remove', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-close"><i
                                                                class="fas fa-times"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td class="product-name">
                                                <a href="{{ route('user.product.detail', $item->product->slug ?? '#') }}">
                                                    {{ $item->product->name ?? 'Unknown Product' }}
                                                    <br>
                                                    @if ($item->variant && $item->variant->attributes)
                                                        @foreach ($item->variant->attributes as $attr)
                                                            <span class="me-2">
                                                                {{ $attr->attribute->name }}:
                                                                {{ $attr->attributeValue->value }}
                                                            </span>
                                                        @endforeach
                                                    @endif
                                                </a>

                                            </td>
                                            <td class="product-price"><span
                                                    class="amount">{{ productAmount($item->price) }}</span></td>
                                            <td class="product-quantity">
                                                <form action="{{ route('user.cart.updateQty', $item->id) }}" method="PUT"
                                                    data-cart-id="{{ $item->id }}" class="quantity-form">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="input-group">

                                                        <input class="quantity2 form-control" type="number" name="qty"
                                                            value="{{ $item->qty }}" min="1" max="100000">
                                                        <button type="button"
                                                            class="quantity-btn quantity-plus w-icon-plus"></button>
                                                        <button type="button"
                                                            class="quantity-btn quantity-minus w-icon-minus"></button>
                                                    </div>
                                                </form>



                                            </td>
                                            <td class="product-subtotal">
                                                <span class="amount">{{ productAmount($item->price * $item->qty) }}</span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Your cart is empty.</td>
                                        </tr>
                                    @endforelse
                                    @if ($cartItems->count())
                                        <tr class="cart-total-row border-top ">
                                            <td colspan="4" class="text-end pe-4 py-4">
                                                <strong class="text-uppercase">Cart Total:</strong>
                                            </td>
                                            <td class="text-start py-4 product-subtotal cart-total text-left">
                                                <strong class="text-primary">
                                                    <span class="amount">{{ productAmount($subtotal) }}</span>
                                                </strong>
                                            </td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>

                            <div class="cart-action mb-6">
                                <a href="{{ route('user.shop') }}"
                                    class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i
                                        class="w-icon-long-arrow-left"></i>Continue Shopping</a>
                                <form action="{{ route('user.cart.clear') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-rounded btn-default btn-clear"
                                        name="clear_cart">Clear
                                        Cart</button>
                                </form>
                                <a href="{{ route('user.checkout') }}"
                                    class="btn btn-block btn-primary btn-icon-right btn-rounded  btn-checkout">
                                    Proceed to checkout<i class="w-icon-long-arrow-right"></i></a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- End of PageContent -->
        </main>
        <!-- End of Main -->
    @endsection
    @section('script')
    @endsection
