<script>
    window.routes = {
        cart: @json(route('user.cart')),
        checkout: @json(route('user.checkout')),
        compare: @json(route('user.compare')),
        wishlist: @json(route('user.wishlist')),

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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addToCartButtons = document.querySelectorAll('.btn-cart');

        // Quantity plus/minus handlers
        document.querySelectorAll('.quantity-plus').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const productId = this.dataset.productId;
                const input = document.querySelector(
                    `.quantity[data-product-id="${productId}"]`);
                input.value = parseInt(input.value) + 1;
            });
        });

        document.querySelectorAll('.quantity-minus').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const productId = this.dataset.productId;
                const input = document.querySelector(
                    `.quantity[data-product-id="${productId}"]`);
                if (parseInt(input.value) > 1) {
                    input.value = parseInt(input.value) - 1;
                }
            });
        });

        addToCartButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const productId = this.dataset.productId;
                const quantityInput = document.querySelector(
                    `.quantity[data-product-id="${productId}"]`);
                const qty = quantityInput ? parseInt(quantityInput.value) || 1 : 1;

                fetch('{{ route('user.cart.add') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            product_id: productId,
                            qty: qty
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            updateMiniCart();
                            alert('Product added to cart!');
                        } else {
                            alert(data.message || 'Failed to add product to cart.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        });

        function updateMiniCart() {
            fetch('{{ route('user.cart.mini') }}')
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('header-cart').innerHTML = data.html;
                    }
                });
        }
    });
</script>
