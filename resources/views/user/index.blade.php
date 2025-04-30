@extends('user.layouts.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/user/css/demo1.min.css') }}">
@endsection
@section('content')
    <main class="main">
        <section class="intro-section">
            <div class="owl-carousel owl-theme owl-nav-inner owl-dot-inner owl-nav-lg animation-slider gutter-no row cols-1">
                @foreach ($sliders as $slide)
                    <div class="banner banner-fixed intro-slide intro-slide{{ $slide->id }}"
                        style="background-image: url('{{ asset($slide->bg_image) }}'); background-color: {{ $slide->bg_color ?? '#ffffff' }};">
                        <div class="container">
                            <figure class="slide-image skrollable slide-animate">
                                <img src="{{ asset($slide->main_image) }}" alt="Banner"
                                    data-bottom-top="transform: translateY(10vh);"
                                    data-top-bottom="transform: translateY(-10vh);" width="474" height="397">
                            </figure>
                            <div class="banner-content y-50 text-right">
                                <h5 class="banner-subtitle font-weight-normal text-default ls-50 lh-1 mb-2 slide-animate"
                                    data-animation-options="{
                                'name': 'fadeInRightShorter',
                                'duration': '1s',
                                'delay': '.2s'
                            }">
                                    {!! $slide->subtitle !!}
                                </h5>
                                <h3 class="banner-title font-weight-bolder ls-25 lh-1 slide-animate"
                                    data-animation-options="{
                                'name': 'fadeInRightShorter',
                                'duration': '1s',
                                'delay': '.4s'
                            }">
                                    {!! $slide->title !!}
                                </h3>
                                {!! $slide->description !!}


                                @if ($slide->button_link)
                                    <a href="{{ $slide->button_link }}"
                                        class="btn btn-dark btn-outline btn-rounded btn-icon-right slide-animate"
                                        data-animation-options="{
                                'name': 'fadeInRightShorter',
                                'duration': '1s',
                                'delay': '.8s'
                            }">{{ $slide->button_text }}<i
                                            class="w-icon-long-arrow-right"></i></a>
                                @endif
                            </div>
                            <!-- End of .banner-content -->
                        </div>
                        <!-- End of .container -->
                    </div>
                    <!-- End of .intro-slide1 -->
                @endforeach

            </div>
            <!-- End of .owl-carousel -->
        </section>

        <!-- End of .intro-section -->

        <div class="container">
            <div class="owl-carousel owl-theme row cols-md-4 cols-sm-3 cols-1icon-box-wrapper appear-animate br-sm mt-6 mb-6"
                data-owl-options="{
            'nav': false,
            'dots': false,
            'loop': false,
            'responsive': {
                '0': {
                    'items': 1
                },
                '576': {
                    'items': 2
                },
                '768': {
                    'items': 3
                },
                '992': {
                    'items': 3
                },
                '1200': {
                    'items': 4
                }
            }
        }">
                <div class="icon-box icon-box-side icon-box-primary">
                    <span class="icon-box-icon icon-shipping">
                        <i class="w-icon-truck"></i>
                    </span>
                    <div class="icon-box-content">
                        <h4 class="icon-box-title font-weight-bold mb-1">Free Shipping & Returns</h4>
                        <p class="text-default">For all orders over $99</p>
                    </div>
                </div>
                <div class="icon-box icon-box-side icon-box-primary">
                    <span class="icon-box-icon icon-payment">
                        <i class="w-icon-bag"></i>
                    </span>
                    <div class="icon-box-content">
                        <h4 class="icon-box-title font-weight-bold mb-1">Secure Payment</h4>
                        <p class="text-default">We ensure secure payment</p>
                    </div>
                </div>
                <div class="icon-box icon-box-side icon-box-primary icon-box-money">
                    <span class="icon-box-icon icon-money">
                        <i class="w-icon-money"></i>
                    </span>
                    <div class="icon-box-content">
                        <h4 class="icon-box-title font-weight-bold mb-1">Money Back Guarantee</h4>
                        <p class="text-default">Any back within 30 days</p>
                    </div>
                </div>
                <div class="icon-box icon-box-side icon-box-primary icon-box-chat">
                    <span class="icon-box-icon icon-chat">
                        <i class="w-icon-chat"></i>
                    </span>
                    <div class="icon-box-content">
                        <h4 class="icon-box-title font-weight-bold mb-1">Customer Support</h4>
                        <p class="text-default">Call or email us 24/7</p>
                    </div>
                </div>
            </div>
            <!-- End of Iocn Box Wrapper -->

            <div class="row category-banner-wrapper appear-animate pt-6 pb-8">
                <div class="col-md-6 mb-4">
                    <div class="banner banner-fixed br-xs">
                        <figure>
                            <img src="{{ asset('assets/user/images/demos/demo1/categories/1-1.jpg') }}"
                                alt="Category Banner" width="610" height="160" style="background-color: #ecedec;" />
                        </figure>
                        <div class="banner-content y-50 mt-0">
                            <h5 class="banner-subtitle font-weight-normal text-dark">Get up to <span
                                    class="text-secondary font-weight-bolder text-uppercase ls-25">20% Off</span>
                            </h5>
                            <h3 class="banner-title text-uppercase">Sports Outfits<br><span
                                    class="font-weight-normal                       text-capitalize">Collection</span>
                            </h3>
                            <div class="banner-price-info font-weight-normal">Starting at <span
                                    class="text-secondary                       font-weight-bolder">$170.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="banner banner-fixed br-xs">
                        <figure>
                            <img src="{{ asset('assets/user/images/demos/demo1/categories/1-2.jpg') }}"
                                alt="Category Banner" width="610" height="160" style="background-color: #636363;" />
                        </figure>
                        <div class="banner-content y-50 mt-0">
                            <h5 class="banner-subtitle font-weight-normal text-capitalize">New Arrivals</h5>
                            <h3 class="banner-title text-white text-uppercase">Accessories<br><span
                                    class="font-weight-normal text-capitalize">Collection</span></h3>
                            <div class="banner-price-info text-white font-weight-normal text-capitalize">Only From
                                <span class="text-secondary font-weight-bolder">$90.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Category Banner Wrapper -->

            <!-- End of Deals Wrapper -->
        </div>

        <section class="category-section top-category bg-grey pt-10 pb-10 appear-animate">
            <div class="container pb-2">
                <h2 class="title justify-content-center pt-1 ls-normal mb-5">Top Categories Of The Month</h2>
                <div class="owl-carousel owl-theme row cols-lg-6 cols-md-5 cols-sm-3 cols-2 category-carousel">
                    @foreach ($categories as $category)
                        <div class="category category-classic category-absolute overlay-zoom br-xs">
                            <a href="{{ route('user.shop', ['category' => $category->slug]) }}" class="category-media">
                                <img src="{{ $category->image_url ?? asset('assets/user/images/demos/demo1/categories/2-1.jpg') }}"
                                    alt="{{ $category->name }}" width="130" height="130">
                            </a>
                            <div class="category-content">
                                <h4 class="category-name">{{ $category->name }}</h4>
                                <a href="{{ route('user.shop', ['category' => $category->slug]) }}"
                                    class="btn btn-primary btn-link btn-underline">Shop Now</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- End of .category-section top-category -->

        <div class="container">
            <h2 class="title justify-content-center ls-normal mb-4 mt-10 pt-1 appear-animate">Popular Departments</h2>
            <div class="tab tab-nav-boxed tab-nav-outline appear-animate">
                <ul class="nav nav-tabs justify-content-center" role="tablist">
                    <li class="nav-item mr-2 mb-2">
                        <a class="nav-link active br-sm font-size-md ls-normal" href="#tab-new-arrivals">New Arrivals</a>
                    </li>
                    <li class="nav-item mr-2 mb-2">
                        <a class="nav-link br-sm font-size-md ls-normal" href="#tab-best-seller">Best Seller</a>
                    </li>
                    <li class="nav-item mr-2 mb-2">
                        <a class="nav-link br-sm font-size-md ls-normal" href="#tab-most-popular">Most Popular</a>
                    </li>
                    <li class="nav-item mr-0 mb-2">
                        <a class="nav-link br-sm font-size-md ls-normal" href="#tab-featured">Featured</a>
                    </li>
                </ul>
            </div>

            <div class="tab-content product-wrapper appear-animate">
                <!-- New Arrivals Tab -->
                <div class="tab-pane active pt-4" id="tab-new-arrivals">
                    <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
                        @foreach ($newArrivals as $product)
                            @include('user.products.product-item', ['product' => $product])
                        @endforeach
                    </div>
                </div>

                <!-- Best Seller Tab -->
                <div class="tab-pane pt-4" id="tab-best-seller">
                    <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
                        @foreach ($bestSellers as $product)
                            @include('user.products.product-item', ['product' => $product])
                        @endforeach
                    </div>
                </div>

                <!-- Most Popular Tab -->
                <div class="tab-pane pt-4" id="tab-most-popular">
                    <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
                        @foreach ($mostPopular as $product)
                            @include('user.products.product-item', ['product' => $product])
                        @endforeach
                    </div>
                </div>

                <!-- Featured Tab -->
                <div class="tab-pane pt-4" id="tab-featured">
                    <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
                        @foreach ($featuredProducts as $product)
                            @include('user.products.product-item', ['product' => $product])
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Tab Content -->

        <div class="banner banner-fashion appear-animate br-sm mb-9"
            style="background-image: url({{ asset('assets/user/images/demos/demo1/banners/4.jpg') }});background-color: #383839;">
            <div class="banner-content align-items-center">
                <div class="content-left d-flex align-items-center mb-3">
                    <div class="banner-price-info font-weight-bolder text-secondary text-uppercase lh-1 ls-25">
                        25
                        <sup class="font-weight-bold">%</sup><sub class="font-weight-bold ls-25">Off</sub>
                    </div>
                    <hr class="banner-divider bg-white mt-0 mb-0 mr-8">
                </div>
                <div class="content-right d-flex align-items-center flex-1 flex-wrap">
                    <div class="banner-info mb-0 mr-auto pr-4 mb-3">
                        <h3 class="banner-title text-white font-weight-bolder text-uppercase ls-25">For
                            Today's
                            Fashion</h3>
                        <p class="text-white mb-0">Use code
                            <span class="text-dark bg-white font-weight-bold ls-50 pl-1 pr-1 d-inline-block">Black
                                <strong>12345</strong></span> to get best offer.
                        </p>
                    </div>
                    <a href="{{ route('user.shop') }}"
                        class="btn btn-white btn-outline btn-rounded btn-icon-right mb-3">Shop Now<i
                            class="w-icon-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <!-- End of Banner Fashion -->





        <h2 class="title title-underline mb-4 ls-normal appear-animate">Your Recent Views</h2>
        <div class="owl-carousel owl-theme owl-shadow-carousel appear-animate row cols-xl-8 cols-lg-6 cols-md-4 cols-2 pb-2 mb-10"
            data-owl-options="{
            'nav': false,
            'dots': true,
            'margin': 20,
            'responsive': {
                '0': {
                    'items': 2
                },
                '576': {
                    'items': 3
                },
                '768': {
                    'items': 5
                },
                '992': {
                    'items': 6
                },
                '1200': {
                    'items': 8,
                    'dots': false
                }
            }
        }">
            <div class="product-wrap mb-0">
                <div class="product text-center product-absolute">
                    <figure class="product-media">
                        <a
                            href="product-defa{{ route('user.product.detail', ['slug' => 'electronics-black-wrist-watch']) }}">
                            <img src="{{ asset('assets/user/images/demos/demo1/products/7-1.jpg') }}"
                                alt="Category image" width="130" height="146" style="background-color: #fff" />
                        </a>
                    </figure>
                    <h4 class="product-name">
                        <a href="{{ route('user.product.detail', ['slug' => 'electronics-black-wrist-watch']) }}">Women's
                            Fashion Handbag</a>
                    </h4>
                </div>
            </div>
            <!-- End of Product Wrap -->
            <div class="product-wrap mb-0">
                <div class="product text-center product-absolute">
                    <figure class="product-media">
                        <a
                            href="product-defa{{ route('user.product.detail', ['slug' => 'electronics-black-wrist-watch']) }}">
                            <img src="{{ asset('assets/user/images/demos/demo1/products/7-2.jpg') }}"
                                alt="Category image" width="130" height="146" style="background-color: #fff" />
                        </a>
                    </figure>
                    <h4 class="product-name">
                        <a href="{{ route('user.product.detail', ['slug' => 'electronics-black-wrist-watch']) }}">Electric
                            Frying Pan</a>
                    </h4>
                </div>
            </div>
            <!-- End of Product Wrap -->
            <div class="product-wrap mb-0">
                <div class="product text-center product-absolute">
                    <figure class="product-media">
                        <a
                            href="product-defa{{ route('user.product.detail', ['slug' => 'electronics-black-wrist-watch']) }}">
                            <img src="{{ asset('assets/user/images/demos/demo1/products/7-3.jpg') }}"
                                alt="Category image" width="130" height="146" style="background-color: #fff" />
                        </a>
                    </figure>
                    <h4 class="product-name">
                        <a href="{{ route('user.product.detail', ['slug' => 'electronics-black-wrist-watch']) }}">Black
                            Winter Skating</a>
                    </h4>
                </div>
            </div>
            <!-- End of Product Wrap -->
            <div class="product-wrap mb-0">
                <div class="product text-center product-absolute">
                    <figure class="product-media">
                        <a
                            href="product-defa{{ route('user.product.detail', ['slug' => 'electronics-black-wrist-watch']) }}">
                            <img src="{{ asset('assets/user/images/demos/demo1/products/7-4.jpg') }}"
                                alt="Category image" width="130" height="146" style="background-color: #fff" />
                        </a>
                    </figure>
                    <h4 class="product-name">
                        <a href="{{ route('user.product.detail', ['slug' => 'electronics-black-wrist-watch']) }}">HD
                            Television</a>
                    </h4>
                </div>
            </div>
            <!-- End of Product Wrap -->
            <div class="product-wrap mb-0">
                <div class="product text-center product-absolute">
                    <figure class="product-media">
                        <a
                            href="product-defa{{ route('user.product.detail', ['slug' => 'electronics-black-wrist-watch']) }}">
                            <img src="{{ asset('assets/user/images/demos/demo1/products/7-5.jpg') }}"
                                alt="Category image" width="130" height="146" style="background-color: #fff" />
                        </a>
                    </figure>
                    <h4 class="product-name">
                        <a href="{{ route('user.product.detail', ['slug' => 'electronics-black-wrist-watch']) }}">Home
                            Sofa</a>
                    </h4>
                </div>
            </div>
            <!-- End of Product Wrap -->
            <div class="product-wrap mb-0">
                <div class="product text-center product-absolute">
                    <figure class="product-media">
                        <a
                            href="product-defa{{ route('user.product.detail', ['slug' => 'electronics-black-wrist-watch']) }}">
                            <img src="{{ asset('assets/user/images/demos/demo1/products/7-6.jpg') }}"
                                alt="Category image" width="130" height="146" style="background-color: #fff" />
                        </a>
                    </figure>
                    <h4 class="product-name">
                        <a href="{{ route('user.product.detail', ['slug' => 'electronics-black-wrist-watch']) }}">USB
                            Receipt</a>
                    </h4>
                </div>
            </div>
            <!-- End of Product Wrap -->
            <div class="product-wrap mb-0">
                <div class="product text-center product-absolute">
                    <figure class="product-media">
                        <a
                            href="product-defa{{ route('user.product.detail', ['slug' => 'electronics-black-wrist-watch']) }}">
                            <img src="{{ asset('assets/user/images/demos/demo1/products/7-7.jpg') }}"
                                alt="Category image" width="130" height="146" style="background-color: #fff" />
                        </a>
                    </figure>
                    <h4 class="product-name">
                        <a href="{{ route('user.product.detail', ['slug' => 'electronics-black-wrist-watch']) }}">Electric
                            Rice-Cooker</a>
                    </h4>
                </div>
            </div>
            <!-- End of Product Wrap -->
            <div class="product-wrap mb-0">
                <div class="product text-center product-absolute">
                    <figure class="product-media">
                        <a
                            href="product-defa{{ route('user.product.detail', ['slug' => 'electronics-black-wrist-watch']) }}">
                            <img src="{{ asset('assets/user/images/demos/demo1/products/7-8.jpg') }}"
                                alt="Category image" width="130" height="146" style="background-color: #fff" />
                        </a>
                    </figure>
                    <h4 class="product-name">
                        <a href="{{ route('user.product.detail', ['slug' => 'electronics-black-wrist-watch']) }}">Table
                            Lamp</a>
                    </h4>
                </div>
            </div>
            <!-- End of Product Wrap -->
        </div>
        <!-- End of Reviewed Producs -->
        </div>
        <!--End of Catainer -->
    </main>
@endsection

@section('script')
    <script>
        $('.custom-carousel').owlCarousel({
            nav: false,
            dots: true,
            items: 1,
            responsive: {
                1600: {
                    nav: true,
                    dots: false
                }
            }
        });

        $('.category-carousel').owlCarousel({
            'nav': false,
            'dots': false,
            'margin': 20,
            'responsive': {
                '0': {
                    'items': 2
                },
                '576': {
                    'items': 3
                },
                '768': {
                    'items': 5
                },
                '992': {
                    'items': 6
                }
            }
        });
    </script>
@endsection
