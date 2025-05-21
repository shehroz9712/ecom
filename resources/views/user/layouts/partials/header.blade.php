        <header class="header header-border">
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <p class="welcome-msg">{{ $settings->headline }}</p>
                    </div>
                    <div class="header-right">
                        <a href="{{ route('user.blog') }}" class="d-lg-show">Blog</a>
                        <a href="{{ route('user.contact') }}" class="d-lg-show">Contact Us</a>

                        @auth
                            <a href="{{ route('user.profile') }}" class="d-lg-show">My Account</a>
                        @else
                            <a href="{{ route('login') }}" class="d-lg-show ">
                                <i class="w-icon-account"></i>Sign In
                            </a>
                            <span class="delimiter d-lg-show">/</span>
                            <a href="{{ route('login') }}" class="ml-0 d-lg-show  s">Register</a>
                        @endauth
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
                        <form method="get" action="{{ route('user.shop') }}"
                            class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">

                            <div class="select-box">
                                <select id="category" name="category">
                                    <option value="">All Categories</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->slug }}"
                                            {{ request('category') == $category->slug ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <input type="text" class="form-control" name="search" id="search"
                                value="{{ request('search') }}" placeholder="Search in..."  />

                            <button class="btn btn-search" type="submit"
                                style="border-bottom-left-radius: unset!important;border-top-left-radius: unset!important;">
                                <i class="w-icon-search"></i>
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
                        {{-- <a class="compare label-down link d-xs-show" href="{{ route('user.compare') }}">
                            <i class="w-icon-compare"></i>
                            <span class="compare-label d-lg-show">Compare</span>
                        </a> --}}
                        <div id="header-cart">
                            @include('partials.header-cart', [
                                'carts' => $headerCarts,
                                'cartCount' => $headerCartCount,
                                'cartSubtotal' => $headerCartSubtotal,
                            ])
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
                                        <a href="{{ route('user.shop') }}">Shop</a>

                                        <!-- Start of Megamenu -->

                                        <!-- End of Megamenu -->
                                    </li>
                                    <li>
                                        <a href="{{ route('user.vendors.index') }}">Vendor</a>

                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="header-right">
                            <a href="{{ route('user.order.track') }}" class="d-xl-show"><i
                                    class="w-icon-map-marker mr-1"></i>Track Order</a>
                            <a href="{{ route('user.daily.deals') }}"><i class="w-icon-sale"></i>Daily Deals</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
