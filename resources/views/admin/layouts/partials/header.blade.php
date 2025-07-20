<header class="main-nav">
    <nav>
        <div class="main-navbar">
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>

                    <li class="dropdown"><a
                            class="nav-link menu-title link-nav"{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                            href="{{ route('admin.dashboard') }}">
                            <i data-feather="home"></i><span>Dashboard</span>
                        </a>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title link-nav"
                            {{ request()->routeIs('admin.admins.*') ? 'active' : '' }}"
                            href="{{ route('admin.admins.index') }}">
                            <i data-feather="users"></i><span>Admins</span>
                        </a>
                    </li>
                    <li class="dropdown"><a
                            class="nav-link menu-title link-nav"{{ request()->routeIs('admin.users.*') ? 'active' : '' }}"
                            href="{{ route('admin.users.index') }}">
                            <i data-feather="user"></i><span>Users</span>
                        </a>
                    </li>

                    <li class="dropdown"><a class="nav-link menu-title link-nav"
                            {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}"
                            href="{{ route('admin.orders.index') }}">
                            <i data-feather="shopping-cart"></i><span>Orders</span>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="package"></i><span>Manage Products</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('admin.products.index') }}">Products</a></li>
                            <li><a href="{{ route('admin.attributes.index') }}">Product Variants</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="layers"></i><span>Categories</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('admin.categories.index') }}">Categories</a></li>
                            <li><a href="{{ route('admin.sub_categories.index') }}">Sub Categories</a></li>
                            <li><a href="{{ route('admin.sub_category_items.index') }}">Sub Category Items</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title link-nav"
                            href="{{ route('admin.reviews.index') }}"><i
                                data-feather="star"></i><span>Reviews</span></a></li>

                  
                    <li class="dropdown"><a class="nav-link menu-title link-nav"
                            href="{{ route('admin.vendors.index') }}"><i
                                data-feather="briefcase"></i><span>Vendors</span></a></li>
                    <li class="dropdown"><a class="nav-link menu-title link-nav"
                            href="{{ route('admin.wishlists.index') }}"><i
                                data-feather="heart"></i><span>Wishlists</span></a></li>
                    <li class="dropdown"><a class="nav-link menu-title link-nav"
                            href="{{ route('admin.blogs.index') }}"><i
                                data-feather="book-open"></i><span>Blogs</span></a></li>
                    <li class="dropdown"><a class="nav-link menu-title link-nav"
                            href="{{ route('admin.pages.index') }}"><i
                                data-feather="file-text"></i><span>Pages</span></a></li>
                    <li class="dropdown"><a class="nav-link menu-title link-nav"
                            href="{{ route('admin.sliders.index') }}"><i
                                data-feather="sliders"></i><span>Sliders</span></a></li>
             
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="map-pin"></i><span>Locations</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('admin.countries.index') }}">Countries</a></li>
                            <li><a href="{{ route('admin.states.index') }}">States</a></li>
                            <li><a href="{{ route('admin.cities.index') }}">Cities</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>
