        <header class="header">
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <p class="welcome-msg">{{ $settings->headline }}</p>
                    </div>
                    <div class="header-right">
                        <a href="{{ route('user.blog') }}" class="d-lg-show">Blog</a>
                        <a href="{{ route('user.contact') }}" class="d-lg-show">Contact Us</a>
                        <a href="{{ route('user.profile') }}" class="d-lg-show">My Account</a>
                        <a href="{{ asset('assets/user/ajax/login.html') }}" class="d-lg-show login sign-in"><i
                                class="w-icon-account"></i>Sign In</a>
                        <span class="delimiter d-lg-show">/</span>
                        <a href="{{ asset('assets/user/ajax/login.html') }}"
                            class="ml-0 d-lg-show login register">Register</a>
                    </div>
                </div>
            </div>
            <!-- End of Header Top -->

            <div class="header-middle">
                <div class="container">
                    <div class="header-left mr-md-4">
                        <a href="#" class="mobile-menu-toggle  w-icon-hamburger">
                        </a>
                        <a href="{{ route('user.home') }}" class="logo ml-lg-0">
                            <img src="{{ asset('assets/user/images/logo.png') }}" alt="logo" width="144"
                                height="45" />
                        </a>
                        <form method="get" action="#"
                            class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
                            <div class="select-box">
                                <select id="category" name="category">
                                    <option value="">All Categories</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->slug }}">{{ $category->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <input type="text" class="form-control" name="search" id="search"
                                placeholder="Search in..." required />
                            <button class="btn btn-search" type="submit"><i class="w-icon-search"></i>
                            </button>
                        </form>
                    </div>
                    <div class="header-right ml-4">
                        <div class="header-call d-xs-show d-lg-flex align-items-center">
                            <a href="tel:#" class="w-icon-call"></a>
                            <div class="call-info d-lg-show">
                                <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                                    <a href="mailto:#" class="text-capitalize">Live Chat</a> or :
                                </h4>
                                <a href="tel:#" class="phone-number font-weight-bolder ls-50">0(800)123-456</a>
                            </div>
                        </div>
                        <a class="wishlist label-down link d-xs-show" href="{{ route('user.wishlist') }}">
                            <i class="w-icon-heart"></i>
                            <span class="wishlist-label d-lg-show">Wishlist</span>
                        </a>
                        <a class="compare label-down link d-xs-show" href="{{ route('user.compare') }}">
                            <i class="w-icon-compare"></i>
                            <span class="compare-label d-lg-show">Compare</span>
                        </a>
                        <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
                            <div class="cart-overlay"></div>
                            <a href="#" class="cart-toggle label-down link">
                                <i class="w-icon-cart">
                                    <span class="cart-count">2</span>
                                </i>
                                <span class="cart-label">Cart</span>
                            </a>
                            <div class="dropdown-box">
                                <div class="cart-header">
                                    <span>Shopping Cart</span>
                                    <a href="#" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
                                </div>

                                <div class="products">
                                    @for ($product = 0; $product < 3; $product++)
                                        <div class="product product-cart">
                                            <div class="product-detail">
                                                <a href="{{ route('user.product.detail', $product) }}"
                                                    class="product-name">
                                                    Beige knitted elas<br>tic runner shoes
                                                </a>
                                                <div class="price-box">
                                                    <span class="product-quantity">1</span>
                                                    <span class="product-price">$25.68</span>
                                                </div>
                                            </div>
                                            <figure class="product-media">
                                                <a href="{{ route('user.product.detail', $product) }}">
                                                    <img src="{{ asset('assets/user/images/cart/product-1.jpg') }}"
                                                        alt="product" height="84" width="94" />
                                                </a>
                                            </figure>
                                            <button class="btn btn-link btn-close">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    @endfor


                                </div>

                                <div class="cart-total">
                                    <label>Subtotal:</label>
                                    <span class="price">$58.67</span>
                                </div>

                                <div class="cart-action">
                                    <a href="{{ route('user.cart') }}"
                                        class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                                    <a href="{{ route('user.checkout') }}"
                                        class="btn btn-primary  btn-rounded">Checkout</a>
                                </div>
                            </div>
                            <!-- End of Dropdown Box -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Header Middle -->

            <div class="header-bottom sticky-content fix-top sticky-header has-dropdown">
                <div class="container">
                    <div class="inner-wrap">
                        <div class="header-left">
                            <div class="dropdown category-dropdown has-border" data-visible="true">
                                <a href="#" class="category-toggle text-dark" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"
                                    data-display="static" title="Browse Categories">
                                    <i class="w-icon-category"></i>
                                    <span>Browse Categories</span>
                                </a>
                                <div class="dropdown-box">
                                    <ul class="category-menu menu vertical-menu">
                                        @foreach ($categories as $category)
                                            <li>
                                                <a href="{{ route('user.shop') }}">
                                                    <i class="{{ $category->icon }}"></i>{{ $category->name }}
                                                </a>

                                                @if ($category->activeSubCategories->count())
                                                    <ul class="megamenu">
                                                        @foreach ($category->subCategories as $subCategory)
                                                            <li>
                                                                <h4 class="menu-title">{{ $subCategory->name }}</h4>
                                                                <hr class="divider">
                                                                <ul>
                                                                    @foreach ($subCategory->activeItems as $item)
                                                                        <li>
                                                                            <a
                                                                                href="{{ route('user.shop', ['category' => $item->slug]) }}">{{ $item->name }}</a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                            <nav class="main-nav">
                                <ul class="menu active-underline">
                                    <li class="active">
                                        <a href="{{ route('user.home') }}">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.shop') }}ml">Shop</a>

                                        <!-- Start of Megamenu -->

                                        <!-- End of Megamenu -->
                                    </li>
                                    <li>
                                        <a href="{{ route('user.vendor') }}">Vendor</a>

                                    </li>
                                    <li>
                                        <a href="{{ route('user.blog') }}">Blog</a>

                                    </li>
                                    <li>
                                        <a href="{{ route('user.about') }}">Pages</a>

                                    </li>

                                </ul>
                            </nav>
                        </div>
                        <div class="header-right">
                            <a href="#" class="d-xl-show"><i class="w-icon-map-marker mr-1"></i>Track Order</a>
                            <a href="#"><i class="w-icon-sale"></i>Daily Deals</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>