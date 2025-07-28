@extends('user.layouts.app')
@section('content')
    <!-- Start of Main -->
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">About Us</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav mb-10 pb-8">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="demo1.html">Home</a></li>
                    <li>About Us</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of Page Content -->
        <div class="page-content">
            <div class="container">
                <section class="introduce mb-10 pb-10">
                    <h2 class="title title-center">
                        We’re Devoted Marketing<br>Consultants Helping Your Business Grow
                    </h2>
                    <p class=" mx-auto text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor
                        labore et dolore magna aliqua. Venenatis tellu metus</p>
                    <figure class="br-lg">
                        <img src="{{ asset('assets/user/images/pages/about_us/1.jpg') }}" alt="Banner" width="1240"
                            height="540" style="background-color: #D0C1AE;" />
                    </figure>
                </section>

                <section class="customer-service mb-7">
                    <div class="row align-items-center">
                        <div class="col-md-6 pr-lg-8 mb-8">
                            <h2 class="title text-left">We Provide Continuous &amp; Kind Service for Customers</h2>
                            <div class="accordion accordion-simple accordion-plus">
                                <div class="card border-no">
                                    <div class="card-header">
                                        <a href="#collapse3-1" class="collapse">Customer Service</a>
                                    </div>
                                    <div class="card-body expanded" id="collapse3-1">
                                        <p class="mb-0">
                                            Lorem ipsum dolor sit eiusamet, consectetur adipiscing elit,
                                            sed do eius mod tempor incididunt ut labore
                                            et dolore magna aliqua. Venenatis tell
                                            us in metus vulputate eu scelerisque felis. Vel pretium vulp.
                                        </p>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a href="#collapse3-2" class="expand">Online Consultation</a>
                                    </div>
                                    <div class="card-body collapsed" id="collapse3-2">
                                        <p class="mb-0">
                                            Lorem ipsum dolor sit eiusamet, consectetur adipiscing elit,
                                            sed do eius mod tempor incididunt ut labore
                                            et dolore magna aliqua. Venenatis tell
                                            us in metus vulputate eu scelerisque felis. Vel pretium vulp.
                                        </p>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a href="#collapse3-3" class="expand">Sales Management</a>
                                    </div>
                                    <div class="card-body collapsed" id="collapse3-3">
                                        <p class="mb-0">
                                            Lorem ipsum dolor sit eiusamet, consectetur adipiscing elit,
                                            sed do eius mod tempor incididunt ut labore
                                            et dolore magna aliqua. Venenatis tell
                                            us in metus vulputate eu scelerisque felis. Vel pretium vulp.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-8">
                            <figure class="br-lg">
                                <img src="{{ asset('assets/user/images/pages/about_us/2.jpg') }}" alt="Banner" width="610"
                                    height="500" style="background-color: #CECECC;" />
                            </figure>
                        </div>
                    </div>
                </section>

                <section class="count-section mb-10 pb-5">
                    <div class="owl-carousel owl-theme row cols-lg-3 cols-md-2 cols-1"
                        data-owl-options="{
                            'nav': false,
                            'dots': true,
                            'responsive': {
                                '0': {
                                    'items': 1
                                },
                                '768': {
                                    'items': 2
                                },
                                '992': {
                                    'items': 3
                                }
                            }
                        }">
                        <div class="counter-wrap">
                            <div class="counter text-center">
                                <span class="count-to" data-to="15">0</span>
                                <span>M+</span>
                                <h4 class="title title-center">Products For Sale</h4>
                                <p>Diam maecenas ultricies mi eget mauris<br>
                                    Nibh tellus molestie nunc non</p>
                            </div>
                        </div>
                        <div class="counter-wrap">
                            <div class="counter text-center">
                                <span>$</span>
                                <span class="count-to" data-to="25">0</span>
                                <span>B+</span>
                                <h4 class="title title-center">Community Earnings</h4>
                                <p>Diam maecenas ultricies mi eget mauris<br>
                                    Nibh tellus molestie nunc non</p>
                            </div>
                        </div>
                        <div class="counter-wrap">
                            <div class="counter text-center">
                                <span class="count-to" data-to="100">0</span>
                                <span>M+</span>
                                <h4 class="title title-center">Growing Buyers</h4>
                                <p>Diam maecenas ultricies mi eget mauris<br>
                                    Nibh tellus molestie nunc non</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <section class="boost-section pt-10 pb-10">
                <div class="container mt-10 mb-9">
                    <div class="row align-items-center mb-10">
                        <div class="col-md-6 mb-8">
                            <figure class="br-lg">
                                <img src="{{ asset('assets/user/images/pages/about_us/3.jpg') }}" alt="Banner" width="610"
                                    height="450" style="background-color: #9E9DA2;" />
                            </figure>
                        </div>
                        <div class="col-md-6 pl-lg-8 mb-8">
                            <h4 class="title text-left">We Boost Our Clients’ Bottom
                                Line by Optimizing Their Growth Potential</h4>
                            <p class="mb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Venenatis tellus in.
                                metus vulputate eu scelerisque felis. Vel pretium lectus qua .
                                Arpis massa. Nunc id cursus metus ididunt ut labore metus vulputate episcing.</p>
                            <a href="#" class="btn btn-dark btn-rounded">Visit Our Store</a>
                        </div>
                    </div>

                    <div class="awards-wrapper">
                        <h4 class="title title-center font-weight-bold mb-10 pb-1 ls-25">Awards</h4>
                        <div class="owl-carousel owl-theme row cols-xl-4 cols-lg-3 cols-md-2 cols-1"
                            data-owl-options="{
                                'nav': false,
                                'dots': true,
                                'margin': 20,
                                'responsive': {
                                    '0': {
                                        'items': 1
                                    },
                                    '768': {
                                        'items': 2
                                    },
                                    '992': {
                                        'items': 3
                                    },
                                    '1200': {
                                        'items': 4
                                    }
                                }
                            }">
                            <div class="image-box-wrapper">
                                <div class="image-box text-center">
                                    <figure>
                                        <img src="{{ asset('assets/user/images/pages/about_us/1.png') }}" alt="Award Image"
                                            width="109" height="105" />
                                    </figure>
                                    <p>Winner Seo Master MAGT<br>
                                        Smart Start Award 2018</p>
                                </div>
                            </div>
                            <div class="image-box-wrapper">
                                <div class="image-box text-center">
                                    <figure>
                                        <img src="{{ asset('assets/user/images/pages/about_us/2.png') }}" alt="Award Image"
                                            width="109" height="105" />
                                    </figure>
                                    <p>Top Social Media Agencies<br>
                                        Next Partner 2019</p>
                                </div>
                            </div>
                            <div class="image-box-wrapper mt-3">
                                <div class="image-box text-center">
                                    <figure>
                                        <img src="{{ asset('assets/user/images/pages/about_us/3.png') }}" alt="Award Image"
                                            width="109" height="105" />
                                    </figure>
                                    <p>5 Fastest Growing Abstract<br>
                                        Solution Providers 2020</p>
                                </div>
                            </div>
                            <div class="image-box-wrapper">
                                <div class="image-box text-center">
                                    <figure>
                                        <img src="{{ asset('assets/user/images/pages/about_us/4.png') }}" alt="Award Image"
                                            width="109" height="105" />
                                    </figure>
                                    <p>National Excellence Agencie<br>
                                        Award Winner 2021</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="member-section mt-10 pt-9 mb-10 pb-4">
                <div class="container">
                    <h4 class="title title-center mb-3">Meet Our Leaders</h4>
                    <p class="text-center mb-8">Nunc id cursus metus aliquam. Libero id faucibus nisl tincidunt eget.
                        Aliquam<br>
                        maecenas ultricies mi eget mauris. Volutpat ac</p>
                    <div class="owl-carousel owl-theme row cols-xl-4 cols-lg-3 cols-sm-2 cols-1"
                        data-owl-options="{
                            'nav': false,
                            'dots': true,
                            'margin': 20,
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
                                    'items': 4
                                }
                            }
                        }">
                        <div class="member-wrap">
                            <figure class="br-lg">
                                <img src="{{ asset('assets/user/images/pages/about_us/4.jpg') }}" alt="Member"
                                    width="295" height="332" />
                                <div class="overlay">
                                    <div class="social-icons">
                                        <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                        <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                        <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                                    </div>
                                </div>
                            </figure>
                            <div class="member-info text-center">
                                <h4 class="member-name">John Doe</h4>
                                <p class="text-uppercase">Founder &amp; CEO</p>
                            </div>
                        </div>
                        <div class="member-wrap">
                            <figure class="br-lg">
                                <img src="{{ asset('assets/user/images/pages/about_us/5.jpg') }}" alt="Member"
                                    width="295" height="332" />
                                <div class="overlay">
                                    <div class="social-icons">
                                        <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                        <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                        <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                                    </div>
                                </div>
                            </figure>
                            <div class="member-info text-center">
                                <h4 class="member-name">Jessica Doe</h4>
                                <p class="text-uppercase">Marketing</p>
                            </div>
                        </div>
                        <div class="member-wrap">
                            <figure class="br-lg">
                                <img src="{{ asset('assets/user/images/pages/about_us/6.jpg') }}" alt="Member"
                                    width="295" height="332" />
                                <div class="overlay">
                                    <div class="social-icons">
                                        <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                        <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                        <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                                    </div>
                                </div>
                            </figure>
                            <div class="member-info text-center">
                                <h4 class="member-name">Rick Edward Doe</h4>
                                <p class="text-uppercase">Developer</p>
                            </div>
                        </div>
                        <div class="member-wrap">
                            <figure class="br-lg">
                                <img src="{{ asset('assets/user/images/pages/about_us/7.jpg') }}" alt="Member"
                                    width="295" height="332" />
                                <div class="overlay">
                                    <div class="social-icons">
                                        <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                        <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                        <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                                    </div>
                                </div>
                            </figure>
                            <div class="member-info text-center">
                                <h4 class="member-name">Melinda Wolosky</h4>
                                <p class="text-uppercase">Design</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <!-- End of Main -->
@endsection
