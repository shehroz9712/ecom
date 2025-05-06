<script>
    window.routes = {
        cart: @json(route('user.cart')),
        checkout: @json(route('user.checkout'))
        compare: @json(route('user.compare'))
        wishlist: @json(route('user.wishlist'))

    };
</script>
<!-- Plugin JS File -->
<script src="{{ asset('assets/user/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/user/vendor/jquery.plugin/jquery.plugin.min.js') }}"></script>
<script src="{{ asset('assets/user/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/user/vendor/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/user/vendor/zoom/jquery.zoom.js') }}"></script>
<script src="{{ asset('assets/user/vendor/jquery.countdown/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('assets/user/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/user/vendor/skrollr/skrollr.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('assets/user/js/main.js') }}"></script>

@yield('script')
