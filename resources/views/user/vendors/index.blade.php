@extends('user.layouts.app')
@section('content')
    <main class="main mt-3">
        <!-- Start of Breadcrumb -->

        <!-- End of Breadcrumb -->

        <!-- Start of Pgae Contetn -->
        <div class="page-content mb-8">
            <div class="container">
                <div class="row gutter-lg">
                    <!-- Sidebar Filters -->
                    <aside class="sidebar vendor-sidebar sticky-sidebar-wrapper left-sidebar sidebar-fixed">
                        <div class="sidebar-overlay"></div>
                        <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                        <a href="#" class="sidebar-toggle"><i class="fas fa-chevron-right"></i></a>

                        <form method="GET" action="{{ route('user.vendors.index') }}" id="vendor-filter-form">
                            <div class="sidebar-content">
                                <div class="sticky-sidebar">
                                    <!-- Search -->
                                    <div class="widget widget-search-form">
                                        <div class="widget-body">
                                            <div class="input-wrapper input-wrapper-inline">
                                                <input type="text" name="search" class="form-control"
                                                    placeholder="Search vendors..." value="{{ request('search') }}">
                                                <button type="submit" class="btn btn-search"><i
                                                        class="w-icon-search"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Category Filter -->
                                    <div class="widget widget-filter">
                                        <h4 class="widget-title">Filter By Category</h4>
                                        <div class="widget-body">
                                            <select name="category" class="form-control" onchange="this.form.submit()">
                                                <option value="">All Categories</option>
                                                <option value="clothing"
                                                    {{ request('category') == 'clothing' ? 'selected' : '' }}>Clothing
                                                </option>
                                                <option value="electronics"
                                                    {{ request('category') == 'electronics' ? 'selected' : '' }}>Electronics
                                                </option>
                                                <!-- Add more categories as needed -->
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Location Filter -->
                                    <div class="widget widget-filter">
                                        <h4 class="widget-title">Filter By Location</h4>
                                        <div class="widget-body">
                                            <select name="country_id" class="form-control" id="country-select"
                                                onchange="this.form.submit()">
                                                <option value="">All Countries</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}"
                                                        {{ request('country_id') == $country->id ? 'selected' : '' }}>
                                                        {{ $country->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            <select name="state_id" class="form-control mt-2" id="state-select"
                                                onchange="this.form.submit()">
                                                <option value="">All States</option>
                                                @foreach ($states as $state)
                                                    <option value="{{ $state->id }}"
                                                        {{ request('state_id') == $state->id ? 'selected' : '' }}>
                                                        {{ $state->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            <input type="text" name="city" class="form-control mt-2"
                                                placeholder="City" value="{{ request('city') }}"
                                                onchange="this.form.submit()">

                                            <input type="text" name="zip" class="form-control mt-2"
                                                placeholder="Zip Code" value="{{ request('zip') }}"
                                                onchange="this.form.submit()">
                                        </div>
                                    </div>

                                    <!-- Sorting -->
                                    <div class="widget widget-filter mt-4">
                                        <select name="sort_by" class="form-control" onchange="this.form.submit()">
                                            <option value="new-old"
                                                {{ request('sort_by', 'new-old') == 'new-old' ? 'selected' : '' }}>Newest
                                                First</option>
                                            <option value="old-new"
                                                {{ request('sort_by') == 'old-new' ? 'selected' : '' }}>Oldest First
                                            </option>
                                            <option value="a-z" {{ request('sort_by') == 'a-z' ? 'selected' : '' }}>A to
                                                Z</option>
                                            <option value="z-a" {{ request('sort_by') == 'z-a' ? 'selected' : '' }}>Z to
                                                A</option>
                                        </select>
                                    </div>

                                    <!-- Clear Filters -->
                                    <div class="mt-4">
                                        <a href="{{ route('user.vendors.index') }}" class="btn btn-secondary w-100">Clear
                                            Filters</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </aside>

                    <!-- Main Content -->
                    <div class="main-content">
                        <!-- Toolbar -->
                        <div class="toolbox wcfm-toolbox">
                            <div class="toolbox-left">
                                <form class="select-box toolbox-item">
                                    <select name="orderby" class="form-control"
                                        onchange="window.location.href=updateQueryString('sort_by', this.value)">
                                        <option value="new-old"
                                            {{ request('sort_by', 'new-old') == 'new-old' ? 'selected' : '' }}>Newest First
                                        </option>
                                        <option value="old-new" {{ request('sort_by') == 'old-new' ? 'selected' : '' }}>
                                            Oldest First</option>
                                        <option value="a-z" {{ request('sort_by') == 'a-z' ? 'selected' : '' }}>A to Z
                                        </option>
                                        <option value="z-a" {{ request('sort_by') == 'z-a' ? 'selected' : '' }}>Z to A
                                        </option>
                                    </select>
                                </form>
                            </div>
                            <div class="toolbox-right">
                                <div class="toolbox-item">
                                    <label class="showing-info">
                                        Showing {{ $vendors->firstItem() }}-{{ $vendors->lastItem() }} of
                                        {{ $vendors->total() }} vendors
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Vendor List -->
                        <div class="row cols-sm-2">
                            @forelse ($vendors as $vendor)
                                <div class="store-wrap mb-4">
                                    <div class="store store-grid store-wcfm">
                                        <div class="store-header">
                                            <figure class="store-banner">
                                                <img src="{{ asset($vendor->banner_image ?? 'assets/user/images/default-banner.jpg') }}"
                                                    alt="{{ $vendor->name }}" width="400" height="194"
                                                    style="background-color: #40475E">
                                            </figure>
                                        </div>
                                        <div class="store-content">
                                            <h4 class="store-title">
                                                <a
                                                    href="{{ route('vendor.show', $vendor->slug) }}">{{ $vendor->name }}</a>
                                            </h4>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings"
                                                        style="width: {{ $vendor->average_rating * 20 }}%;"></span>
                                                    <span class="tooltiptext tooltip-top">{{ $vendor->average_rating }}
                                                        out of 5</span>
                                                </div>
                                            </div>
                                            <ul class="seller-info-list list-style-none">
                                                <li class="store-email">
                                                    <a href="mailto:{{ $vendor->email }}">
                                                        <i class="far fa-envelope"></i>
                                                        {{ $vendor->email }}
                                                    </a>
                                                </li>
                                                <li class="store-phone">
                                                    <a href="tel:{{ $vendor->phone }}">
                                                        <i class="w-icon-phone"></i>
                                                        {{ $vendor->phone }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="store-footer">
                                            <figure class="seller-brand">
                                                <img src="{{ asset($vendor->brand_logo ?? 'assets/user/images/default-brand.jpg') }}"
                                                    alt="{{ $vendor->name }}" width="80" height="80">
                                            </figure>
                                            <a href="#" class="btn btn-inquiry btn-rounded btn-icon-left">
                                                <i class="far fa-question-circle"></i>Inquiry
                                            </a>
                                            <a href="{{ route('vendor.show', $vendor->slug) }}"
                                                class="btn btn-rounded btn-visit">Visit Store</a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center py-5">
                                    <h4>No vendors found matching your criteria</h4>
                                    <a href="{{ route('user.vendors.index') }}" class="btn btn-primary">Reset Filters</a>
                                </div>
                            @endforelse
                        </div>

                        <!-- Pagination -->
                        @if ($vendors->hasPages())
                            <div class="toolbox toolbox-pagination justify-content-between">
                                <p class="showing-info mb-2 mb-sm-0">
                                    Showing {{ $vendors->firstItem() }}-{{ $vendors->lastItem() }} of
                                    {{ $vendors->total() }} vendors
                                </p>
                                {{ $vendors->withQueryString()->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- JavaScript -->
        <script>
            // Toggle sidebar on mobile
            document.querySelector('.sidebar-toggle').addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector('.sidebar').classList.toggle('active');
                document.querySelector('.sidebar-overlay').classList.toggle('active');
            });

            // Close sidebar
            document.querySelectorAll('.sidebar-close, .sidebar-overlay').forEach(el => {
                el.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.querySelector('.sidebar').classList.remove('active');
                    document.querySelector('.sidebar-overlay').classList.remove('active');
                });
            });

            // Update query string parameter
            function updateQueryString(key, value) {
                const url = new URL(window.location.href);
                url.searchParams.set(key, value);
                return url.toString();
            }

            // Dynamic state loading based on country
            document.getElementById('country-select').addEventListener('change', function() {
                const countryId = this.value;
                const stateSelect = document.getElementById('state-select');

                if (countryId) {
                    fetch(`/api/states?country_id=${countryId}`)
                        .then(response => response.json())
                        .then(data => {
                            stateSelect.innerHTML = '<option value="">All States</option>';
                            data.forEach(state => {
                                const option = document.createElement('option');
                                option.value = state.id;
                                option.textContent = state.name;
                                stateSelect.appendChild(option);
                            });
                        });
                } else {
                    stateSelect.innerHTML = '<option value="">All States</option>';
                }
            });
        </script>

        <!-- CSS -->
        {{-- <style>
            .sidebar {
                transition: transform 0.3s ease;
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .sidebar-overlay {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 999;
                opacity: 0;
                visibility: hidden;
                transition: all 0.3s ease;
            }

            .sidebar-overlay.active {
                opacity: 1;
                visibility: visible;
            }

            .store-wrap {
                transition: all 0.3s ease;
            }

            .store-wrap:hover {
                transform: translateY(-5px);
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            }

            .btn-inquiry {
                background-color: #f3f3f3;
                color: #333;
            }

            .btn-inquiry:hover {
                background-color: #e0e0e0;
            }
        </style> --}}
        <!-- End of Page Content -->
    </main>
@endsection
