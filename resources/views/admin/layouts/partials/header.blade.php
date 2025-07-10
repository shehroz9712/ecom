<header class="main-nav">
    <nav>
        <div class="main-navbar">
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>

                    <li class="dropdown">
                        <a class="active nav-link menu-title {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                            href="{{ route('admin.dashboard') }}">
                            <i data-feather="home"></i><span>Dashboard</span>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a class=" active nav-link menu-title {{ request()->routeIs('admin.admins.*') ? 'active' : '' }}"
                            href="{{ route('admin.admins.index') }}">
                            <i data-feather="users"></i><span>Admins</span>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a class=" active nav-link menu-title {{ request()->routeIs('admin.users.*') ? 'active' : '' }}"
                            href="{{ route('admin.users.index') }}">
                            <i data-feather="users"></i><span>Users</span>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a class="active nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="bar-chart-2"></i><span>Manage Products</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('admin.products.index') }}">Products</a></li>
                            <li><a href="{{ route('admin.variants.index') }}">Product Variants</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class=" active nav-link menu-title {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}"
                            href="{{ route('admin.orders.index') }}">
                            <i data-feather="orders"></i><span>Orders</span>
                        </a>
                    </li>
                     <li class="dropdown">
                        <a class=" active nav-link menu-title {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}"
                            href="{{ route('admin.settings.index') }}">
                            <i data-feather="settings"></i><span>Settings</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
