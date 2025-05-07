@extends('user.layouts.app')
@section('content')
    <main class="main">

        <!-- Start of Page Content -->
        <div class="page-content">
            <div class="container">
                <!-- Start of Shop Banner -->
                <div class="shop-default-banner banner d-flex align-items-center mb-5 br-xs"
                    style="background-image: url({{ asset('assets/user/images/shop/banner1.jpg') }}); background-color: #FFC74E;">
                    <div class="banner-content">
                        <h4 class="banner-subtitle font-weight-bold">Accessories Collection</h4>
                        <h3 class="banner-title text-white text-uppercase font-weight-bolder ls-normal">Smart Wrist
                            Watches</h3>
                        <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">Discover
                            Now<i class="w-icon-long-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Start of Shop Content -->
                <div class="shop-content row gutter-lg mb-10">
                    <!-- Start of Sidebar, Shop Sidebar -->
                    <aside class="sidebar shop-sidebar sticky-sidebar-wrapper sidebar-fixed">
                        <!-- Start of Sidebar Overlay -->
                        <div class="sidebar-overlay"></div>
                        <a class="sidebar-close" href="#"><i class="close-icon"></i></a>

                        <!-- Start of Sidebar Content -->
                        <div class="sidebar-content scrollable">
                            <!-- Start of Sticky Sidebar -->
                            <div class="sticky-sidebar">
                                <div class="filter-actions">
                                    <label>Filter :</label>
                                    <a href="{{ route('user.shop') }}" class="btn btn-dark btn-link filter-clean">Clean
                                        All</a>
                                </div>

                                <!-- Categories Filter -->
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title"><span>All Categories</span></h3>
                                    <ul class="widget-body filter-items search-ul">
                                        @foreach ($categories as $cat)
                                            <li>
                                                <a href="{{ route('user.shop', ['category' => $cat->slug]) }}"
                                                    class="{{ request('category') == $cat->slug ? 'active' : '' }}">
                                                    {{ $cat->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <!-- Price Filter -->
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title"><span>Price</span></h3>
                                    <div class="widget-body">
                                        <ul class="filter-items search-ul">
                                            <li>
                                                <a href="{{ route('user.shop', array_merge(request()->query(), ['min_price' => 0, 'max_price' => 100])) }}"
                                                    class="{{ request('min_price') == 0 && request('max_price') == 100 ? 'active' : '' }}">
                                                    $0.00 - $100.00
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('user.shop', array_merge(request()->query(), ['min_price' => 100, 'max_price' => 200])) }}"
                                                    class="{{ request('min_price') == 100 && request('max_price') == 200 ? 'active' : '' }}">
                                                    $100.00 - $200.00
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('user.shop', array_merge(request()->query(), ['min_price' => 200, 'max_price' => 300])) }}"
                                                    class="{{ request('min_price') == 200 && request('max_price') == 300 ? 'active' : '' }}">
                                                    $200.00 - $300.00
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('user.shop', array_merge(request()->query(), ['min_price' => 300, 'max_price' => 500])) }}"
                                                    class="{{ request('min_price') == 300 && request('max_price') == 500 ? 'active' : '' }}">
                                                    $300.00 - $500.00
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('user.shop', array_merge(request()->query(), ['min_price' => 500, 'max_price' => null])) }}"
                                                    class="{{ request('min_price') == 500 && !request('max_price') ? 'active' : '' }}">
                                                    $500.00+
                                                </a>
                                            </li>
                                        </ul>
                                        <form class="price-range" action="{{ route('user.shop') }}" method="GET">
                                            @foreach (request()->except(['min_price', 'max_price']) as $key => $value)
                                                @if (is_array($value))
                                                    @foreach ($value as $arrayValue)
                                                        <input type="hidden" name="{{ $key }}[]"
                                                            value="{{ $arrayValue }}">
                                                    @endforeach
                                                @else
                                                    <input type="hidden" name="{{ $key }}"
                                                        value="{{ $value }}">
                                                @endif
                                            @endforeach
                                            <input type="number" name="min_price" class="min_price text-center"
                                                placeholder="$min" value="{{ request('min_price') }}">
                                            <span class="delimiter">-</span>
                                            <input type="number" name="max_price" class="max_price text-center"
                                                placeholder="$max" value="{{ request('max_price') }}">
                                            <button type="submit" class="btn btn-primary btn-rounded">Go</button>
                                        </form>
                                    </div>
                                </div>


                                <!-- Brand Filter -->
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title"><span>Brand</span></h3>
                                    <ul class="widget-body filter-items item-check mt-1">
                                        <li><a href="#">Elegant Auto Group</a></li>
                                        <li><a href="#">Green Grass</a></li>
                                        <li><a href="#">Node Js</a></li>
                                        <li><a href="#">NS8</a></li>
                                        <li><a href="#">Red</a></li>
                                        <li><a href="#">Skysuite Tech</a></li>
                                        <li><a href="#">Sterling</a></li>
                                    </ul>
                                </div>


                            </div>
                            <!-- End of Sticky Sidebar -->
                        </div>
                        <!-- End of Sidebar Content -->
                    </aside>
                    <!-- End of Shop Sidebar -->

                    <!-- Start of Shop Main Content -->
                    <div class="main-content">
                        <nav class="toolbox sticky-toolbox sticky-content fix-top">
                            <div class="toolbox-left">
                                <a href="#"
                                    class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle btn-icon-left d-block d-lg-none">
                                    <i class="w-icon-category"></i><span>Filters</span>
                                </a>
                                <div class="toolbox-item toolbox-sort select-box text-dark">
                                    <label>Sort By :</label>
                                    <select name="orderby" class="form-control">
                                        <option value="default"
                                            {{ request('orderby', 'default') == 'default' ? 'selected' : '' }}>Default
                                        </option>
                                        <option value="popularity"
                                            {{ request('orderby') == 'popularity' ? 'selected' : '' }}>Sort by popularity
                                        </option>
                                        <option value="rating" {{ request('orderby') == 'rating' ? 'selected' : '' }}>Sort
                                            by average rating</option>
                                        <option value="date" {{ request('orderby') == 'date' ? 'selected' : '' }}>Sort
                                            by latest</option>
                                        <option value="price-low"
                                            {{ request('orderby') == 'price-low' ? 'selected' : '' }}>Sort by price: low to
                                            high</option>
                                        <option value="price-high"
                                            {{ request('orderby') == 'price-high' ? 'selected' : '' }}>Sort by price: high
                                            to low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="toolbox-right">
                                <div class="toolbox-item toolbox-show select-box">
                                    <select name="count" class="form-control">
                                        <option value="9" {{ request('count', 12) == 9 ? 'selected' : '' }}>Show 9
                                        </option>
                                        <option value="12" {{ request('count', 12) == 12 ? 'selected' : '' }}>Show 12
                                        </option>
                                        <option value="24" {{ request('count') == 24 ? 'selected' : '' }}>Show 24
                                        </option>
                                        <option value="36" {{ request('count') == 36 ? 'selected' : '' }}>Show 36
                                        </option>
                                    </select>
                                </div>
                                <div class="toolbox-item toolbox-layout">
                                    <a href="{{ route('user.shop', array_merge(request()->query(), ['layout' => 'grid'])) }}"
                                        class="icon-mode-grid btn-layout {{ request('layout', 'grid') == 'grid' ? 'active' : '' }}">
                                        <i class="w-icon-grid"></i>
                                    </a>
                                    <a href="{{ route('user.shop', array_merge(request()->query(), ['layout' => 'list'])) }}"
                                        class="icon-mode-list btn-layout {{ request('layout') == 'list' ? 'active' : '' }}">
                                        <i class="w-icon-list"></i>
                                    </a>
                                </div>
                            </div>
                        </nav>

                        <div class="product-wrapper row cols-lg-4 cols-md-3 cols-sm-2 cols-2">
                            @foreach ($products as $product)
                                @include('user.products.product-item', ['product' => $product])
                            @endforeach
                        </div>

                        <div class="toolbox toolbox-pagination justify-content-between">
                            <p class="showing-info mb-2 mb-sm-0">
                                Showing<span>{{ $products->firstItem() }}-{{ $products->lastItem() }} of
                                    {{ $products->total() }}</span>Products
                            </p>
                            {{ $products->withQueryString()->links() }}
                        </div>
                    </div>
                    <!-- End of Shop Main Content -->
                </div>
                <!-- End of Shop Content -->



                <!-- CSS for Active Filters -->
                <style>
                    .filter-items.search-ul li a.active {
                        color: #336699;
                        font-weight: bold;
                    }

                    .btn-layout.active {
                        color: #336699;
                    }
                </style>
            </div>
        </div>
        <!-- End of Page Content -->
    </main>
@endsection
@section('script')
    <!-- JavaScript for Sidebar and Filtering -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sort dropdown handler
            const sortSelect = document.querySelector('select[name="orderby"]');
            if (sortSelect) {
                sortSelect.addEventListener('change', function() {
                    const url = new URL(window.location.href);
                    url.searchParams.set('orderby', this.value);
                    url.searchParams.delete('page');
                    window.location.href = url.toString();
                });
            }

            // Items per page handler
            const countSelect = document.querySelector('select[name="count"]');
            if (countSelect) {
                countSelect.addEventListener('change', function() {
                    const url = new URL(window.location.href);
                    url.searchParams.set('count', this.value);
                    url.searchParams.delete('page');
                    window.location.href = url.toString();
                });
            }

            // Toggle sidebar on mobile
            document.querySelector('.left-sidebar-toggle')?.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector('.sidebar').classList.add('active');
                document.querySelector('.sidebar-overlay').classList.add('active');
            });

            // Close sidebar
            document.querySelector('.sidebar-close')?.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector('.sidebar').classList.remove('active');
                document.querySelector('.sidebar-overlay').classList.remove('active');
            });

            // Close sidebar when clicking overlay
            document.querySelector('.sidebar-overlay')?.addEventListener('click', function() {
                document.querySelector('.sidebar').classList.remove('active');
                this.classList.remove('active');
            });

            // Price range links
            document.querySelectorAll('.filter-items.search-ul li a').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    window.location.href = this.href;
                });
            });

            // Add to cart
            $(document).on('click', '.btn-cart', function(e) {
                e.preventDefault();
                const productId = $(this).data('product-id');

                $.ajax({
                    url: '/cart/add',
                    method: 'POST',
                    data: {
                        product_id: productId,
                        quantity: 1,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        updateCartCount(response.cartCount);
                        showToast('Product added to cart');
                    }
                });
            });

            // Quick view
            $(document).on('click', '.btn-quickview', function(e) {
                e.preventDefault();
                const productId = $(this).data('product-id');

                $.get('/products/quick-view/' + productId, function(response) {
                    $('#quickViewModal .modal-body').html(response);
                    $('#quickViewModal').modal('show');
                });
            });

            // Wishlist
            $(document).on('click', '.btn-wishlist', function(e) {
                e.preventDefault();
                const productId = $(this).data('product-id');

                $.ajax({
                    url: '/wishlist/toggle',
                    method: 'POST',
                    data: {
                        product_id: productId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.added) {
                            showToast('Product added to wishlist');
                        } else {
                            showToast('Product removed from wishlist');
                        }
                    }
                });
            });
        });

        // Make sure these are defined globally if used elsewhere
    </script>
@endsection
