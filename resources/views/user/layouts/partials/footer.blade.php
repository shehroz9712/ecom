<footer class="footer appear-animate" data-animation-options="{
    'name': 'fadeIn'
}">
    <div class="footer-newsletter bg-primary">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-5 col-lg-6">
                    <div class="icon-box icon-box-side text-white">
                        <div class="icon-box-icon d-inline-flex">
                            <i class="w-icon-envelop3"></i>
                        </div>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title text-white text-uppercase font-weight-bold">Subscribe To
                                Our Newsletter</h4>
                            <p class="text-white">Get all the latest information on Events, Sales and Offers.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6 col-md-9 mt-4 mt-lg-0 ">
                    <form action="#" method="get"
                        class="input-wrapper input-wrapper-inline input-wrapper-rounded">
                        <input type="email" class="form-control mr-2 bg-white" name="email" id="email"
                            placeholder="Your E-mail Address" />
                        <button class="btn btn-dark btn-rounded" type="submit">Subscribe<i
                                class="w-icon-long-arrow-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="footer-top">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="widget widget-about">
                        <a href="{{ route('user.home') }}" class="logo-footer">
                            <img src="{{ asset('assets/user/images/logo_footer.png') }}" alt="logo-footer"
                                width="144" height="45" />
                        </a>
                        <div class="widget-body">
                            <p class="widget-about-title">Got Question? Call us 24/7</p>
                            <a href="tel:18005707777" class="widget-about-call">1-800-570-7777</a>
                            <p class="widget-about-desc">Register now to get updates on pronot get up icons
                                & coupons ster now toon.
                            </p>

                            <div class="social-icons social-icons-colored">
                                <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                                <a href="#" class="social-icon social-youtube w-icon-youtube"></a>
                                <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h3 class="widget-title">Company</h3>
                        <ul class="widget-body">
                            <li><a href="{{ route('user.about') }}">About Us</a></li>
                            <li><a href="#">Team Member</a></li>
                            <li><a href="#">Career</a></li>
                            <li><a href="{{ route('user.contact') }}">Contact Us</a></li>
                            <li><a href="#">Affilate</a></li>
                            <li><a href="#">Order History</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">My Account</h4>
                        <ul class="widget-body">
                            <li><a href="#">Track My Order</a></li>
                            <li><a href="{{ route('user.cart') }}">View Cart</a></li>
                            <li><a href="{{ route('login') }}">Sign In</a></li>
                            <li><a href="#">Help</a></li>
                            <li><a href="{{ route('user.wishlist') }}">My Wishlist</a></li>
                            <li><a href="{{ route(name: 'user.privacy') }}">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">Customer Service</h4>
                        <ul class="widget-body">
                            <li><a href="#">Payment Methods</a></li>
                            <li><a href="#">Money-back guarantee!</a></li>
                            <li><a href="#">Product Returns</a></li>
                            <li><a href="#">Support Center</a></li>
                            <li><a href="#">Shipping</a></li>
                            <li><a href="#">Term and Conditions</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-middle">
            <div class="widget widget-category">
                <div class="category-box">
                    <h6 class="category-name">Consumer Electric:</h6>
                    <a href="#">TV Television</a>
                    <a href="#">Air Condition</a>
                    <a href="#">Refrigerator</a>
                    <a href="#">Washing Machine</a>
                    <a href="#">Audio Speaker</a>
                    <a href="#">Security Camera</a>
                    <a href="#">View All</a>
                </div>
                <div class="category-box">
                    <h6 class="category-name">Clothing & Apparel:</h6>
                    <a href="#">Men's T-shirt</a>
                    <a href="#">Dresses</a>
                    <a href="#">Men's Sneacker</a>
                    <a href="#">Leather Backpack</a>
                    <a href="#">Watches</a>
                    <a href="#">Jeans</a>
                    <a href="#">Sunglasses</a>
                    <a href="#">Boots</a>
                    <a href="#">Rayban</a>
                    <a href="#">Acccessories</a>
                </div>
                <div class="category-box">
                    <h6 class="category-name">Home, Garden & Kitchen:</h6>
                    <a href="#">Sofa</a>
                    <a href="#">Chair</a>
                    <a href="#">Bed Room</a>
                    <a href="#">Living Room</a>
                    <a href="#">Cookware</a>
                    <a href="#">Utensil</a>
                    <a href="#">Blender</a>
                    <a href="#">Garden Equipments</a>
                    <a href="#">Decor</a>
                    <a href="#">Library</a>
                </div>
                <div class="category-box">
                    <h6 class="category-name">Health & Beauty:</h6>
                    <a href="#">Skin Care</a>
                    <a href="#">Body Shower</a>
                    <a href="#">Makeup</a>
                    <a href="#">Hair Care</a>
                    <a href="#">Lipstick</a>
                    <a href="#">Perfume</a>
                    <a href="#">View all</a>
                </div>
                <div class="category-box">
                    <h6 class="category-name">Jewelry & Watches:</h6>
                    <a href="#">Necklace</a>
                    <a href="#">Pendant</a>
                    <a href="#">Diamond Ring</a>
                    <a href="#">Silver Earing</a>
                    <a href="#">Leather Watcher</a>
                    <a href="#">Rolex</a>
                    <a href="#">Gucci</a>
                    <a href="#">Australian Opal</a>
                    <a href="#">Ammolite</a>
                    <a href="#">Sun Pyrite</a>
                </div>
                <div class="category-box">
                    <h6 class="category-name">Computer & Technologies:</h6>
                    <a href="#">Laptop</a>
                    <a href="#">iMac</a>
                    <a href="#">Smartphone</a>
                    <a href="#">Tablet</a>
                    <a href="#">Apple</a>
                    <a href="#">Asus</a>
                    <a href="#">Drone</a>
                    <a href="#">Wireless Speaker</a>
                    <a href="#">Game Controller</a>
                    <a href="#">View all</a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-left">
                <p class="copyright">Copyright © 2021 Wolmart Store. All Rights Reserved.</p>
            </div>
            <div class="footer-right">
                <span class="payment-label mr-lg-8">We're using safe payment for</span>
                <figure class="payment">
                    <img src="{{ asset('assets/user/images/payment.png') }}" alt="payment" width="159"
                        height="25" />
                </figure>
            </div>
        </div>
    </div>
</footer>
