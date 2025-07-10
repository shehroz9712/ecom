@extends('user.layouts.app')
@section('content')
    <main class="main">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb bb-no">
                    <li><a href="{{ route('user.home') }}">Home</a></li>
                    <li><a href="#">Vendor</a></li>
                    <li>{{ $vendor->name }}</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of Page Content -->
        <div class="page-content mb-8">
            <div class="container">
                <div class="row gutter-lg">
                    <aside class="sidebar left-sidebar vendor-sidebar sticky-sidebar-wrapper sidebar-fixed">
                        <!-- Sidebar content remains similar to your original -->
                        <div class="sidebar-overlay"></div>
                        <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                        <a href="#" class="sidebar-toggle"><i class="fas fa-chevron-right"></i></a>
                        <div class="sidebar-content">
                            <div class="sticky-sidebar">
                                <!-- Categories Widget -->
                                <div class="widget widget-collapsible widget-categories">
                                    <h3 class="widget-title"><span>All Categories</span></h3>
                                    <ul class="widget-body filter-items search-ul">
                                        @foreach ($categories as $category)
                                            <li><a
                                                    href="{{ route('user.shop', $category->slug) }}">{{ $category->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <!-- Contact Vendor Widget -->
                                <div class="widget widget-collapsible widget-contact">
                                    <h3 class="widget-title"><span>Contact Vendor</span></h3>
                                    <div class="widget-body">
                                        <form action="{{ route('user.vendor.contact', $vendor) }}" method="POST">
                                            @csrf
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="Your Name" required />
                                            <input type="email" class="form-control" name="email" id="email_1"
                                                placeholder="you@example.com" required />
                                            <textarea name="message" maxlength="1000" cols="25" rows="6" placeholder="Type your message..."
                                                class="form-control" required></textarea>
                                            <button type="submit" class="btn btn-dark btn-rounded">Send Message</button>
                                        </form>
                                    </div>
                                </div>

                                <!-- Store Info Widgets -->
                                <div class="widget widget-collapsible widget-time">
                                    <h3 class="widget-title"><span>Store Info</span></h3>
                                    <ul class="widget-body">
                                        <li><label>Since:</label> {{ $vendor->created_at->format('Y') }}</li>
                                        <li><label>Products:</label> {{ $vendor->products_count }}</li>
                                        <li><label>Rating:</label>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings"
                                                        style="width: {{ $vendor->avg_rating * 20 }}%;"></span>
                                                </div>
                                                ({{ $vendor->reviews_count }} reviews)
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Best Selling Products -->
                                <div class="widget widget-collapsible widget-products">
                                    <h3 class="widget-title"><span>Best Selling</span></h3>
                                    <div class="widget-body">
                                        @foreach ($bestSelling as $product)
                                            <div class="product product-widget">
                                                <figure class="product-media">
                                                    <a href="{{ route('user.product.detail', $product->slug) }}">
                                                        <img src="{{ $product->main_image }}" alt="{{ $product->name }}"
                                                            width="100" height="106" />
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h4 class="product-name">
                                                        <a
                                                            href="{{ route('user.product.detail', $product->slug) }}">{{ Str::limit($product->name, 20) }}</a>
                                                    </h4>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings"
                                                                style="width: {{ $product->rating * 20 }}%;"></span>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        @if ($product->sale_price)
                                                            <ins
                                                                class="new-price">{{ format_price($product->sale_price) }}</ins>
                                                            <del
                                                                class="old-price">{{ format_price($product->price) }}</del>
                                                        @else
                                                            {{ format_price($product->price) }}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <!-- End of Sidebar -->

                    <div class="main-content">
                        <!-- Vendor Banner -->
                        <div class="store store-banner mb-4">
                            <figure class="store-media">
                                <img src="{{ asset('assets/user/images/brands/' . $vendor->brand_logo) }}"
                                    alt="{{ $vendor->name }}" width="930" height="446"
                                    style="background-color: #414960;" />
                            </figure>
                            <div class="store-content">
                                <figure class="seller-brand">
                                    <img src="{{ asset('assets/uploads/brands/' . $vendor->brand_logo) }}"
                                        alt="{{ $vendor->name }}" width="80" height="80" />
                                </figure>
                                <h4 class="store-title">{{ $vendor->name }}</h4>
                                <ul class="seller-info-list list-style-none mb-6">
                                    @if ($vendor->address)
                                        <li class="store-address">
                                            <i class="w-icon-map-marker"></i>
                                            {{ $vendor->address }}
                                        </li>
                                    @endif
                                    @if ($vendor->phone)
                                        <li class="store-phone">
                                            <a href="tel:{{ $vendor->phone }}">
                                                <i class="w-icon-phone"></i>
                                                {{ $vendor->phone }}
                                            </a>
                                        </li>
                                    @endif
                                    <li class="store-rating">
                                        <i class="w-icon-star-full"></i>
                                        {{ number_format($vendor->avg_rating, 2) }} rating from
                                        {{ $vendor->reviews_count }} reviews
                                    </li>
                                    <li class="store-open">
                                        <i class="w-icon-cart"></i>
                                        Store {{ $vendor->status === 'active' ? 'Open' : 'Closed' }}
                                    </li>
                                </ul>
                                <div class="social-icons social-no-color border-thin">
                                    @if ($vendor->facebook)
                                        <a href="{{ $vendor->facebook }}"
                                            class="social-icon social-facebook w-icon-facebook"></a>
                                    @endif
                                    @if ($vendor->twitter)
                                        <a href="{{ $vendor->twitter }}"
                                            class="social-icon social-twitter w-icon-twitter"></a>
                                    @endif
                                    @if ($vendor->instagram)
                                        <a href="{{ $vendor->instagram }}"
                                            class="social-icon social-instagram w-icon-instagram"></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- End of Store Banner -->

                        <h2 class="title vendor-product-title mb-4">Products</h2>

                        <div class="product-wrapper row cols-md-3 cols-sm-2 cols-2">
                            @foreach ($products as $product)
                                @include('user.products.product-item', ['product' => $product])
                            @endforeach


                        </div>

                        <!-- Pagination -->
                        <div class="toolbox toolbox-pagination justify-content-between">
                            <p class="showing-info mb-2 mb-sm-0">
                                Showing <span>{{ $products->firstItem() }}-{{ $products->lastItem() }}</span>
                                of <span>{{ $products->total() }}</span> Products
                            </p>
                            <ul class="pagination">
                                @if ($products->onFirstPage())
                                    <li class="prev disabled"><a href="#" aria-label="Previous" tabindex="-1"
                                            aria-disabled="true"><i class="w-icon-long-arrow-left"></i>Prev</a></li>
                                @else
                                    <li class="prev"><a href="{{ $products->previousPageUrl() }}"
                                            aria-label="Previous"><i class="w-icon-long-arrow-left"></i>Prev</a></li>
                                @endif

                                @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                                    <li class="{{ $page == $products->currentPage() ? 'active' : '' }}">
                                        <a href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach

                                @if ($products->hasMorePages())
                                    <li class="next"><a href="{{ $products->nextPageUrl() }}" aria-label="Next">Next<i
                                                class="w-icon-long-arrow-right"></i></a></li>
                                @else
                                    <li class="next disabled"><a href="#" aria-label="Next" tabindex="-1"
                                            aria-disabled="true">Next<i class="w-icon-long-arrow-right"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <!-- End of Main Content -->
                </div>
            </div>
        </div>
        <!-- End of Page Content -->
    </main>
@endsection

@push('scripts')
@endpush
