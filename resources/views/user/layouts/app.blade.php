<!DOCTYPE html>
<html lang="en">

@include('user.layouts.partials.head')

<body class="home">
    <div class="page-wrapper">
        <!-- Start of Header -->
        @include('user.layouts.partials.header')
        <!-- End of Header -->

        <!-- Start of Main-->
        @yield('content')

        <!-- End of Main -->

        <!-- Start of Footer -->
        @include('user.layouts.partials.footer')
        <!-- End of Footer -->
    </div>
    <!-- End of Page-wrapper-->



    <!-- Start of Scroll Top -->
    <a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="fas fa-chevron-up"></i></a>
    <!-- End of Scroll Top -->

    <!-- Start of Mobile Menu -->
    <div class="mobile-menu-wrapper">
        <div class="mobile-menu-overlay"></div>
        <!-- End of .mobile-menu-overlay -->

        <a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
        <!-- End of .mobile-menu-close -->

        <div class="mobile-menu-container scrollable">
            <form action="#" method="get" class="input-wrapper">
                <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search"
                    required />
                <button class="btn btn-search" type="submit">
                    <i class="w-icon-search"></i>
                </button>
            </form>
            <!-- End of Search Form -->
            <div class="tab">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#main-menu" class="nav-link active">Main Menu</a>
                    </li>
                    <li class="nav-item">
                        <a href="#categories" class="nav-link">Categories</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="main-menu">
                    <ul class="mobile-menu">
                        <li><a href="{{ route('user.home') }}">Home</a></li>
                        <li>
                            <a href="{{ route('user.shop') }}ml">Shop</a>

                        </li>
                        <li>
                            <a href="{{ route('user.vendor') }}">Vendor</a>

                        </li>
                        <li>
                            <a href="{{ route('user.blog') }}">Blog</a>

                        </li>
                        <li>
                            <a href="{{ route('user.about') }}">About</a>

                        </li>

                    </ul>
                </div>
                <div class="tab-pane" id="categories">
                    <ul class="mobile-menu">
                        <li>
                            <a href="{{ route('user.shop') }}">
                                <i class="w-icon-tshirt2"></i>Fashion
                            </a>
                            <ul>
                                <li>
                                    <a href="#">Women</a>

                                </li>
                                <li>
                                    <a href="#">Men</a>

                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('user.shop') }}">
                                <i class="w-icon-home"></i>Home & Garden
                            </a>
                            <ul>
                                <li>
                                    <a href="#">Bedroom</a>

                                </li>
                                <li>
                                    <a href="#">Living Room</a>

                                </li>
                                <li>
                                    <a href="#">Office</a>

                                </li>
                                <li>
                                    <a href="#">Kitchen & Dining</a>

                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('user.shop') }}">
                                <i class="w-icon-electronics"></i>Electronics
                            </a>
                            <ul>
                                <li>
                                    <a href="#">Laptops &amp; Computers</a>
                                    <ul>
                                        <li><a href="{{ route('user.shop') }}">Desktop
                                                Computers</a></li>
                                        <li><a href="{{ route('user.shop') }}">Monitors</a></li>
                                        <li><a href="{{ route('user.shop') }}">Laptops</a></li>
                                        <li><a href="{{ route('user.shop') }}">Hard Drives &amp;
                                                Storage</a></li>
                                        <li><a href="{{ route('user.shop') }}">Computer
                                                Accessories</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">TV &amp; Video</a>
                                    <ul>
                                        <li><a href="{{ route('user.shop') }}">TVs</a></li>
                                        <li><a href="{{ route('user.shop') }}">Home Audio
                                                Speakers</a></li>
                                        <li><a href="{{ route('user.shop') }}">Projectors</a></li>
                                        <li><a href="{{ route('user.shop') }}">Media Streaming
                                                Devices</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Digital Cameras</a>
                                    <ul>
                                        <li><a href="{{ route('user.shop') }}">Digital SLR
                                                Cameras</a></li>
                                        <li><a href="{{ route('user.shop') }}">Sports & Action
                                                Cameras</a></li>
                                        <li><a href="{{ route('user.shop') }}">Camera Lenses</a>
                                        </li>
                                        <li><a href="{{ route('user.shop') }}">Photo Printer</a>
                                        </li>
                                        <li><a href="{{ route('user.shop') }}">Digital Memory
                                                Cards</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Cell Phones</a>
                                    <ul>
                                        <li><a href="{{ route('user.shop') }}">Carrier Phones</a>
                                        </li>
                                        <li><a href="{{ route('user.shop') }}">Unlocked Phones</a>
                                        </li>
                                        <li><a href="{{ route('user.shop') }}">Phone & Cellphone
                                                Cases</a></li>
                                        <li><a href="{{ route('user.shop') }}">Cellphone
                                                Chargers</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('user.shop') }}">
                                <i class="w-icon-furniture"></i>Furniture
                            </a>
                            <ul>
                                <li>
                                    <a href="#">Furniture</a>
                                    <ul>
                                        <li><a href="{{ route('user.shop') }}">Sofas & Couches</a>
                                        </li>
                                        <li><a href="{{ route('user.shop') }}">Armchairs</a></li>
                                        <li><a href="{{ route('user.shop') }}">Bed Frames</a></li>
                                        <li><a href="{{ route('user.shop') }}">Beside Tables</a>
                                        </li>
                                        <li><a href="{{ route('user.shop') }}">Dressing Tables</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="#">Lighting</a>
                                    <ul>
                                        <li><a href="{{ route('user.shop') }}">Light Bulbs</a>
                                        </li>
                                        <li><a href="{{ route('user.shop') }}">Lamps</a></li>
                                        <li><a href="{{ route('user.shop') }}">Celling Lights</a>
                                        </li>
                                        <li><a href="{{ route('user.shop') }}">Wall Lights</a>
                                        </li>
                                        <li><a href="{{ route('user.shop') }}">Bathroom
                                                Lighting</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="#">Home Accessories</a>
                                    <ul>
                                        <li><a href="{{ route('user.shop') }}">Decorative
                                                Accessories</a></li>
                                        <li><a href="{{ route('user.shop') }}">Candals &
                                                Holders</a></li>
                                        <li><a href="{{ route('user.shop') }}">Home Fragrance</a>
                                        </li>
                                        <li><a href="{{ route('user.shop') }}">Mirrors</a></li>
                                        <li><a href="{{ route('user.shop') }}">Clocks</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="#">Garden & Outdoors</a>
                                    <ul>
                                        <li><a href="{{ route('user.shop') }}">Garden
                                                Furniture</a></li>
                                        <li><a href="{{ route('user.shop') }}">Lawn Mowers</a>
                                        </li>
                                        <li><a href="{{ route('user.shop') }}">Pressure
                                                Washers</a></li>
                                        <li><a href="{{ route('user.shop') }}">All Garden
                                                Tools</a></li>
                                        <li><a href="{{ route('user.shop') }}">Outdoor Dining</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('user.shop') }}">
                                <i class="w-icon-heartbeat"></i>Healthy & Beauty
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user.shop') }}">
                                <i class="w-icon-gift"></i>Gift Ideas
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user.shop') }}">
                                <i class="w-icon-gamepad"></i>Toy & Games
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user.shop') }}">
                                <i class="w-icon-ice-cream"></i>Cooking
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user.shop') }}">
                                <i class="w-icon-ios"></i>Smart Phones
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user.shop') }}">
                                <i class="w-icon-camera"></i>Cameras & Photo
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user.shop') }}">
                                <i class="w-icon-ruby"></i>Accessories
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user.shop') }}ml"
                                class="font-weight-bold text-primary text-uppercase ls-25">
                                View All Categories<i class="w-icon-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Mobile Menu -->

    <!-- Start of Quick View -->
    <div class="product product-single product-popup">
        <div class="row gutter-lg">
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="product-gallery product-gallery-sticky mb-0">
                    <div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1 gutter-no">
                        <figure class="product-image">
                            <img src="{{ asset('assets/user/images/products/popup/1-440x494.jpg') }}"
                                data-zoom-image="{{ asset('assets/user/images/products/popup/1-800x900.jpg') }}"
                                alt="Water Boil Black Utensil" width="800" height="900">
                        </figure>
                        <figure class="product-image">
                            <img src="{{ asset('assets/user/images/products/popup/2-440x494.jpg') }}"
                                data-zoom-image="{{ asset('assets/user/images/products/popup/2-800x900.jpg') }}"
                                alt="Water Boil Black Utensil" width="800" height="900">
                        </figure>
                        <figure class="product-image">
                            <img src="{{ asset('assets/user/images/products/popup/3-440x494.jpg') }}"
                                data-zoom-image="{{ asset('assets/user/images/products/popup/3-800x900.jpg') }}"
                                alt="Water Boil Black Utensil" width="800" height="900">
                        </figure>
                        <figure class="product-image">
                            <img src="{{ asset('assets/user/images/products/popup/4-440x494.jpg') }}"
                                data-zoom-image="{{ asset('assets/user/images/products/popup/4-800x900.jpg') }}"
                                alt="Water Boil Black Utensil" width="800" height="900">
                        </figure>
                    </div>
                    <div class="product-thumbs-wrap">
                        <div class="product-thumbs">
                            <div class="product-thumb active">
                                <img src="{{ asset('assets/user/images/products/popup/1-103x116.jpg') }}"
                                    alt="Product Thumb" width="103" height="116">
                            </div>
                            <div class="product-thumb">
                                <img src="{{ asset('assets/user/images/products/popup/2-103x116.jpg') }}"
                                    alt="Product Thumb" width="103" height="116">
                            </div>
                            <div class="product-thumb">
                                <img src="{{ asset('assets/user/images/products/popup/3-103x116.jpg') }}"
                                    alt="Product Thumb" width="103" height="116">
                            </div>
                            <div class="product-thumb">
                                <img src="{{ asset('assets/user/images/products/popup/4-103x116.jpg') }}"
                                    alt="Product Thumb" width="103" height="116">
                            </div>
                        </div>
                        <button class="thumb-up disabled"><i class="w-icon-angle-left"></i></button>
                        <button class="thumb-down disabled"><i class="w-icon-angle-right"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 overflow-hidden p-relative">
                <div class="product-details scrollable pl-0">
                    <h2 class="product-title">Electronics Black Wrist Watch</h2>
                    <div class="product-bm-wrapper">
                        <figure class="brand">
                            <img src="{{ asset('assets/user/images/products/brand/brand-1.jpg') }}" alt="Brand"
                                width="102" height="48" />
                        </figure>
                        <div class="product-meta">
                            <div class="product-categories">
                                Category:
                                <span class="product-category"><a href="#">Electronics</a></span>
                            </div>
                            <div class="product-sku">
                                SKU: <span>MS46891340</span>
                            </div>
                        </div>
                    </div>

                    <hr class="product-divider">

                    <div class="product-price">$40.00</div>

                    <div class="ratings-container">
                        <div class="ratings-full">
                            <span class="ratings" style="width: 80%;"></span>
                            <span class="tooltiptext tooltip-top"></span>
                        </div>
                        <a href="#" class="rating-reviews">(3 Reviews)</a>
                    </div>

                    <div class="product-short-desc">
                        <ul class="list-type-check list-style-none">
                            <li>Ultrices eros in cursus turpis massa cursus mattis.</li>
                            <li>Volutpat ac tincidunt vitae semper quis lectus.</li>
                            <li>Aliquam id diam maecenas ultricies mi eget mauris.</li>
                        </ul>
                    </div>

                    <hr class="product-divider">

                    <div class="product-form product-variation-form product-color-swatch">
                        <label>Color:</label>
                        <div class="d-flex align-items-center product-variations">
                            <a href="#" class="color" style="background-color: #ffcc01"></a>
                            <a href="#" class="color" style="background-color: #ca6d00;"></a>
                            <a href="#" class="color" style="background-color: #1c93cb;"></a>
                            <a href="#" class="color" style="background-color: #ccc;"></a>
                            <a href="#" class="color" style="background-color: #333;"></a>
                        </div>
                    </div>
                    <div class="product-form product-variation-form product-size-swatch">
                        <label class="mb-1">Size:</label>
                        <div class="flex-wrap d-flex align-items-center product-variations">
                            <a href="#" class="size">Small</a>
                            <a href="#" class="size">Medium</a>
                            <a href="#" class="size">Large</a>
                            <a href="#" class="size">Extra Large</a>
                        </div>
                        <a href="#" class="product-variation-clean">Clean All</a>
                    </div>

                    <div class="product-variation-price">
                        <span></span>
                    </div>

                    <div class="product-form">
                        <div class="product-qty-form">
                            <div class="input-group">
                                <input class="quantity form-control" type="number" min="1" max="10000000">
                                <button class="quantity-plus w-icon-plus"></button>
                                <button class="quantity-minus w-icon-minus"></button>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-cart">
                            <i class="w-icon-cart"></i>
                            <span>Add to Cart</span>
                        </button>
                    </div>

                    <div class="social-links-wrapper">
                        <div class="social-links">
                            <div class="social-icons social-no-color border-thin">
                                <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                                <a href="#" class="social-icon social-youtube w-icon-youtube"></a>
                                <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a>
                            </div>
                        </div>
                        <span class="divider d-xs-show"></span>
                        <div class="product-link-wrapper d-flex">
                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"></a>
                            <a href="#" class="btn-product-icon btn-compare btn-icon-left w-icon-compare"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Quick view -->

    @include('user.layouts.partials.scripts')
</body>

</html>
