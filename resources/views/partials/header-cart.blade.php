<div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
    <div class="cart-overlay"></div>
    <a href="#" class="cart-toggle label-down link">
        <i class="w-icon-cart">
            <span class="cart-count">{{ $cartCount }}</span>
        </i>
        <span class="cart-label">Cart</span>
    </a>
    <div class="dropdown-box">
        <div class="cart-header">
            <span>Shopping Cart</span>
            <a href="#" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
        </div>

        <div class="products">
            @forelse ($carts as $item)
                <div class="product product-cart">
                    <div class="product-detail">
                        <a href="{{ route('user.product.detail', $item->product->slug) }}" class="product-name">
                            {{ \Illuminate\Support\Str::limit($item->product->name, 35) }}
                        </a>
                        <div class="price-box">
                            <span class="product-quantity">{{ $item->qty }}</span>
                            <span class="product-price">${{ number_format($item->price, 2) }}</span>
                        </div>
                    </div>
                    <figure class="product-media">
                        <a href="{{ route('user.product.detail', $item->product->slug) }}">
                            <img src="{{ asset('assets/uploads/products/' . ($item->product->images[0]->image_path ?? 'default.jpg')) }}"
                                alt="{{ $item->product->name }}" height="84" width="94" />
                        </a>
                    </figure>
                    <form method="POST" action="{{ route('user.cart.remove', $item->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-link btn-close">
                            <i class="fas fa-times"></i>
                        </button>
                    </form>
                </div>
            @empty
                <p class="p-3 text-center">Your cart is empty.</p>
            @endforelse
        </div>

        <div class="cart-total">
            <label>Subtotal:</label>
            <span class="price">${{ number_format($cartSubtotal, 2) }}</span>
        </div>

        <div class="cart-action">
            <a href="{{ route('user.cart') }}" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
            <a href="{{ route('user.checkout') }}" class="btn btn-primary btn-rounded">Checkout</a>
        </div>
    </div>
</div>
