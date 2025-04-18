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
                        <a class="active nav-link menu-title {{ request()->routeIs('admin.agents.*') ? 'active' : '' }}"
                            href="{{ route('admin.agents.index') }}">
                            <i data-feather="user-check"></i><span>Agents</span>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a class="active nav-link menu-title {{ request()->routeIs('admin.tours.*') ? 'active' : '' }}"
                            href="{{ route('admin.tours.index') }}">
                            <i data-feather="map"></i><span>Tours</span>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a class="active nav-link menu-title {{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}"
                            href="{{ route('admin.bookings.index') }}">
                            <i data-feather="calendar"></i><span>Bookings</span>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a class="active nav-link menu-title {{ request()->routeIs('admin.transactions.*') ? 'active' : '' }}"
                            href="{{ route('admin.transactions.index') }}">
                            <i data-feather="credit-card"></i><span>Transactions</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="active nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="bar-chart-2"></i><span>Reporting</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li>
                                <a class="submenu-title" href="javascript:void(0)">Color Version<span class="sub-arrow">
                                        <i class="fa fa-chevron-right"></i></span>
                                </a>
                                <ul class="nav-sub-childmenu submenu-content">
                                    <li><a href="#">Reporting</a></li>
                                    <li><a href="#">Reporting</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
