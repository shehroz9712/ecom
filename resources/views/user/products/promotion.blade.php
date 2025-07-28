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
                        <h4 class="banner-subtitle font-weight-bold">Promotion Product</h4>
                        <h3 class="banner-title text-white text-uppercase font-weight-bolder ls-normal">Smart Wrist
                            Watches</h3>
                        {{-- <a href="#" class="btn btn-dark btn-rounded btn-icon-right">Discover
                            Now<i class="w-icon-long-arrow-right"></i></a> --}}
                    </div>
                </div>

                <!-- Start of Shop Content -->
                <div class="shop-content row gutter-lg mb-10">


                    <!-- Start of Shop Main Content -->
                    <div class="main-content">


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
