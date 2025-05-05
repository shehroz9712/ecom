@extends('user.layouts.app')
@section('content')
    <main class="main">
        <div class="page-content contact-us">
            <div class="container">
                <section class="content-title-section mb-10">
                    <h3 class="title title-center mb-3">Contact
                        Information
                    </h3>
                    <p class="text-center">Lorem ipsum dolor sit amet,
                        consectetur
                        adipiscing elit, sed do eiusmod tempor incididunt ut</p>
                </section>
                <!-- End of Contact Title Section -->

                <section class="contact-information-section mb-10">
                    <div class="row owl-carousel owl-theme cols-xl-4 cols-md-3 cols-sm-2 cols-1"
                        data-owl-options="{
                'items': 4,
                'nav': false,
                'dots': false,
                'loop': false,
                'margin': 20,
                'responsive': {
                    '0': {
                        'items': 1
                    },
                    '480': {
                        'items': 2
                    },
                    '768': {
                        'items': 3
                    },
                    '992': {
                        'items': 3
                    }
                }
            }">
                        <div class="icon-box text-center icon-box-primary">
                            <span class="icon-box-icon icon-email">
                                <i class="w-icon-envelop-closed"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">E-mail Address</h4>
                                <p>{{ $settings->email }}</p>
                            </div>
                        </div>
                        <div class="icon-box text-center icon-box-primary">
                            <span class="icon-box-icon icon-headphone">
                                <i class="w-icon-headphone"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">Phone Number</h4>
                                <p>{{ $settings->phone }} / {{ $settings->another_phone }}</p>
                            </div>
                        </div>
                        <div class="icon-box text-center icon-box-primary">
                            <span class="icon-box-icon icon-map-marker">
                                <i class="w-icon-map-marker"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">Address</h4>
                                <p>Lawrence, NY 11345, USA</p>
                            </div>
                        </div>

                    </div>
                </section>
                <!-- End of Contact Information section -->

                <hr class="divider mb-10 pb-1">

                <section class="contact-section">
                    <div class="row gutter-lg pb-3">
                        <div class="col-lg-6 mb-8">
                            <h4 class="title mb-3">People usually ask these</h4>
                            <div class="accordion accordion-bg accordion-gutter-md accordion-border">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="#collapse1" class="collapse">How can I cancel my order?</a>
                                    </div>
                                    <div id="collapse1" class="card-body expanded">
                                        <p class="mb-0">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp
                                            orincid
                                            idunt ut labore et dolore magna aliqua. Venenatis tellus in metus vulp utate
                                            eu sceler
                                            isque felis. Vel pretium.
                                        </p>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <a href="#collapse2" class="expand">Why is my registration delayed?</a>
                                    </div>
                                    <div id="collapse2" class="card-body collapsed">
                                        <p class="mb-0">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp
                                            orincid
                                            idunt ut labore et dolore magna aliqua. Venenatis tellus in metus vulp utate
                                            eu sceler
                                            isque felis. Vel pretium.
                                        </p>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <a href="#collapse3" class="expand">What do I need to buy products?</a>
                                    </div>
                                    <div id="collapse3" class="card-body collapsed">
                                        <p class="mb-0">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp
                                            orincid
                                            idunt ut labore et dolore magna aliqua. Venenatis tellus in metus vulp utate
                                            eu sceler
                                            isque felis. Vel pretium.
                                        </p>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <a href="#collapse4" class="expand">How can I track an order?</a>
                                    </div>
                                    <div id="collapse4" class="card-body collapsed">
                                        <p class="mb-0">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp
                                            orincid
                                            idunt ut labore et dolore magna aliqua. Venenatis tellus in metus vulp utate
                                            eu sceler
                                            isque felis. Vel pretium.
                                        </p>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <a href="#collapse5" class="expand">How can I get money back?</a>
                                    </div>
                                    <div id="collapse5" class="card-body collapsed">
                                        <p class="mb-0">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            temp orincid idunt ut labore et dolore magna aliqua. Venenatis tellus in
                                            metus vulp utate eu sceler isque felis. Vel pretium.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-8">
                            <h4 class="title mb-3">Send Us a Message</h4>
                            <form class="form contact-us-form" action="#" method="post">
                                <div class="form-group">
                                    <label for="username">Your Name</label>
                                    <input type="text" id="username" name="username" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="email_1">Your Email</label>
                                    <input type="email" id="email_1" name="email_1" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="message">Your Message</label>
                                    <textarea id="message" name="message" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <button type="submit" class="btn btn-dark btn-rounded">Send Now</button>
                            </form>
                        </div>
                    </div>
                </section>
                <!-- End of Contact Section -->
            </div>
        </div>
    </main>
@endsection
