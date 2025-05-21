<div class="product-wrap">
    <div class="product text-center">
        <figure class="product-media">
            <a href="{{ route('user.product.detail', $product->slug) }}">
                @if ($product->images->count() >= 2)
                    <img src="{{ asset('assets/uploads/products/' . $product->images[0]->image) }}"
                        alt="{{ $product->name }}" width="300" height="338" />
                    <img src="{{ asset('assets/uploads/products/' . $product->images[1]->image) }}"
                        alt="{{ $product->name }}" width="300" height="338" />
                @else
                    <img src="{{ asset('assets/uploads/products/' . $product->images[0]->image) }}"
                        alt="{{ $product->name }}" width="300" height="338" />
                @endif
            </a>
            <div class="product-action-vertical">
                <a href="#" class="btn-product-icon btn-cart w-icon-cart" title="Add to cart"
                    data-product-id="{{ $product->id }}"></a>
                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart" title="Add to wishlist"
                    data-product-id="{{ $product->id }}"></a>
                <a href="#" class="btn-product-icon btn-quickview w-icon-search" title="Quickview"
                    data-product-slug="{{ $product->slug }}"></a>

            </div>
            @if ($product->discount > 0)
                <div class="product-label-group">
                    <label class="product-label label-discount">{{ $product->discount }}% Off</label>
                </div>
            @endif
        </figure>
        <div class="product-details">
            <h4 class="product-name">
                <a href="{{ route('user.product.detail', $product->slug) }}">{{ $product->name }}</a>
            </h4>
            <div class="ratings-container">
                <div class="ratings-full">
                    <span class="ratings" style="width: {{ $product->rating * 20 }}%;"></span>
                    <span class="tooltiptext tooltip-top">{{ number_format($product->rating, 1) }} out of 5</span>
                </div>
                <a href="{{ route('user.product.detail', $product->slug) }}#reviews"
                    class="rating-reviews">({{ $product->reviews_count }} reviews)</a>
            </div>
            <div class="product-price">
                @if ($product->sale_price && $product->sale_price < $product->price)
                    <ins class="new-price">${{ number_format($product->sale_price, 2) }}</ins>
                    <del class="old-price">${{ number_format($product->price, 2) }}</del>
                @else
                    <span class="price">${{ number_format($product->price, 2) }}</span>
                @endif
            </div>
        </div>
    </div>
</div>
@section('script')
@endsection
