@php
    $isNewArrival = $product->created_at->gt(now()->subDays(30));
@endphp

<div class="product-wrap">
    <div class="product text-center">
        <figure class="product-media">
            <div class="product-label-group">
                @if ($isNewArrival)
                    <label class="label-discount product-label text-normal">New Arrivals</label>
                @endif
            </div>

            <a href="{{ route('user.product.detail', $product->slug) }}">
                @if ($product->images->count() >= 2)
                    <img src="{{ productImage($product->images[0]->image) }}" alt="{{ $product->name }}" width="300"
                        height="338" />
                    <img src="{{ productImage($product->images[1]->image) }}" alt="{{ $product->name }}" width="300"
                        height="338" />
                @else
                    @isset($product->images[0])
                        <img src="{{ productImage($product->images[0]->image) }}" alt="{{ $product->name }}" width="300"
                            height="338" />
                    @endisset
                @endif
            </a>

            <div class="product-action-vertical">
                <a href="#" class="btn-product-icon btn-cart w-icon-cart" title="Add to cart"
                    data-product-id="{{ $product->id }}"
                    @if ($product->variants->count() > 0) data-variant-id="{{ $product->variants->first()->id }}"
                       data-price="{{ $product->variants->first()->sale_price ?? $product->variants->first()->price }}"
                   @else
                       data-variant-id=""
                       data-price="{{ $product->sale_price && $product->sale_price < $product->price ? $product->sale_price : $product->price }}" @endif></a>

                <a href="#"
                    class="btn-product-icon btn-wishlist {{ $product->in_wishlist ? 'w-icon-heart-full added' : 'w-icon-heart' }}"
                    title="Add to wishlist" data-product-id="{{ $product->id }}">
                </a>
                <a href="#" class="btn-product-icon btn-quickview w-icon-search" title="Quickview"
                    data-product-id="{{ $product->id }}"></a>
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
                    <ins class="new-price">{{ productAmount($product->sale_price) }}</ins>
                    <del class="old-price">{{ productAmount($product->price) }}</del>
                @else
                    <span class="price">{{ productAmount($product->price) }}</span>
                @endif
            </div>
        </div>
    </div>
</div>
