@extends('user.layouts.app')
@section('content')
    <!-- Start of Main -->
    <main class="main">
        <!-- Start of Page Header -->
        <!-- Start of Page Content -->
        <div class="page-content">
            <div class="container">
                <!-- Start of Shop Banner -->
                <div class="shop-default-banner banner d-flex align-items-center mb-5 br-xs"
                    style="background-image: url({{ asset('assets/user/images/shop/banner1.jpg') }}); background-color: #FFC74E;">
                    <div class="banner-content">
                        <h4 class="banner-subtitle font-weight-bold">About Us</h4>
                        <h3 class="banner-title text-white text-uppercase font-weight-bolder ls-normal">About Us</h3>
                        {{-- <a href="#" class="btn btn-dark btn-rounded btn-icon-right">Discover
                            Now<i class="w-icon-long-arrow-right"></i></a> --}}
                    </div>
                </div>

                <!-- Start of Page Content -->
                <div class="container">
                    <section class="introduce mb-10 pb-10">
                        <h2 class="title title-center">
                            Orcheee — Smart, affordable household products
                        </h2>
                        <p class="mx-auto text-center">Orcheee.com is your one-stop online store for affordable household
                            products and daily home essentials. We specialize in delivering high-quality items that make
                            everyday living easier, smarter, and more affordable — especially for homemakers, students, and
                            smart budget shoppers.</p>
                        <figure class="br-lg">
                            <img src="{{ asset('assets/user/images/pages/about_us/1.jpg') }}" alt="Banner" width="1240"
                                height="540" style="background-color: #D0C1AE;" />
                        </figure>
                    </section>

                    <section class="customer-service mb-7">
                        <div class="row align-items-center">
                            <div class="col-md-6 pr-lg-8 mb-8">
                                <h2 class="title text-left">Why choose Orcheee?</h2>

                                <p>At Orcheee, we understand the importance of a well-managed home. That’s why we offer a
                                    curated
                                    range of kitchen tools, cleaning supplies, storage solutions, and more — all at
                                    competitive
                                    prices. Our mission is to provide trusted household products online that combine
                                    quality,
                                    utility, and value.</p>

                                <ul class="mb-4">
                                    <li>🏠 Wide range of home &amp; kitchen essentials</li>
                                    <li>💸 Regular discounts and sales</li>
                                    <li>🚚 Fast &amp; reliable delivery</li>
                                    <li>🤝 100% customer satisfaction focus</li>
                                </ul>

                                <div class="accordion accordion-simple accordion-plus">
                                    <div class="card border-no">
                                        <div class="card-header">
                                            <a href="#collapse3-1" class="collapse">Customer Service</a>
                                        </div>
                                        <div class="card-body expanded" id="collapse3-1">
                                            <p class="mb-0">
                                                Our support team focuses on quick, practical help — from order questions to
                                                returns. We treat every customer like family and solve problems until you’re
                                                satisfied.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="#collapse3-2" class="expand">Fast & Reliable Delivery</a>
                                        </div>
                                        <div class="card-body collapsed" id="collapse3-2">
                                            <p class="mb-0">
                                                We partner with trusted couriers to deliver your essentials quickly and
                                                safely,
                                                with tracking and clear communication at every step.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="#collapse3-3" class="expand">Quality & Value</a>
                                        </div>
                                        <div class="card-body collapsed" id="collapse3-3">
                                            <p class="mb-0">
                                                We hand-pick products that balance usefulness and price. Regular quality
                                                checks
                                                and customer feedback keep our catalog practical and dependable.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-8">
                                <figure class="br-lg">
                                    <img src="{{ asset('assets/user/images/pages/about_us/2.jpg') }}" alt="Banner"
                                        width="610" height="500" style="background-color: #CECECC;" />
                                </figure>
                            </div>
                        </div>
                    </section>


                </div>

                <section class="boost-section pt-10 pb-10">
                    <div class="container mt-10 mb-9">
                        <div class="row align-items-center mb-10">
                            <div class="col-md-6 mb-8">
                                <figure class="br-lg">
                                    <img src="{{ asset('assets/user/images/pages/about_us/3.jpg') }}" alt="Banner"
                                        width="610" height="450" style="background-color: #9E9DA2;" />
                                </figure>
                            </div>
                            <div class="col-md-6 pl-lg-8 mb-8">
                                <h4 class="title text-left">Our Mission</h4>
                                <p class="mb-6">Whether you’re setting up a new home or just upgrading daily essentials,
                                    Orcheee
                                    makes household shopping easy, affordable, and reliable. We focus on useful products,
                                    honest pricing, and dependable delivery so you can run your home with less hassle.</p>
                                <a href="/shop" class="btn btn-dark btn-rounded">Shop Now</a>
                            </div>
                        </div>


                    </div>
                </section>
            </div>
    </main>

    <!-- End of Main -->
@endsection
