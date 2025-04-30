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
                                                <img src="{{ asset('assets/uploads/products/' . $image->image_path) }}"
                                                    data-zoom-image="{{ asset('assets/uploads/products/' . $image->image_path) }}"
                                                    alt="{{ $product->name }}" width="800" height="900">
                                            </figure>
                                        @endforeach
                                    </div>
                                    <div class="product-thumbs-wrap">
                                        <div class="product-thumbs row cols-4 gutter-sm">
                                            @foreach ($product->images as $key => $image)
                                                <div class="product-thumb {{ $key === 0 ? 'active' : '' }}">
                                                    <img src="{{ asset('assets/uploads/products/' . $image->image_path) }}"
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

                                    <div class="product-price">
                                        @if ($product->sale_price)
                                            <ins class="new-price">${{ number_format($product->sale_price, 2) }}</ins>
                                            <del class="old-price">${{ number_format($product->price, 2) }}</del>
                                        @else
                                            <ins class="new-price">${{ number_format($product->price, 2) }}</ins>
                                        @endif
                                    </div>

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

                                    @if ($product->attributes->where('attribute_id', 1)->count() > 0)
                                        <div class="product-form product-variation-form product-color-swatch">
                                            <label>Color:</label>
                                            <div class="d-flex align-items-center product-variations">
                                                @foreach ($product->attributes->where('attribute_id', 1) as $color)
                                                    <a href="#" class="color"
                                                        style="background-color: {{ $color->value }}"></a>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif

                                    @if ($product->attributes->where('attribute_id', 2)->count() > 0)
                                        <div class="product-form product-variation-form product-size-swatch">
                                            <label class="mb-1">Size:</label>
                                            <div class="flex-wrap d-flex align-items-center product-variations">
                                                @foreach ($product->attributes->where('attribute_id', 2) as $size)
                                                    <a href="#" class="size">{{ $size->value }}</a>
                                                @endforeach
                                            </div>
                                            <a href="#" class="product-variation-clean">Clean All</a>
                                        </div>
                                    @endif

                                    <div class="product-variation-price">
                                        <span></span>
                                    </div>

                                    <div class="fix-bottom product-sticky-content sticky-content">
                                        <div class="product-form container">
                                            <div class="product-qty-form">
                                                <div class="input-group">
                                                    <input class="quantity form-control" type="number" min="1"
                                                        max="10000000" value="1">
                                                    <button class="quantity-plus w-icon-plus"></button>
                                                    <button class="quantity-minus w-icon-minus"></button>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary btn-cart">
                                                <i class="w-icon-cart"></i>
                                                <span>Add to Cart</span>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="social-links-wrapper">
                                        <div class="social-links">
                                            <div class="social-icons social-no-color border-thin">
                                                <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                                <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                                <a href="#"
                                                    class="social-icon social-pinterest fab fa-pinterest-p"></a>
                                                <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                                                <a href="#" class="social-icon social-youtube fab fa-linkedin-in"></a>
                                            </div>
                                        </div>
                                        <span class="divider d-xs-show"></span>
                                        <div class="product-link-wrapper d-flex">
                                            <a href="#"
                                                class="btn-product-icon btn-wishlist w-icon-heart"><span></span></a>
                                            <a href="#"
                                                class="btn-product-icon btn-compare btn-icon-left w-icon-compare"><span></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="frequently-bought-together mt-5">
                            {{-- <h2 class="title title-underline">Frequently Bought Together</h2>
                            <div class="bought-together-products row mt-8 pb-4">
                                <div class="product product-wrap text-center">
                                    <figure class="product-media">
                                        <img src="{{ asset('assets/user/images/products/default/bought-1.jpg') }}"
                                            alt="Product" width="138" height="138" />
                                        <div class="product-checkbox">
                                            <input type="checkbox" class="custom-checkbox" id="product_check1"
                                                name="product_check1">
                                            <label></label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="#">Electronics Black Wrist Watch</a>
                                        </h4>
                                        <div class="product-price">$40.00</div>
                                    </div>
                                </div>
                                <div class="product product-wrap text-center">
                                    <figure class="product-media">
                                        <img src="{{ asset('assets/user/images/products/default/bought-2.jpg') }}"
                                            alt="Product" width="138" height="138" />
                                        <div class="product-checkbox">
                                            <input type="checkbox" class="custom-checkbox" id="product_check2"
                                                name="product_check2">
                                            <label></label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="#">Apple Laptop</a>
                                        </h4>
                                        <div class="product-price">$1,800.00</div>
                                    </div>
                                </div>
                                <div class="product product-wrap text-center">
                                    <figure class="product-media">
                                        <img src="{{ asset('assets/user/images/products/default/bought-3.jpg') }}"
                                            alt="Product" width="138" height="138" />
                                        <div class="product-checkbox">
                                            <input type="checkbox" class="custom-checkbox" id="product_check3"
                                                name="product_check3">
                                            <label></label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="#">White Lenovo Headphone</a>
                                        </h4>
                                        <div class="product-price">$34.00</div>
                                    </div>
                                </div>
                                <div class="product-button">
                                    <div class="bought-price font-weight-bolder text-primary ls-50">$1,874.00</div>
                                    <div class="bought-count">For 3 items</div>
                                    <a href="{{ route('user.cart') }}" class="btn btn-dark btn-rounded">Add All To
                                        Cart</a>
                                </div>
                            </div> --}}
                        </div>
                        <div class="tab tab-nav-boxed tab-nav-underline product-tabs">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a href="#product-tab-description" class="nav-link active">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#product-tab-specification" class="nav-link">Specification</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#product-tab-vendor" class="nav-link">Vendor Info</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#product-tab-reviews" class="nav-link">Customer Reviews (3)</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="product-tab-description">
                                    {!! $product->description !!}

                                </div>
                                <div class="tab-pane" id="product-tab-specification">
                                    {!! $product->specification !!}
                                </div>
                                <div class="tab-pane" id="product-tab-vendor">
                                    <div class="row mb-3">
                                        <div class="col-md-6 mb-4">
                                            <figure class="vendor-banner br-sm">
                                                <img src="{{ asset('assets/user/images/products/vendor-banner.jpg') }}"
                                                    alt="Vendor Banner" width="610" height="295"
                                                    style="background-color: #353B55;" />
                                            </figure>
                                        </div>
                                        <div class="col-md-6 pl-2 pl-md-6 mb-4">
                                            <div class="vendor-user">
                                                <figure class="vendor-logo mr-4">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/user/images/products/vendor-logo.jpg') }}"
                                                            alt="Vendor Logo" width="80" height="80" />
                                                    </a>
                                                </figure>
                                                <div>
                                                    <div class="vendor-name"><a href="#">Jone Doe</a></div>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 90%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <a href="#" class="rating-reviews">(32 Reviews)</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="vendor-info list-style-none">
                                                <li class="store-name">
                                                    <label>Store Name:</label>
                                                    <span class="detail">OAIO Store</span>
                                                </li>
                                                <li class="store-address">
                                                    <label>Address:</label>
                                                    <span class="detail">Steven Street, El Carjon, CA 92020, United
                                                        States (US)</span>
                                                </li>
                                                <li class="store-phone">
                                                    <label>Phone:</label>
                                                    <a href="#tel:">1234567890</a>
                                                </li>
                                            </ul>
                                            <a href="vendor-dokan-store.html"
                                                class="btn btn-dark btn-link btn-underline btn-icon-right">Visit
                                                Store<i class="w-icon-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <p class="mb-5"><strong class="text-dark">L</strong>orem ipsum dolor sit amet,
                                        consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                        dolore magna aliqua.
                                        Venenatis tellus in metus vulputate eu scelerisque felis. Vel pretium
                                        lectus quam id leo in vitae turpis massa. Nunc id cursus metus aliquam.
                                        Libero id faucibus nisl tincidunt eget. Aliquam id diam maecenas ultricies
                                        mi eget mauris. Volutpat ac tincidunt vitae semper quis lectus. Vestibulum
                                        mattis ullamcorper velit sed. A arcu cursus vitae congue mauris.
                                    </p>
                                    <p class="mb-2"><strong class="text-dark">A</strong> arcu cursus vitae congue
                                        mauris. Sagittis id consectetur purus
                                        ut. Tellus rutrum tellus pellentesque eu tincidunt tortor aliquam nulla.
                                        Diam in
                                        arcu cursus euismod quis. Eget sit amet tellus cras adipiscing enim eu. In
                                        fermentum et sollicitudin ac orci phasellus. A condimentum vitae sapien
                                        pellentesque
                                        habitant morbi tristique senectus et. In dictum non consectetur a erat. Nunc
                                        scelerisque viverra mauris in aliquam sem fringilla.</p>
                                </div>
                                <div class="tab-pane" id="product-tab-reviews">
                                    <div class="row mb-4">
                                        <div class="col-xl-4 col-lg-5 mb-4">
                                            <div class="ratings-wrapper">
                                                <div class="avg-rating-container">
                                                    <h4 class="avg-mark font-weight-bolder ls-50">
                                                        {{ number_format($product->rating, 1) }}</h4>
                                                    <div class="avg-rating">
                                                        <p class="text-dark mb-1">Average Rating</p>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings"
                                                                    style="width: {{ ($product->rating / 5) * 100 }}%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                            <a href="#"
                                                                class="rating-reviews">({{ $product->reviews->count() }}
                                                                Reviews)</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @php
                                                    $recommendedCount = $product->reviews
                                                        ->where('rating', '>=', 4)
                                                        ->count();
                                                    $recommendedPercentage =
                                                        $product->reviews->count() > 0
                                                            ? round(
                                                                ($recommendedCount / $product->reviews->count()) * 100,
                                                                1,
                                                            )
                                                            : 0;
                                                @endphp
                                                <div class="ratings-value d-flex align-items-center text-dark ls-25">
                                                    <span
                                                        class="text-dark font-weight-bold">{{ $recommendedPercentage }}%</span>Recommended<span
                                                        class="count">({{ $recommendedCount }} of
                                                        {{ $product->reviews->count() }})</span>
                                                </div>
                                                <div class="ratings-list">
                                                    @for ($i = 5; $i >= 1; $i--)
                                                        @php
                                                            $count = $product->reviews->where('rating', $i)->count();
                                                            $percentage =
                                                                $product->reviews->count() > 0
                                                                    ? round(
                                                                        ($count / $product->reviews->count()) * 100,
                                                                        1,
                                                                    )
                                                                    : 0;
                                                        @endphp
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings"
                                                                    style="width: {{ ($i / 5) * 100 }}%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                            <div class="progress-bar progress-bar-sm">
                                                                <span style="width: {{ $percentage }}%;"></span>
                                                            </div>
                                                            <div class="progress-value">
                                                                <mark>{{ $percentage }}%</mark>
                                                            </div>
                                                        </div>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-8 col-lg-7 mb-4">
                                            <div class="review-form-wrapper">
                                                <h3 class="title tab-pane-title font-weight-bold mb-1">Submit Your Review
                                                </h3>
                                                <p class="mb-3">Your email address will not be published. Required fields
                                                    are marked *</p>
                                                <form action="{{ route('user.reviews.store', $product) }}" method="POST"
                                                    class="review-form">
                                                    @csrf
                                                    <div class="rating-form">
                                                        <label for="rating">Your Rating Of This Product :</label>
                                                        <span class="rating-stars">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <a class="star-{{ $i }}" href="#"
                                                                    data-rating="{{ $i }}">{{ $i }}</a>
                                                            @endfor
                                                        </span>
                                                        <select name="rating" id="rating" required
                                                            style="display: none;">
                                                            <option value="">Rate…</option>
                                                            <option value="5">Perfect</option>
                                                            <option value="4">Good</option>
                                                            <option value="3">Average</option>
                                                            <option value="2">Not that bad</option>
                                                            <option value="1">Very poor</option>
                                                        </select>
                                                    </div>
                                                    <textarea cols="30" rows="6" placeholder="Write Your Review Here..." class="form-control" id="review"
                                                        name="comment" required></textarea>
                                                    <div class="row gutter-md">
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"
                                                                placeholder="Your Name" id="author" name="name"
                                                                required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="email" class="form-control"
                                                                placeholder="Your Email" id="email_1" name="email"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="checkbox" class="custom-checkbox" id="save-checkbox"
                                                            name="save_info">
                                                        <label for="save-checkbox">Save my name, email, and website in this
                                                            browser for the next time I comment.</label>
                                                    </div>
                                                    <button type="submit" class="btn btn-dark">Submit Review</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab tab-nav-boxed tab-nav-outline tab-nav-center">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a href="#show-all" class="nav-link active">Show All</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#helpful-positive" class="nav-link">Most Helpful Positive</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#helpful-negative" class="nav-link">Most Helpful Negative</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#highest-rating" class="nav-link">Highest Rating</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#lowest-rating" class="nav-link">Lowest Rating</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="show-all">
                                                <ul class="comments list-style-none">
                                                    @foreach ($product->reviews as $review)
                                                        <li class="comment">
                                                            <div class="comment-body">
                                                                <figure class="comment-avatar">
                                                                    <img src="{{ $review->user->avatar ?? asset('assets/user/images/agents/1-100x100.png') }}"
                                                                        alt="Commenter Avatar" width="90"
                                                                        height="90">
                                                                </figure>
                                                                <div class="comment-content">
                                                                    <h4 class="comment-author">
                                                                        <a
                                                                            href="#">{{ $review->user->name ?? $review->name }}</a>
                                                                        <span
                                                                            class="comment-date">{{ $review->created_at->format('F d, Y \a\t h:i a') }}</span>
                                                                    </h4>
                                                                    <div class="ratings-container comment-rating">
                                                                        <div class="ratings-full">
                                                                            <span class="ratings"
                                                                                style="width: {{ ($review->rating / 5) * 100 }}%;"></span>
                                                                            <span class="tooltiptext tooltip-top"></span>
                                                                        </div>
                                                                    </div>
                                                                    <p>{{ $review->comment }}</p>
                                                                    <div class="comment-action">
                                                                        <a href="#"
                                                                            class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                            <i class="far fa-thumbs-up"></i>Helpful
                                                                            ({{ $review->helpful_count ?? 0 }})
                                                                        </a>
                                                                        <a href="#"
                                                                            class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                            <i class="far fa-thumbs-down"></i>Unhelpful
                                                                            ({{ $review->unhelpful_count ?? 0 }})
                                                                        </a>
                                                                        @if ($review->images->count() > 0)
                                                                            <div class="review-image">
                                                                                @foreach ($review->images as $image)
                                                                                    <a href="#">
                                                                                        <figure>
                                                                                            <img src="{{ asset('uploads/products/reviews' . $image->image) }}"
                                                                                                width="60"
                                                                                                height="60"
                                                                                                alt="Attachment image of {{ $review->user->name }}'s review"
                                                                                                data-zoom-image="{{ $image->full_url }}" />
                                                                                        </figure>
                                                                                    </a>
                                                                                @endforeach
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>

                                            <!-- Other tabs would filter the reviews similarly -->
                                            <div class="tab-pane" id="helpful-positive">
                                                <ul class="comments list-style-none">
                                                    @foreach ($product->reviews->where('rating', '>=', 4)->sortByDesc('helpful_count') as $review)
                                                        <!-- Same review structure as above -->
                                                    @endforeach
                                                </ul>
                                            </div>

                                            <div class="tab-pane" id="helpful-negative">
                                                <ul class="comments list-style-none">
                                                    @foreach ($product->reviews->where('rating', '<=', 2)->sortByDesc('unhelpful_count') as $review)
                                                        <!-- Same review structure as above -->
                                                    @endforeach
                                                </ul>
                                            </div>

                                            <div class="tab-pane" id="highest-rating">
                                                <ul class="comments list-style-none">
                                                    @foreach ($product->reviews->sortByDesc('rating') as $review)
                                                        <!-- Same review structure as above -->
                                                    @endforeach
                                                </ul>
                                            </div>

                                            <div class="tab-pane" id="lowest-rating">
                                                <ul class="comments list-style-none">
                                                    @foreach ($product->reviews->sortBy('rating') as $review)
                                                        <!-- Same review structure as above -->
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                                        <img src="{{ asset('assets/uploads/products/' . $vendorProduct->images[0]->image_path) }}"
                                                            alt="{{ $vendorProduct->name }}" width="300"
                                                            height="338" />
                                                        <img src="{{ asset('assets/uploads/products/' . $vendorProduct->images[1]->image_path) }}"
                                                            alt="{{ $vendorProduct->name }}" width="300"
                                                            height="338" />
                                                    @else
                                                        <img src="{{ asset('assets/uploads/products/' . $vendorProduct->images[0]->image_path) }}"
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
                                        
                                        @foreach($chunks as $chunk)
                                        <div class="widget-col">
                                            @foreach($chunk as $product)
                                            <div class="product product-widget">
                                                <figure class="product-media">
                                                    <a href="{{ route('user.product.detail', ['slug' => $product->slug]) }}">
                                                        <img src="{{ asset('assets/uploads/products /' . $product->images->first()->image_path) }}" 
                                                             alt="{{ $product->name }}" width="100" height="113" />
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h4 class="product-name">
                                                        <a href="{{ route('user.product.detail', ['slug' => $product->slug]) }}">
                                                            {{ $product->name }}
                                                        </a>
                                                    </h4>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: {{ ($product->rating / 5) * 100 }}%;"></span>
                                                            <span class="tooltiptext tooltip-top">{{ number_format($product->rating, 1) }} out of 5</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        @if($product->sale_price && $product->price > $product->sale_price)
                                                            ${{ number_format($product->sale_price, 2) }} - ${{ number_format($product->price, 2) }}
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

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Owl Carousels
            $('[data-owl-options]').each(function() {
                const options = JSON.parse($(this).attr('data-owl-options').replace(/'/g, '"'));
                $(this).owlCarousel(options);
            });

            // Quick view handler
            $(document).on('click', '.btn-quickview', function(e) {
                e.preventDefault();
                const url = $(this).attr('href');
                // Implement your quick view logic here
                // Example: $.get(url, function(data) { showModal(data); });
            });

            // Add to cart handler
            $(document).on('click', '.btn-cart', function(e) {
                e.preventDefault();
                const productId = $(this).closest('.product').data('id');
                // Implement your add to cart logic here
            });
        });
    </script>
@endpush
