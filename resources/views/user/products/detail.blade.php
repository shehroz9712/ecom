@extends('user.layouts.app')
@section('content')
    <!-- Start of Main -->
    <main class="main mb-10 pb-1">


        <!-- Start of Page Content -->
        <div class="page-content">
            <div class="container">
                <div class="row gutter-lg">
                    <div class="main-content">
                        <div class="product product-single row">
                            <div class="col-md-6 mb-6">
                                <div class="product-gallery product-gallery-sticky">
                                    <div
                                        class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1 gutter-no">
                                        <figure class="product-image">
                                            <img src="{{ asset('assets/user/images/products/default/1-800x900.jpg') }}"
                                                data-zoom-image="{{ asset('assets/user/images/products/default/1-800x900.jpg') }}"
                                                alt="Electronics Black Wrist Watch" width="800" height="900">
                                        </figure>
                                        <figure class="product-image">
                                            <img src="{{ asset('assets/user/images/products/default/2-800x900.jpg') }}"
                                                data-zoom-image="{{ asset('assets/user/images/products/default/2-800x900.jpg') }}"
                                                alt="Electronics Black Wrist Watch" width="488" height="549">
                                        </figure>
                                        <figure class="product-image">
                                            <img src="{{ asset('assets/user/images/products/default/3-800x900.jpg') }}"
                                                data-zoom-image="{{ asset('assets/user/images/products/default/3-800x900.jpg') }}"
                                                alt="Electronics Black Wrist Watch" width="800" height="900">
                                        </figure>
                                        <figure class="product-image">
                                            <img src="{{ asset('assets/user/images/products/default/4-800x900.jpg') }}"
                                                data-zoom-image="{{ asset('assets/user/images/products/default/4-800x900.jpg') }}"
                                                alt="Electronics Black Wrist Watch" width="800" height="900">
                                        </figure>
                                        <figure class="product-image">
                                            <img src="{{ asset('assets/user/images/products/default/5-800x900.jpg') }}"
                                                data-zoom-image="{{ asset('assets/user/images/products/default/5-800x900.jpg') }}"
                                                alt="Electronics Black Wrist Watch" width="800" height="900">
                                        </figure>
                                        <figure class="product-image">
                                            <img src="{{ asset('assets/user/images/products/default/6-800x900.jpg') }}"
                                                data-zoom-image="{{ asset('assets/user/images/products/default/6-800x900.jpg') }}"
                                                alt="Electronics Black Wrist Watch" width="800" height="900">
                                        </figure>
                                    </div>
                                    <div class="product-thumbs-wrap">
                                        <div class="product-thumbs row cols-4 gutter-sm">
                                            <div class="product-thumb active">
                                                <img src="{{ asset('assets/user/images/products/default/1-800x900.jpg') }}"
                                                    alt="Product Thumb" width="800" height="900">
                                            </div>
                                            <div class="product-thumb">
                                                <img src="{{ asset('assets/user/images/products/default/2-800x900.jpg') }}"
                                                    alt="Product Thumb" width="800" height="900">
                                            </div>
                                            <div class="product-thumb">
                                                <img src="{{ asset('assets/user/images/products/default/3-800x900.jpg') }}"
                                                    alt="Product Thumb" width="800" height="900">
                                            </div>
                                            <div class="product-thumb">
                                                <img src="{{ asset('assets/user/images/products/default/4-800x900.jpg') }}"
                                                    alt="Product Thumb" width="800" height="900">
                                            </div>
                                            <div class="product-thumb">
                                                <img src="{{ asset('assets/user/images/products/default/5-800x900.jpg') }}"
                                                    alt="Product Thumb" width="800" height="900">
                                            </div>
                                            <div class="product-thumb">
                                                <img src="{{ asset('assets/user/images/products/default/6-800x900.jpg') }}"
                                                    alt="Product Thumb" width="800" height="900">
                                            </div>
                                        </div>
                                        <button class="thumb-up disabled"><i class="w-icon-angle-left"></i></button>
                                        <button class="thumb-down disabled"><i class="w-icon-angle-right"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 mb-md-6">
                                <div class="product-details" data-sticky-options="{'minWidth': 767}">
                                    <h2 class="product-title">Electronics Black Wrist Watch</h2>
                                    <div class="product-bm-wrapper">
                                        <figure class="brand">
                                            <img src="{{ asset('assets/user/images/products/brand/brand-1.jpg') }}"
                                                alt="Brand" width="102" height="48" />
                                        </figure>
                                        <div class="product-meta">
                                            <div class="product-categories">
                                                Category:
                                                <span class="product-category"><a href="#">Electronics</a></span>
                                            </div>
                                            <div class="product-sku">
                                                SKU: <span>MS46891340</span>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="product-divider">

                                    <div class="product-price"><ins class="new-price">$40.00</ins></div>

                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 80%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="#product-tab-reviews" class="rating-reviews scroll-to">(3
                                            Reviews)</a>
                                    </div>

                                    <div class="product-short-desc">
                                        <ul class="list-type-check list-style-none">
                                            <li>Ultrices eros in cursus turpis massa cursus mattis.</li>
                                            <li>Volutpat ac tincidunt vitae semper quis lectus.</li>
                                            <li>Aliquam id diam maecenas ultricies mi eget mauris.</li>
                                        </ul>
                                    </div>

                                    <hr class="product-divider">

                                    <div class="product-form product-variation-form product-color-swatch">
                                        <label>Color:</label>
                                        <div class="d-flex align-items-center product-variations">
                                            <a href="#" class="color" style="background-color: #ffcc01"></a>
                                            <a href="#" class="color" style="background-color: #ca6d00;"></a>
                                            <a href="#" class="color" style="background-color: #1c93cb;"></a>
                                            <a href="#" class="color" style="background-color: #ccc;"></a>
                                            <a href="#" class="color" style="background-color: #333;"></a>
                                        </div>
                                    </div>
                                    <div class="product-form product-variation-form product-size-swatch">
                                        <label class="mb-1">Size:</label>
                                        <div class="flex-wrap d-flex align-items-center product-variations">
                                            <a href="#" class="size">Small</a>
                                            <a href="#" class="size">Medium</a>
                                            <a href="#" class="size">Large</a>
                                            <a href="#" class="size">Extra Large</a>
                                        </div>
                                        <a href="#" class="product-variation-clean">Clean All</a>
                                    </div>

                                    <div class="product-variation-price">
                                        <span></span>
                                    </div>

                                    <div class="fix-bottom product-sticky-content sticky-content">
                                        <div class="product-form container">
                                            <div class="product-qty-form">
                                                <div class="input-group">
                                                    <input class="quantity form-control" type="number" min="1"
                                                        max="10000000">
                                                    <button class="quantity-plus w-icon-plus"></button>
                                                    <button class="quantity-minus w-icon-minus"></button>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary btn-cart">
                                                <i class="w-icon-cart"></i>
                                                <span>Add to Cart</span>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="social-links-wrapper">
                                        <div class="social-links">
                                            <div class="social-icons social-no-color border-thin">
                                                <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                                <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                                <a href="#"
                                                    class="social-icon social-pinterest fab fa-pinterest-p"></a>
                                                <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                                                <a href="#"
                                                    class="social-icon social-youtube fab fa-linkedin-in"></a>
                                            </div>
                                        </div>
                                        <span class="divider d-xs-show"></span>
                                        <div class="product-link-wrapper d-flex">
                                            <a href="#"
                                                class="btn-product-icon btn-wishlist w-icon-heart"><span></span></a>
                                            <a href="#"
                                                class="btn-product-icon btn-compare btn-icon-left w-icon-compare"><span></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="frequently-bought-together mt-5">
                            <h2 class="title title-underline">Frequently Bought Together</h2>
                            <div class="bought-together-products row mt-8 pb-4">
                                <div class="product product-wrap text-center">
                                    <figure class="product-media">
                                        <img src="{{ asset('assets/user/images/products/default/bought-1.jpg') }}"
                                            alt="Product" width="138" height="138" />
                                        <div class="product-checkbox">
                                            <input type="checkbox" class="custom-checkbox" id="product_check1"
                                                name="product_check1">
                                            <label></label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="#">Electronics Black Wrist Watch</a>
                                        </h4>
                                        <div class="product-price">$40.00</div>
                                    </div>
                                </div>
                                <div class="product product-wrap text-center">
                                    <figure class="product-media">
                                        <img src="{{ asset('assets/user/images/products/default/bought-2.jpg') }}"
                                            alt="Product" width="138" height="138" />
                                        <div class="product-checkbox">
                                            <input type="checkbox" class="custom-checkbox" id="product_check2"
                                                name="product_check2">
                                            <label></label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="#">Apple Laptop</a>
                                        </h4>
                                        <div class="product-price">$1,800.00</div>
                                    </div>
                                </div>
                                <div class="product product-wrap text-center">
                                    <figure class="product-media">
                                        <img src="{{ asset('assets/user/images/products/default/bought-3.jpg') }}"
                                            alt="Product" width="138" height="138" />
                                        <div class="product-checkbox">
                                            <input type="checkbox" class="custom-checkbox" id="product_check3"
                                                name="product_check3">
                                            <label></label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name">
                                            <a href="#">White Lenovo Headphone</a>
                                        </h4>
                                        <div class="product-price">$34.00</div>
                                    </div>
                                </div>
                                <div class="product-button">
                                    <div class="bought-price font-weight-bolder text-primary ls-50">$1,874.00</div>
                                    <div class="bought-count">For 3 items</div>
                                    <a href="{{ route('user.cart') }}" class="btn btn-dark btn-rounded">Add All To
                                        Cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab tab-nav-boxed tab-nav-underline product-tabs">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a href="#product-tab-description" class="nav-link active">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#product-tab-specification" class="nav-link">Specification</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#product-tab-vendor" class="nav-link">Vendor Info</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#product-tab-reviews" class="nav-link">Customer Reviews (3)</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="product-tab-description">
                                    <div class="row mb-4">
                                        <div class="col-md-6 mb-5">
                                            <h4 class="title tab-pane-title font-weight-bold mb-2">Detail</h4>
                                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                                sed do eiusmod tempor incididunt arcu cursus vitae congue mauris.
                                                Sagittis id consectetur purus ut. Tellus rutrum tellus pelle Vel
                                                pretium lectus quam id leo in vitae turpis massa.</p>
                                            <ul class="list-type-check">
                                                <li>Nunc nec porttitor turpis. In eu risus enim. In vitae mollis
                                                    elit.
                                                </li>
                                                <li>Vivamus finibus vel mauris ut vehicula.</li>
                                                <li>Nullam a magna porttitor, dictum risus nec, faucibus sapien.
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6 mb-5">
                                            <div class="banner banner-video product-video br-xs">
                                                <figure class="banner-media">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/user/images/products/video-banner-610x300.jpg') }}"
                                                            alt="banner" width="610" height="300"
                                                            style="background-color: #bebebe;">
                                                    </a>
                                                    <a class="btn-play-video btn-iframe"
                                                        href="{{ asset('assets/user/video/memory-of-a-woman.mp4') }}"></a>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row cols-md-3">
                                        <div class="mb-3">
                                            <h5 class="sub-title font-weight-bold"><span class="mr-3">1.</span>Free
                                                Shipping &amp; Return</h5>
                                            <p class="detail pl-5">We offer free shipping for products on orders
                                                above 50$ and offer free delivery for all orders in US.</p>
                                        </div>
                                        <div class="mb-3">
                                            <h5 class="sub-title font-weight-bold"><span>2.</span>Free and Easy
                                                Returns</h5>
                                            <p class="detail pl-5">We guarantee our products and you could get back
                                                all of your money anytime you want in 30 days.</p>
                                        </div>
                                        <div class="mb-3">
                                            <h5 class="sub-title font-weight-bold"><span>3.</span>Special Financing
                                            </h5>
                                            <p class="detail pl-5">Get 20%-50% off items over 50$ for a month or
                                                over 250$ for a year with our special credit card.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="product-tab-specification">
                                    <ul class="list-none">
                                        <li>
                                            <label>Model</label>
                                            <p>Skysuite 320</p>
                                        </li>
                                        <li>
                                            <label>Color</label>
                                            <p>Black</p>
                                        </li>
                                        <li>
                                            <label>Size</label>
                                            <p>Large, Small</p>
                                        </li>
                                        <li>
                                            <label>Guarantee Time</label>
                                            <p>3 Months</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane" id="product-tab-vendor">
                                    <div class="row mb-3">
                                        <div class="col-md-6 mb-4">
                                            <figure class="vendor-banner br-sm">
                                                <img src="{{ asset('assets/user/images/products/vendor-banner.jpg') }}"
                                                    alt="Vendor Banner" width="610" height="295"
                                                    style="background-color: #353B55;" />
                                            </figure>
                                        </div>
                                        <div class="col-md-6 pl-2 pl-md-6 mb-4">
                                            <div class="vendor-user">
                                                <figure class="vendor-logo mr-4">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/user/images/products/vendor-logo.jpg') }}"
                                                            alt="Vendor Logo" width="80" height="80" />
                                                    </a>
                                                </figure>
                                                <div>
                                                    <div class="vendor-name"><a href="#">Jone Doe</a></div>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 90%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <a href="#" class="rating-reviews">(32 Reviews)</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="vendor-info list-style-none">
                                                <li class="store-name">
                                                    <label>Store Name:</label>
                                                    <span class="detail">OAIO Store</span>
                                                </li>
                                                <li class="store-address">
                                                    <label>Address:</label>
                                                    <span class="detail">Steven Street, El Carjon, CA 92020, United
                                                        States (US)</span>
                                                </li>
                                                <li class="store-phone">
                                                    <label>Phone:</label>
                                                    <a href="#tel:">1234567890</a>
                                                </li>
                                            </ul>
                                            <a href="vendor-dokan-store.html"
                                                class="btn btn-dark btn-link btn-underline btn-icon-right">Visit
                                                Store<i class="w-icon-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <p class="mb-5"><strong class="text-dark">L</strong>orem ipsum dolor sit amet,
                                        consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                        dolore magna aliqua.
                                        Venenatis tellus in metus vulputate eu scelerisque felis. Vel pretium
                                        lectus quam id leo in vitae turpis massa. Nunc id cursus metus aliquam.
                                        Libero id faucibus nisl tincidunt eget. Aliquam id diam maecenas ultricies
                                        mi eget mauris. Volutpat ac tincidunt vitae semper quis lectus. Vestibulum
                                        mattis ullamcorper velit sed. A arcu cursus vitae congue mauris.
                                    </p>
                                    <p class="mb-2"><strong class="text-dark">A</strong> arcu cursus vitae congue
                                        mauris. Sagittis id consectetur purus
                                        ut. Tellus rutrum tellus pellentesque eu tincidunt tortor aliquam nulla.
                                        Diam in
                                        arcu cursus euismod quis. Eget sit amet tellus cras adipiscing enim eu. In
                                        fermentum et sollicitudin ac orci phasellus. A condimentum vitae sapien
                                        pellentesque
                                        habitant morbi tristique senectus et. In dictum non consectetur a erat. Nunc
                                        scelerisque viverra mauris in aliquam sem fringilla.</p>
                                </div>
                                <div class="tab-pane" id="product-tab-reviews">
                                    <div class="row mb-4">
                                        <div class="col-xl-4 col-lg-5 mb-4">
                                            <div class="ratings-wrapper">
                                                <div class="avg-rating-container">
                                                    <h4 class="avg-mark font-weight-bolder ls-50">3.3</h4>
                                                    <div class="avg-rating">
                                                        <p class="text-dark mb-1">Average Rating</p>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 60%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                            <a href="#" class="rating-reviews">(3 Reviews)</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ratings-value d-flex align-items-center text-dark ls-25">
                                                    <span class="text-dark font-weight-bold">66.7%</span>Recommended<span
                                                        class="count">(2 of 3)</span>
                                                </div>
                                                <div class="ratings-list">
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 100%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <div class="progress-bar progress-bar-sm ">
                                                            <span></span>
                                                        </div>
                                                        <div class="progress-value">
                                                            <mark>70%</mark>
                                                        </div>
                                                    </div>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 80%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <div class="progress-bar progress-bar-sm ">
                                                            <span></span>
                                                        </div>
                                                        <div class="progress-value">
                                                            <mark>30%</mark>
                                                        </div>
                                                    </div>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 60%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <div class="progress-bar progress-bar-sm ">
                                                            <span></span>
                                                        </div>
                                                        <div class="progress-value">
                                                            <mark>40%</mark>
                                                        </div>
                                                    </div>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 40%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <div class="progress-bar progress-bar-sm ">
                                                            <span></span>
                                                        </div>
                                                        <div class="progress-value">
                                                            <mark>0%</mark>
                                                        </div>
                                                    </div>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 20%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <div class="progress-bar progress-bar-sm ">
                                                            <span></span>
                                                        </div>
                                                        <div class="progress-value">
                                                            <mark>0%</mark>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-8 col-lg-7 mb-4">
                                            <div class="review-form-wrapper">
                                                <h3 class="title tab-pane-title font-weight-bold mb-1">Submit Your
                                                    Review</h3>
                                                <p class="mb-3">Your email address will not be published. Required
                                                    fields are marked *</p>
                                                <form action="#" method="POST" class="review-form">
                                                    <div class="rating-form">
                                                        <label for="rating">Your Rating Of This Product :</label>
                                                        <span class="rating-stars">
                                                            <a class="star-1" href="#">1</a>
                                                            <a class="star-2" href="#">2</a>
                                                            <a class="star-3" href="#">3</a>
                                                            <a class="star-4" href="#">4</a>
                                                            <a class="star-5" href="#">5</a>
                                                        </span>
                                                        <select name="rating" id="rating" required=""
                                                            style="display: none;">
                                                            <option value="">Rate…</option>
                                                            <option value="5">Perfect</option>
                                                            <option value="4">Good</option>
                                                            <option value="3">Average</option>
                                                            <option value="2">Not that bad</option>
                                                            <option value="1">Very poor</option>
                                                        </select>
                                                    </div>
                                                    <textarea cols="30" rows="6" placeholder="Write Your Review Here..." class="form-control"
                                                        id="review"></textarea>
                                                    <div class="row gutter-md">
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"
                                                                placeholder="Your Name" id="author">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"
                                                                placeholder="Your Email" id="email_1">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="checkbox" class="custom-checkbox"
                                                            id="save-checkbox">
                                                        <label for="save-checkbox">Save my name, email, and website
                                                            in this browser for the next time I comment.</label>
                                                    </div>
                                                    <button type="submit" class="btn btn-dark">Submit
                                                        Review</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab tab-nav-boxed tab-nav-outline tab-nav-center">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a href="#show-all" class="nav-link active">Show All</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#helpful-positive" class="nav-link">Most Helpful
                                                    Positive</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#helpful-negative" class="nav-link">Most Helpful
                                                    Negative</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#highest-rating" class="nav-link">Highest Rating</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#lowest-rating" class="nav-link">Lowest Rating</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="show-all">
                                                <ul class="comments list-style-none">
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <figure class="comment-avatar">
                                                                <img src="{{ asset('assets/user/images/agents/1-100x100.png') }}"
                                                                    alt="Commenter Avatar" width="90" height="90">
                                                            </figure>
                                                            <div class="comment-content">
                                                                <h4 class="comment-author">
                                                                    <a href="#">John Doe</a>
                                                                    <span class="comment-date">March 22, 2021 at
                                                                        1:54 pm</span>
                                                                </h4>
                                                                <div class="ratings-container comment-rating">
                                                                    <div class="ratings-full">
                                                                        <span class="ratings" style="width: 60%;"></span>
                                                                        <span class="tooltiptext tooltip-top"></span>
                                                                    </div>
                                                                </div>
                                                                <p>pellentesque habitant morbi tristique senectus
                                                                    et. In dictum non consectetur a erat.
                                                                    Nunc ultrices eros in cursus turpis massa
                                                                    tincidunt ante in nibh mauris cursus mattis.
                                                                    Cras ornare arcu dui vivamus arcu felis bibendum
                                                                    ut tristique.</p>
                                                                <div class="comment-action">
                                                                    <a href="#"
                                                                        class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-up"></i>Helpful (1)
                                                                    </a>
                                                                    <a href="#"
                                                                        class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-down"></i>Unhelpful
                                                                        (0)
                                                                    </a>
                                                                    <div class="review-image">
                                                                        <a href="#">
                                                                            <figure>
                                                                                <img src="{{ asset('assets/user/images/products/default/review-img-1.jpg') }}"
                                                                                    width="60" height="60"
                                                                                    alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                                    data-zoom-image="{{ asset('assets/user/images/products/default/review-img-1-800x900.jpg') }}" />
                                                                            </figure>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <figure class="comment-avatar">
                                                                <img src="{{ asset('assets/user/images/agents/2-100x100.png') }}"
                                                                    alt="Commenter Avatar" width="90" height="90">
                                                            </figure>
                                                            <div class="comment-content">
                                                                <h4 class="comment-author">
                                                                    <a href="#">John Doe</a>
                                                                    <span class="comment-date">March 22, 2021 at
                                                                        1:52 pm</span>
                                                                </h4>
                                                                <div class="ratings-container comment-rating">
                                                                    <div class="ratings-full">
                                                                        <span class="ratings" style="width: 80%;"></span>
                                                                        <span class="tooltiptext tooltip-top"></span>
                                                                    </div>
                                                                </div>
                                                                <p>Nullam a magna porttitor, dictum risus nec,
                                                                    faucibus sapien.
                                                                    Ultrices eros in cursus turpis massa tincidunt
                                                                    ante in nibh mauris cursus mattis.
                                                                    Cras ornare arcu dui vivamus arcu felis bibendum
                                                                    ut tristique.</p>
                                                                <div class="comment-action">
                                                                    <a href="#"
                                                                        class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-up"></i>Helpful (1)
                                                                    </a>
                                                                    <a href="#"
                                                                        class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-down"></i>Unhelpful
                                                                        (0)
                                                                    </a>
                                                                    <div class="review-image">
                                                                        <a href="#">
                                                                            <figure>
                                                                                <img src="{{ asset('assets/user/images/products/default/review-img-2.jpg') }}"
                                                                                    width="60" height="60"
                                                                                    alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                                    data-zoom-image="{{ asset('assets/user/images/products/default/review-img-2.jpg') }}" />
                                                                            </figure>
                                                                        </a>
                                                                        <a href="#">
                                                                            <figure>
                                                                                <img src="{{ asset('assets/user/images/products/default/review-img-3.jpg') }}"
                                                                                    width="60" height="60"
                                                                                    alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                                    data-zoom-image="{{ asset('assets/user/images/products/default/review-img-3.jpg') }}" />
                                                                            </figure>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <figure class="comment-avatar">
                                                                <img src="{{ asset('assets/user/images/agents/3-100x100.png') }}"
                                                                    alt="Commenter Avatar" width="90" height="90">
                                                            </figure>
                                                            <div class="comment-content">
                                                                <h4 class="comment-author">
                                                                    <a href="#">John Doe</a>
                                                                    <span class="comment-date">March 22, 2021 at
                                                                        1:21 pm</span>
                                                                </h4>
                                                                <div class="ratings-container comment-rating">
                                                                    <div class="ratings-full">
                                                                        <span class="ratings" style="width: 60%;"></span>
                                                                        <span class="tooltiptext tooltip-top"></span>
                                                                    </div>
                                                                </div>
                                                                <p>In fermentum et sollicitudin ac orci phasellus. A
                                                                    condimentum vitae
                                                                    sapien pellentesque habitant morbi tristique
                                                                    senectus et. In dictum
                                                                    non consectetur a erat. Nunc scelerisque viverra
                                                                    mauris in aliquam sem fringilla.</p>
                                                                <div class="comment-action">
                                                                    <a href="#"
                                                                        class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-up"></i>Helpful (0)
                                                                    </a>
                                                                    <a href="#"
                                                                        class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-down"></i>Unhelpful
                                                                        (1)
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane" id="helpful-positive">
                                                <ul class="comments list-style-none">
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <figure class="comment-avatar">
                                                                <img src="{{ asset('assets/user/images/agents/1-100x100.png') }}"
                                                                    alt="Commenter Avatar" width="90" height="90">
                                                            </figure>
                                                            <div class="comment-content">
                                                                <h4 class="comment-author">
                                                                    <a href="#">John Doe</a>
                                                                    <span class="comment-date">March 22, 2021 at
                                                                        1:54 pm</span>
                                                                </h4>
                                                                <div class="ratings-container comment-rating">
                                                                    <div class="ratings-full">
                                                                        <span class="ratings" style="width: 60%;"></span>
                                                                        <span class="tooltiptext tooltip-top"></span>
                                                                    </div>
                                                                </div>
                                                                <p>pellentesque habitant morbi tristique senectus
                                                                    et. In dictum non consectetur a erat.
                                                                    Nunc ultrices eros in cursus turpis massa
                                                                    tincidunt ante in nibh mauris cursus mattis.
                                                                    Cras ornare arcu dui vivamus arcu felis bibendum
                                                                    ut tristique.</p>
                                                                <div class="comment-action">
                                                                    <a href="#"
                                                                        class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-up"></i>Helpful (1)
                                                                    </a>
                                                                    <a href="#"
                                                                        class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-down"></i>Unhelpful
                                                                        (0)
                                                                    </a>
                                                                    <div class="review-image">
                                                                        <a href="#">
                                                                            <figure>
                                                                                <img src="{{ asset('assets/user/images/products/default/review-img-1.jpg') }}"
                                                                                    width="60" height="60"
                                                                                    alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                                    data-zoom-image="{{ asset('assets/user/images/products/default/review-img-1.jpg') }}" />
                                                                            </figure>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <figure class="comment-avatar">
                                                                <img src="{{ asset('assets/user/images/agents/2-100x100.png') }}"
                                                                    alt="Commenter Avatar" width="90" height="90">
                                                            </figure>
                                                            <div class="comment-content">
                                                                <h4 class="comment-author">
                                                                    <a href="#">John Doe</a>
                                                                    <span class="comment-date">March 22, 2021 at
                                                                        1:52 pm</span>
                                                                </h4>
                                                                <div class="ratings-container comment-rating">
                                                                    <div class="ratings-full">
                                                                        <span class="ratings" style="width: 80%;"></span>
                                                                        <span class="tooltiptext tooltip-top"></span>
                                                                    </div>
                                                                </div>
                                                                <p>Nullam a magna porttitor, dictum risus nec,
                                                                    faucibus sapien.
                                                                    Ultrices eros in cursus turpis massa tincidunt
                                                                    ante in nibh mauris cursus mattis.
                                                                    Cras ornare arcu dui vivamus arcu felis bibendum
                                                                    ut tristique.</p>
                                                                <div class="comment-action">
                                                                    <a href="#"
                                                                        class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-up"></i>Helpful (1)
                                                                    </a>
                                                                    <a href="#"
                                                                        class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-down"></i>Unhelpful
                                                                        (0)
                                                                    </a>
                                                                    <div class="review-image">
                                                                        <a href="#">
                                                                            <figure>
                                                                                <img src="{{ asset('assets/user/images/products/default/review-img-2.jpg') }}"
                                                                                    width="60" height="60"
                                                                                    alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                                    data-zoom-image="{{ asset('assets/user/images/products/default/review-img-2-800x900.jpg') }}" />
                                                                            </figure>
                                                                        </a>
                                                                        <a href="#">
                                                                            <figure>
                                                                                <img src="{{ asset('assets/user/images/products/default/review-img-3.jpg') }}"
                                                                                    width="60" height="60"
                                                                                    alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                                    data-zoom-image="{{ asset('assets/user/images/products/default/review-img-3-800x900.jpg') }}" />
                                                                            </figure>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane" id="helpful-negative">
                                                <ul class="comments list-style-none">
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <figure class="comment-avatar">
                                                                <img src="{{ asset('assets/user/images/agents/3-100x100.png') }}"
                                                                    alt="Commenter Avatar" width="90" height="90">
                                                            </figure>
                                                            <div class="comment-content">
                                                                <h4 class="comment-author">
                                                                    <a href="#">John Doe</a>
                                                                    <span class="comment-date">March 22, 2021 at
                                                                        1:21 pm</span>
                                                                </h4>
                                                                <div class="ratings-container comment-rating">
                                                                    <div class="ratings-full">
                                                                        <span class="ratings" style="width: 60%;"></span>
                                                                        <span class="tooltiptext tooltip-top"></span>
                                                                    </div>
                                                                </div>
                                                                <p>In fermentum et sollicitudin ac orci phasellus. A
                                                                    condimentum vitae
                                                                    sapien pellentesque habitant morbi tristique
                                                                    senectus et. In dictum
                                                                    non consectetur a erat. Nunc scelerisque viverra
                                                                    mauris in aliquam sem fringilla.</p>
                                                                <div class="comment-action">
                                                                    <a href="#"
                                                                        class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-up"></i>Helpful (0)
                                                                    </a>
                                                                    <a href="#"
                                                                        class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-down"></i>Unhelpful
                                                                        (1)
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane" id="highest-rating">
                                                <ul class="comments list-style-none">
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <figure class="comment-avatar">
                                                                <img src="{{ asset('assets/user/images/agents/2-100x100.png') }}"
                                                                    alt="Commenter Avatar" width="90" height="90">
                                                            </figure>
                                                            <div class="comment-content">
                                                                <h4 class="comment-author">
                                                                    <a href="#">John Doe</a>
                                                                    <span class="comment-date">March 22, 2021 at
                                                                        1:52 pm</span>
                                                                </h4>
                                                                <div class="ratings-container comment-rating">
                                                                    <div class="ratings-full">
                                                                        <span class="ratings" style="width: 80%;"></span>
                                                                        <span class="tooltiptext tooltip-top"></span>
                                                                    </div>
                                                                </div>
                                                                <p>Nullam a magna porttitor, dictum risus nec,
                                                                    faucibus sapien.
                                                                    Ultrices eros in cursus turpis massa tincidunt
                                                                    ante in nibh mauris cursus mattis.
                                                                    Cras ornare arcu dui vivamus arcu felis bibendum
                                                                    ut tristique.</p>
                                                                <div class="comment-action">
                                                                    <a href="#"
                                                                        class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-up"></i>Helpful (1)
                                                                    </a>
                                                                    <a href="#"
                                                                        class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-down"></i>Unhelpful
                                                                        (0)
                                                                    </a>
                                                                    <div class="review-image">
                                                                        <a href="#">
                                                                            <figure>
                                                                                <img src="{{ asset('assets/user/images/products/default/review-img-2.jpg') }}"
                                                                                    width="60" height="60"
                                                                                    alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                                    data-zoom-image="{{ asset('assets/user/images/products/default/review-img-2-800x900.jpg') }}" />
                                                                            </figure>
                                                                        </a>
                                                                        <a href="#">
                                                                            <figure>
                                                                                <img src="{{ asset('assets/user/images/products/default/review-img-3.jpg') }}"
                                                                                    width="60" height="60"
                                                                                    alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                                    data-zoom-image="{{ asset('assets/user/images/products/default/review-img-3-800x900.jpg') }}" />
                                                                            </figure>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane" id="lowest-rating">
                                                <ul class="comments list-style-none">
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <figure class="comment-avatar">
                                                                <img src="{{ asset('assets/user/images/agents/1-100x100.png') }}"
                                                                    alt="Commenter Avatar" width="90" height="90">
                                                            </figure>
                                                            <div class="comment-content">
                                                                <h4 class="comment-author">
                                                                    <a href="#">John Doe</a>
                                                                    <span class="comment-date">March 22, 2021 at
                                                                        1:54 pm</span>
                                                                </h4>
                                                                <div class="ratings-container comment-rating">
                                                                    <div class="ratings-full">
                                                                        <span class="ratings" style="width: 60%;"></span>
                                                                        <span class="tooltiptext tooltip-top"></span>
                                                                    </div>
                                                                </div>
                                                                <p>pellentesque habitant morbi tristique senectus
                                                                    et. In dictum non consectetur a erat.
                                                                    Nunc ultrices eros in cursus turpis massa
                                                                    tincidunt ante in nibh mauris cursus mattis.
                                                                    Cras ornare arcu dui vivamus arcu felis bibendum
                                                                    ut tristique.</p>
                                                                <div class="comment-action">
                                                                    <a href="#"
                                                                        class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-up"></i>Helpful (1)
                                                                    </a>
                                                                    <a href="#"
                                                                        class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                        <i class="far fa-thumbs-down"></i>Unhelpful
                                                                        (0)
                                                                    </a>
                                                                    <div class="review-image">
                                                                        <a href="#">
                                                                            <figure>
                                                                                <img src="{{ asset('assets/user/images/products/default/review-img-3.jpg') }}"
                                                                                    width="60" height="60"
                                                                                    alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                                    data-zoom-image="{{ asset('assets/user/images/products/default/review-img-3-800x900.jpg') }}" />
                                                                            </figure>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <section class="vendor-product-section">
                            <div class="title-link-wrapper mb-4">
                                <h4 class="title text-left">More Products From This Vendor</h4>
                                <a href="#" class="btn btn-dark btn-link btn-slide-right btn-icon-right">More
                                    Products<i class="w-icon-long-arrow-right"></i></a>
                            </div>
                            <div class="owl-carousel owl-theme row cols-lg-3 cols-md-4 cols-sm-3 cols-2"
                                data-owl-options="{
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
                                    'items': 4
                                },
                                '992': {
                                    'items': 3
                                }
                            }
                        }">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{ asset('assets/user/images/products/default/1-1.jpg') }}"
                                                alt="Product" width="300" height="338" />
                                            <img src="{{ asset('assets/user/images/products/default/1-2.jpg') }}"
                                                alt="Product" width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                                View</a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat"><a href="shop-banner-sidebar.html">Accessories</a>
                                        </div>
                                        <h4 class="product-name"><a href="product-default.html">Sticky Pencil</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                        </div>
                                        <div class="product-pa-wrapper">
                                            <div class="product-price">$20.00</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{ asset('assets/user/images/products/default/2.jpg') }}"
                                                alt="Product" width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                                View</a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat"><a href="shop-banner-sidebar.html">Electronics</a>
                                        </div>
                                        <h4 class="product-name"><a href="product-default.html">Mini
                                                Multi-Functional Cooker</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 80%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(5 reviews)</a>
                                        </div>
                                        <div class="product-pa-wrapper">
                                            <div class="product-price">
                                                <ins class="new-price">$480.00</ins><del class="old-price">$534.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{ asset('assets/user/images/products/default/3.jpg') }}"
                                                alt="Product" width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                                View</a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat"><a href="shop-banner-sidebar.html">Sports</a></div>
                                        <h4 class="product-name"><a href="product-default.html">Skate Pan</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                        </div>
                                        <div class="product-pa-wrapper">
                                            <div class="product-price">
                                                <ins class="new-price">$278.00</ins><del class="old-price">$310.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{ asset('assets/user/images/products/default/4-1.jpg') }}"
                                                alt="Product" width="300" height="338" />
                                            <img src="{{ asset('assets/user/images/products/default/4-2.jpg') }}"
                                                alt="Product" width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                                View</a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <div class="product-cat"><a href="shop-banner-sidebar.html">Accessories</a>
                                        </div>
                                        <h4 class="product-name"><a href="product-default.html">Clip Attachment</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(5 reviews)</a>
                                        </div>
                                        <div class="product-pa-wrapper">
                                            <div class="product-price">$40.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="related-product-section">
                            <div class="title-link-wrapper mb-4">
                                <h4 class="title">Related Products</h4>
                                <a href="#" class="btn btn-dark btn-link btn-slide-right btn-icon-right">More
                                    Products<i class="w-icon-long-arrow-right"></i></a>
                            </div>
                            <div class="owl-carousel owl-theme row cols-lg-3 cols-md-4 cols-sm-3 cols-2"
                                data-owl-options="{
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
                                    'items': 4
                                },
                                '992': {
                                    'items': 3
                                }
                            }
                        }">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{ asset('assets/user/images/products/default/5.jpg') }}"
                                                alt="Product" width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                                View</a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Drone</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                        </div>
                                        <div class="product-pa-wrapper">
                                            <div class="product-price">$632.00</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{ asset('assets/user/images/products/default/6.jpg') }}"
                                                alt="Product" width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                                View</a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Official Camera</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                        </div>
                                        <div class="product-pa-wrapper">
                                            <div class="product-price">
                                                <ins class="new-price">$263.00</ins><del class="old-price">$300.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{ asset('assets/user/images/products/default/7-1.jpg') }}"
                                                alt="Product" width="300" height="338" />
                                            <img src="{{ asset('assets/user/images/products/default/7-2.jpg') }}"
                                                alt="Product" width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                                View</a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Phone Charge Pad</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 80%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(8 reviews)</a>
                                        </div>
                                        <div class="product-pa-wrapper">
                                            <div class="product-price">$23.00</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{ asset('assets/user/images/products/default/8.jpg') }}"
                                                alt="Product" width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                                View</a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Fashionalble
                                                Pencil</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(9 reviews)</a>
                                        </div>
                                        <div class="product-pa-wrapper">
                                            <div class="product-price">$50.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <!-- End of Main Content -->
                    <aside class="sidebar product-sidebar sidebar-fixed right-sidebar sticky-sidebar-wrapper">
                        <div class="sidebar-overlay"></div>
                        <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                        <a href="#" class="sidebar-toggle d-flex d-lg-none"><i
                                class="fas fa-chevron-left"></i></a>
                        <div class="sidebar-content scrollable">
                            <div class="sticky-sidebar">
                                <div class="widget widget-icon-box mb-6">
                                    <div class="icon-box icon-box-side">
                                        <span class="icon-box-icon text-dark">
                                            <i class="w-icon-truck"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <h4 class="icon-box-title">Free Shipping & Returns</h4>
                                            <p>For all orders over $99</p>
                                        </div>
                                    </div>
                                    <div class="icon-box icon-box-side">
                                        <span class="icon-box-icon text-dark">
                                            <i class="w-icon-bag"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <h4 class="icon-box-title">Secure Payment</h4>
                                            <p>We ensure secure payment</p>
                                        </div>
                                    </div>
                                    <div class="icon-box icon-box-side">
                                        <span class="icon-box-icon text-dark">
                                            <i class="w-icon-money"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <h4 class="icon-box-title">Money Back Guarantee</h4>
                                            <p>Any back within 30 days</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Widget Icon Box -->

                                <div class="widget widget-banner mb-9">
                                    <div class="banner banner-fixed br-sm">
                                        <figure>
                                            <img src="{{ asset('assets/user/images/shop/banner3.jpg') }}"
                                                alt="Banner" width="266" height="220"
                                                style="background-color: #1D2D44;" />
                                        </figure>
                                        <div class="banner-content">
                                            <div class="banner-price-info font-weight-bolder text-white lh-1 ls-25">
                                                40<sup class="font-weight-bold">%</sup><sub
                                                    class="font-weight-bold text-uppercase ls-25">Off</sub>
                                            </div>
                                            <h4 class="banner-subtitle text-white font-weight-bolder text-uppercase mb-0">
                                                Ultimate Sale</h4>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Widget Banner -->

                                <div class="widget widget-products">
                                    <div class="title-link-wrapper mb-2">
                                        <h4 class="title title-link font-weight-bold">More Products</h4>
                                    </div>

                                    <div class="owl-carousel owl-theme owl-nav-top"
                                        data-owl-options="{
                                    'nav': true,
                                    'dots': false,
                                    'items': 1,
                                    'margin': 20
                                }">
                                        <div class="widget-col">
                                            <div class="product product-widget">
                                                <figure class="product-media">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/user/images/shop/13.jpg') }}"
                                                            alt="Product" width="100" height="113" />
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h4 class="product-name">
                                                        <a href="#">Smart Watch</a>
                                                    </h4>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 100%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">$80.00 - $90.00</div>
                                                </div>
                                            </div>
                                            <div class="product product-widget">
                                                <figure class="product-media">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/user/images/shop/14.jpg') }}"
                                                            alt="Product" width="100" height="113" />
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h4 class="product-name">
                                                        <a href="#">Sky Medical Facility</a>
                                                    </h4>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 80%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">$58.00</div>
                                                </div>
                                            </div>
                                            <div class="product product-widget">
                                                <figure class="product-media">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/user/images/shop/15.jpg') }}"
                                                            alt="Product" width="100" height="113" />
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h4 class="product-name">
                                                        <a href="#">Black Stunt Motor</a>
                                                    </h4>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 60%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">$374.00</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-col">
                                            <div class="product product-widget">
                                                <figure class="product-media">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/user/images/shop/16.jpg') }}"
                                                            alt="Product" width="100" height="113" />
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h4 class="product-name">
                                                        <a href="#">Skate Pan</a>
                                                    </h4>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 100%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">$278.00</div>
                                                </div>
                                            </div>
                                            <div class="product product-widget">
                                                <figure class="product-media">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/user/images/shop/17.jpg') }}"
                                                            alt="Product" width="100" height="113" />
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h4 class="product-name">
                                                        <a href="#">Modern Cooker</a>
                                                    </h4>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 80%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">$324.00</div>
                                                </div>
                                            </div>
                                            <div class="product product-widget">
                                                <figure class="product-media">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/user/images/shop/18.jpg') }}"
                                                            alt="Product" width="100" height="113" />
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h4 class="product-name">
                                                        <a href="#">CT Machine</a>
                                                    </h4>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 100%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">$236.00</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </aside>
                    <!-- End of Sidebar -->
                </div>
            </div>
        </div>
        <!-- End of Page Content -->
    </main>
    <!-- End of Main -->
@endsection
