@extends('user.layouts.app')
@section('content')
    <!-- Start of Main -->
    <main class="main mb-10 pb-1">
        <!-- Start of Page Content -->
        <div class="page-content">
            <div class="container">
                <div class="row gutter-lg">
                    <div class="main-content">
                        <div class="product product-single row">
                            <div class="col-md-6 mb-6">
                                <div class="product-gallery product-gallery-sticky">
                                    <div
                                        class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1 gutter-no">
                                        @foreach ($product->images as $image)
                                            <figure class="product-image">
                                                <img src="{{ asset('assets/uploads/products/' . $image->image) }}"
                                                    data-zoom-image="{{ asset('assets/uploads/products/' . $image->image) }}"
                                                    alt="{{ $product->name }}" width="800" height="900">
                                            </figure>
                                        @endforeach
                                    </div>
                                    <div class="product-thumbs-wrap">
                                        <div class="product-thumbs row cols-4 gutter-sm">
                                            @foreach ($product->images as $key => $image)
                                                <div class="product-thumb {{ $key === 0 ? 'active' : '' }}">
                                                    <img src="{{ asset('assets/uploads/products/' . $image->image) }}"
                                                        alt="Product Thumb" width="800" height="900">
                                                </div>
                                            @endforeach
                                        </div>
                                        <button class="thumb-up disabled"><i class="w-icon-angle-left"></i></button>
                                        <button class="thumb-down disabled"><i class="w-icon-angle-right"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 mb-md-6">
                                <div class="product-details" data-sticky-options="{'minWidth': 767}">
                                    <h2 class="product-title">{{ $product->name }}</h2>
                                    <div class="product-bm-wrapper">
                                        @if ($product->brand)
                                            <figure class="brand">
                                                <img src="{{ $product->brand->image_url }}"
                                                    alt="{{ $product->brand->name }}" width="102" height="48" />
                                            </figure>
                                        @endif
                                        <div class="product-meta">
                                            <div class="product-categories">
                                                Category:
                                                <span class="product-category">
                                                    <a href="#">{{ $product->category->name }}</a>
                                                    @if ($product->subCategory)
                                                        > <a href="#">{{ $product->subCategory->name }}</a>
                                                    @endif
                                                    @if ($product->subCategoryItem)
                                                        > <a href="#">{{ $product->subCategoryItem->name }}</a>
                                                    @endif
                                                </span>
                                            </div>
                                            <div class="product-sku">
                                                SKU: <span>{{ $product->sku }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="product-divider">

                                    <!-- Dynamic Price Display -->
                                    @if ($product->variants->isNotEmpty())
                                        <div class="product-price">
                                            <span class="price-range">
                                                @php
                                                    $minPrice = $product->variants->min('price');
                                                    $maxPrice = $product->variants->max('price');
                                                    $minSalePrice = $product->variants->min('sale_price') ?? $minPrice;
                                                @endphp

                                                @if ($minPrice === $maxPrice)
                                                    @if ($minSalePrice < $minPrice)
                                                        <ins class="new-price">${{ number_format($minSalePrice, 2) }}</ins>
                                                        <del class="old-price">${{ number_format($minPrice, 2) }}</del>
                                                    @else
                                                        <ins class="new-price">${{ number_format($minPrice, 2) }}</ins>
                                                    @endif
                                                @else
                                                    ${{ number_format($minPrice, 2) }} -
                                                    ${{ number_format($maxPrice, 2) }}
                                                @endif
                                            </span>
                                        </div>
                                    @else
                                        <div class="product-price">
                                            @if ($product->sale_price)
                                                <ins class="new-price">${{ number_format($product->sale_price, 2) }}</ins>
                                                <del class="old-price">${{ number_format($product->price, 2) }}</del>
                                            @else
                                                <ins class="new-price">${{ number_format($product->price, 2) }}</ins>
                                            @endif
                                        </div>
                                    @endif

                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings"
                                                style="width: {{ ($product->rating / 5) * 100 }}%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="#product-tab-reviews" class="rating-reviews scroll-to">
                                            ({{ $product->review_count }} Reviews)
                                        </a>
                                    </div>

                                    <div class="product-short-desc">
                                        {!! $product->short_description !!}
                                    </div>

                                    <hr class="product-divider">

                                    <!-- Variant Selection -->
                                    @if ($product->variants->isNotEmpty())
                                        <div class="product-variations-wrapper">
                                            @php
                                                // Group attributes by type (color, size etc.)
                                                $attributeGroups = [];
                                                foreach ($product->variants->first()->attributes as $attribute) {
                                                    $attributeGroups[$attribute->attribute->name][] = $attribute;
                                                }
                                            @endphp

                                            @foreach ($attributeGroups as $attributeName => $attributes)
                                                <div
                                                    class="product-form product-variation-form 
                                                    @if (strtolower($attributeName) === 'color') product-color-swatch @else product-size-swatch @endif">
                                                    <label>{{ $attributeName }}:</label>
                                                    <div class="d-flex align-items-center product-variations">
                                                        @foreach ($attributes as $attribute)
                                                            <a href="#"
                                                                class="@if (strtolower($attributeName) === 'color') color @else size @endif"
                                                                data-attribute-id="{{ $attribute->attribute_id }}"
                                                                data-attribute-value-id="{{ $attribute->attribute_value_id }}"
                                                                @if (strtolower($attributeName) === 'color') style="background-color: {{ $attribute->attributeValue->code ?? '#ccc' }}" @endif>
                                                                @if (strtolower($attributeName) !== 'color')
                                                                    {{ $attribute->attributeValue->value }}
                                                                @endif
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- Variant Details (will be shown after selection) -->
                                        <div class="product-variant-details mt-3" style="display: none;">
                                            <div class="product-price">
                                                <ins class="new-price variant-price"></ins>
                                                <del class="old-price variant-sale-price" style="display: none;"></del>
                                            </div>
                                            <div class="product-sku">
                                                SKU: <span class="variant-sku"></span>
                                            </div>
                                            <div class="product-stock mb-3">
                                                Availability: <span class="variant-stock"></span>
                                            </div>
                                        </div>

                                        <input type="hidden" name="variant_id" id="selected_variant_id" value="">
                                    @else
                                        <!-- Show regular price if no variants -->
                                        <div class="product-stock mb-3">
                                            Availability:
                                            <span>{{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}</span>
                                        </div>
                                    @endif

                                    <!-- Quantity and Add to Cart -->
                                    <div class="fix-bottom product-sticky-content sticky-content">
                                        <div class="product-form container">
                                            <div class="product-qty-form" style="margin-top: 10px;">
                                                <div class="input-group">
                                                    <input class="quantity form-control" type="number" min="1"
                                                        max="10000000" value="1"
                                                        data-product-id="{{ $product->id }}">
                                                    <button class="quantity-plus w-icon-plus"
                                                        data-product-id="{{ $product->id }}"></button>
                                                    <button class="quantity-minus w-icon-minus"
                                                        data-product-id="{{ $product->id }}"></button>
                                                </div>
                                            </div>
                                            <button data-product-id="{{ $product->id }}"
                                                class="btn btn-primary btn-cart">
                                                <i class="w-icon-cart"></i>
                                                <span>Add to Cart</span>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="social-links-wrapper">
                                        <div class="social-links">
                                            <div class="social-icons social-no-color border-thin">
                                                <a href="#" class="social-icon social-facebook w-icon-facebook"
                                                    onclick="shareOnFacebook('{{ route('user.product.detail', $product->slug) }}')"></a>
                                                <a href="#" class="social-icon social-twitter w-icon-twitter"
                                                    onclick="shareOnTwitter('{{ $product->name }}', '{{ route('user.product.detail', $product->slug) }}')"></a>
                                                <a href="#" class="social-icon social-pinterest fab fa-pinterest-p"
                                                    onclick="shareOnPinterest('{{ $product->name }}', '{{ asset('assets/uploads/products/' . $product->main_image) }}', '{{ route('user.product.detail', $product->slug) }}')"></a>
                                                <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"
                                                    onclick="shareOnWhatsApp('{{ $product->name }} - {{ route('user.product.detail', $product->slug) }}')"></a>
                                                <a href="#" class="social-icon social-youtube fab fa-linkedin-in"
                                                    onclick="shareOnLinkedIn('{{ route('user.product.detail', $product->slug) }}')"></a>
                                            </div>
                                        </div>
                                        <span class="divider d-xs-show"></span>
                                        <div class="product-link-wrapper d-flex">
                                            <a href="#"
                                                class="btn-product-icon btn-wishlist w-icon-heart"><span></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Product Tabs -->
                        <div class="tab tab-nav-boxed tab-nav-underline product-tabs">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a href="#product-tab-description" class="nav-link active">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#product-tab-specification" class="nav-link">Specification</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#product-tab-reviews" class="nav-link">Customer Reviews</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="product-tab-description">
                                    {!! $product->description !!}
                                </div>
                                <div class="tab-pane" id="product-tab-specification">
                                    {!! $product->specification !!}
                                </div>
                                <div class="tab-pane" id="product-tab-reviews">
                                    <!-- Reviews content remains the same -->
                                </div>
                            </div>
                        </div>

                        <!-- Related Products -->
                        <section class="vendor-product-section">
                            <div class="title-link-wrapper mb-4">
                                <h4 class="title text-left">More Products From This Vendor</h4>
                                <a href="{{ route('user.vendor.detail', $product->user_id) }}"
                                    class="btn btn-dark btn-link btn-slide-right btn-icon-right">
                                    More Products<i class="w-icon-long-arrow-right"></i>
                                </a>
                            </div>
                            <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
                                @foreach ($vendorProducts as $vendorProduct)
                                    <div class="product-wrap">
                                        <div class="product text-center">
                                            <figure class="product-media">
                                                <a
                                                    href="{{ route('user.product.detail', ['slug' => $vendorProduct->slug]) }}">
                                                    @if ($vendorProduct->images->count() >= 2)
                                                        <img src="{{ asset('assets/uploads/products/' . $vendorProduct->images[0]->image) }}"
                                                            alt="{{ $vendorProduct->name }}" width="300"
                                                            height="338" />
                                                        <img src="{{ asset('assets/uploads/products/' . $vendorProduct->images[1]->image) }}"
                                                            alt="{{ $vendorProduct->name }}" width="300"
                                                            height="338" />
                                                    @else
                                                        <img src="{{ asset('assets/uploads/products/' . $vendorProduct->images[0]->image) }}"
                                                            alt="{{ $vendorProduct->name }}" width="300"
                                                            height="338" />
                                                    @endif
                                                </a>
                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                        title="Add to cart"
                                                        data-product-id="{{ $vendorProduct->id }}"></a>
                                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                        title="Add to wishlist"
                                                        data-product-id="{{ $vendorProduct->id }}"></a>
                                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                        title="Quickview"
                                                        data-product-slug="{{ $vendorProduct->slug }}"></a>
                                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                        title="Add to Compare"
                                                        data-product-id="{{ $vendorProduct->id }}"></a>
                                                </div>
                                                @if ($vendorProduct->sale_price && $vendorProduct->price > $vendorProduct->sale_price)
                                                    @php
                                                        $discount = round(
                                                            (($vendorProduct->price - $vendorProduct->sale_price) /
                                                                $vendorProduct->price) *
                                                                100,
                                                        );
                                                    @endphp
                                                    <div class="product-label-group">
                                                        <label class="product-label label-discount">{{ $discount }}%
                                                            Off</label>
                                                    </div>
                                                @endif
                                            </figure>
                                            <div class="product-details">
                                                <h4 class="product-name">
                                                    <a
                                                        href="{{ route('user.product.detail', ['slug' => $vendorProduct->slug]) }}">
                                                        {{ $vendorProduct->name }}
                                                    </a>
                                                </h4>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings"
                                                            style="width: {{ ($vendorProduct->rating / 5) * 100 }}%;"></span>
                                                        <span
                                                            class="tooltiptext tooltip-top">{{ number_format($vendorProduct->rating, 1) }}
                                                            out of 5</span>
                                                    </div>
                                                    <a href="{{ route('user.product.detail', ['slug' => $vendorProduct->slug]) }}#reviews"
                                                        class="rating-reviews">({{ $vendorProduct->review_count }}
                                                        reviews)</a>
                                                </div>
                                                <div class="product-pa-wrapper">
                                                    <div class="product-price">
                                                        @if ($vendorProduct->sale_price && $vendorProduct->price > $vendorProduct->sale_price)
                                                            <ins
                                                                class="new-price">${{ number_format($vendorProduct->sale_price, 2) }}</ins>
                                                            <del
                                                                class="old-price">${{ number_format($vendorProduct->price, 2) }}</del>
                                                        @else
                                                            <span
                                                                class="price">${{ number_format($vendorProduct->price, 2) }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    </div>
                    <!-- End of Main Content -->

                    <!-- Sidebar -->
                    <aside class="sidebar product-sidebar sidebar-fixed right-sidebar sticky-sidebar-wrapper">
                        <div class="sidebar-overlay"></div>
                        <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                        <a href="#" class="sidebar-toggle d-flex d-lg-none"><i class="fas fa-chevron-left"></i></a>
                        <div class="sidebar-content scrollable">
                            <div class="sticky-sidebar">
                                <div class="widget widget-icon-box mb-6">
                                    <div class="icon-box icon-box-side">
                                        <span class="icon-box-icon text-dark">
                                            <i class="w-icon-truck"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <h4 class="icon-box-title">Free Shipping & Returns</h4>
                                            <p>For all orders over $99</p>
                                        </div>
                                    </div>
                                    <div class="icon-box icon-box-side">
                                        <span class="icon-box-icon text-dark">
                                            <i class="w-icon-bag"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <h4 class="icon-box-title">Secure Payment</h4>
                                            <p>We ensure secure payment</p>
                                        </div>
                                    </div>
                                    <div class="icon-box icon-box-side">
                                        <span class="icon-box-icon text-dark">
                                            <i class="w-icon-money"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <h4 class="icon-box-title">Money Back Guarantee</h4>
                                            <p>Any back within 30 days</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Widget Icon Box -->

                                <div class="widget widget-banner mb-9">
                                    <div class="banner banner-fixed br-sm">
                                        <figure>
                                            <img src="{{ asset('assets/user/images/shop/banner3.jpg') }}" alt="Banner"
                                                width="266" height="220" style="background-color: #1D2D44;" />
                                        </figure>
                                        <div class="banner-content">
                                            <div class="banner-price-info font-weight-bolder text-white lh-1 ls-25">
                                                40<sup class="font-weight-bold">%</sup><sub
                                                    class="font-weight-bold text-uppercase ls-25">Off</sub>
                                            </div>
                                            <h4 class="banner-subtitle text-white font-weight-bolder text-uppercase mb-0">
                                                Ultimate Sale</h4>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Widget Banner -->

                                <div class="widget widget-products">
                                    <div class="title-link-wrapper mb-2">
                                        <h4 class="title title-link font-weight-bold">More Products</h4>
                                    </div>

                                    <div class="owl-carousel owl-theme owl-nav-top"
                                        data-owl-options="{
                                            'nav': true,
                                            'dots': false,
                                            'items': 1,
                                            'margin': 20
                                        }">
                                        @php
                                            $chunks = $relatedProducts->chunk(3);
                                        @endphp

                                        @foreach ($chunks as $chunk)
                                            <div class="widget-col">
                                                @foreach ($chunk as $product)
                                                    <div class="product product-widget">
                                                        <figure class="product-media">
                                                            <a
                                                                href="{{ route('user.product.detail', ['slug' => $product->slug]) }}">
                                                                <img src="{{ asset('assets/uploads/products /' . $product->images->first()->image) }}"
                                                                    alt="{{ $product->name }}" width="100"
                                                                    height="113" />
                                                            </a>
                                                        </figure>
                                                        <div class="product-details">
                                                            <h4 class="product-name">
                                                                <a
                                                                    href="{{ route('user.product.detail', ['slug' => $product->slug]) }}">
                                                                    {{ $product->name }}
                                                                </a>
                                                            </h4>
                                                            <div class="ratings-container">
                                                                <div class="ratings-full">
                                                                    <span class="ratings"
                                                                        style="width: {{ ($product->rating / 5) * 100 }}%;"></span>
                                                                    <span
                                                                        class="tooltiptext tooltip-top">{{ number_format($product->rating, 1) }}
                                                                        out of 5</span>
                                                                </div>
                                                            </div>
                                                            <div class="product-price">
                                                                @if ($product->sale_price && $product->price > $product->sale_price)
                                                                    ${{ number_format($product->sale_price, 2) }} -
                                                                    ${{ number_format($product->price, 2) }}
                                                                @else
                                                                    ${{ number_format($product->price, 2) }}
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <!-- End of Sidebar -->
                </div>
            </div>
        </div>
        <!-- End of Page Content -->
    </main>
    <!-- End of Main -->
@endsection

@push('css')
    <style>
        /* Variant Selection Styles */
        .product-variations {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 8px;
        }

        .product-variations .color,
        .product-variations .size {
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .product-variations .color {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 1px solid #ddd;
        }

        .product-variations .size {
            padding: 5px 10px;
            border: 1px solid #ddd;
            min-width: 40px;
            text-align: center;
        }

        .product-variations .color.active,
        .product-variations .size.active {
            border-color: #333;
            font-weight: bold;
        }

        .product-variations .color.active {
            box-shadow: 0 0 0 2px #fff, 0 0 0 3px #333;
        }

        .product-variant-details {
            border-top: 1px solid #eee;
            padding-top: 15px;
            margin-top: 15px;
        }

        .variant-stock.in-stock {
            color: #26a69a;
        }

        .variant-stock.out-of-stock {
            color: #ff5252;
        }
    </style>
@endpush

@push('js')
    <script>
        $(document).ready(function() {
            // Initialize Owl Carousels
            $('[data-owl-options]').each(function() {
                const options = JSON.parse($(this).attr('data-owl-options').replace(/'/g, '"'));
                $(this).owlCarousel(options);
            });

            // Handle variant selection
            let selectedAttributes = {};

            $('.product-variations .color, .product-variations .size').on('click', function(e) {
                e.preventDefault();

                const attributeId = $(this).data('attribute-id');
                const attributeValueId = $(this).data('attribute-value-id');

                // Update selected attributes
                selectedAttributes[attributeId] = attributeValueId;

                // Update UI
                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                // If all attributes are selected, fetch variant details
                if (Object.keys(selectedAttributes).length === {{ count($variantAttributes ?? []) }}) {
                    fetchVariantDetails(selectedAttributes);
                }
            });

            function fetchVariantDetails(attributes) {
                const attributeValues = Object.values(attributes);
                const productId = {{ $product->id }};

                $.ajax({
                    url: '{{ route('user.product.getVariantDetails') }}',
                    type: 'POST',
                    data: {
                        product_id: productId,
                        attributes: attributeValues,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            const variant = response.variant;

                            // Update price display
                            if (variant.sale_price) {
                                $('.variant-price').text(variant.sale_price);
                                $('.variant-sale-price').text(variant.price).show();
                            } else {
                                $('.variant-price').text(variant.price);
                                $('.variant-sale-price').hide();
                            }

                            // Update other details
                            $('.variant-sku').text(variant.sku);
                            $('.variant-stock').text(variant.stock > 0 ? 'In Stock' : 'Out of Stock')
                                .removeClass('in-stock out-of-stock')
                                .addClass(variant.stock > 0 ? 'in-stock' : 'out-of-stock');
                            $('#selected_variant_id').val(variant.id);

                            // Show variant details
                            $('.product-variant-details').show();
                        } else {
                            alert(response.message);
                            $('.product-variant-details').hide();
                        }
                    },
                    error: function() {
                        alert('Error fetching variant details');
                        $('.product-variant-details').hide();
                    }
                });
            }

            // Update add to cart to handle variants
            $(document).on('click', '.btn-cart', function(e) {
                e.preventDefault();

                const productId = $(this).data('product-id');
                const quantity = $('.quantity[data-product-id="' + productId + '"]').val();
                const variantId = $('#selected_variant_id').val();

                // If product has variants but none selected
                if ({{ $product->variants->isNotEmpty() ? 'true' : 'false' }} && !variantId) {
                    alert('Please select all variant options');
                    return;
                }

                addToCart(productId, quantity, variantId);
            });

            function addToCart(productId, quantity, variantId = null) {
                $.ajax({
                    url: '{{ route('user.cart.add') }}',
                    type: 'POST',
                    data: {
                        product_id: productId,
                        quantity: quantity,
                        variant_id: variantId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            updateCartCount(response.cart_count);
                            showToast('success', 'Product added to cart');
                        } else {
                            showToast('error', response.message);
                        }
                    },
                    error: function(xhr) {
                        const error = xhr.responseJSON?.message || 'Error adding to cart';
                        showToast('error', error);
                    }
                });
            }

            function updateCartCount(count) {
                $('.cart-count').text(count);
            }

            function showToast(type, message) {
                const toast = `<div class="toast toast-${type}">${message}</div>`;
                $('body').append(toast);
                setTimeout(() => $('.toast').remove(), 3000);
            }

            // Quantity controls
            $(document).on('click', '.quantity-plus', function() {
                const input = $(this).siblings('.quantity');
                input.val(parseInt(input.val()) + 1);
            });

            $(document).on('click', '.quantity-minus', function() {
                const input = $(this).siblings('.quantity');
                if (parseInt(input.val()) > 1) {
                    input.val(parseInt(input.val()) - 1);
                }
            });

            // Social sharing functions
            window.shareOnFacebook = function(url) {
                window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(url),
                    'facebook-share-dialog', 'width=626,height=436');
                return false;
            }

            window.shareOnTwitter = function(text, url) {
                window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent(text) + '&url=' +
                    encodeURIComponent(url),
                    'twitter-share-dialog', 'width=626,height=436');
                return false;
            }

            window.shareOnPinterest = function(description, imageUrl, url) {
                window.open('https://pinterest.com/pin/create/button/?url=' + encodeURIComponent(url) +
                    '&media=' + encodeURIComponent(imageUrl) + '&description=' + encodeURIComponent(
                        description),
                    'pinterest-share-dialog', 'width=626,height=436');
                return false;
            }

            window.shareOnWhatsApp = function(text) {
                window.open('https://api.whatsapp.com/send?text=' + encodeURIComponent(text),
                    'whatsapp-share-dialog', 'width=626,height=436');
                return false;
            }

            window.shareOnLinkedIn = function(url) {
                window.open('https://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(url),
                    'linkedin-share-dialog', 'width=626,height=436');
                return false;
            }
        });
    </script>
@endpush
