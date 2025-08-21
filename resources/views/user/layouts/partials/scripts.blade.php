<!-- Global Routes -->
<script>
    window.routes = {
        cart: @json(route('user.cart')),
        checkout: @json(route('user.checkout')),
        compare: @json(route('user.compare')),
        wishlist: @json(route('user.wishlist')),
        cartUpdateQty: @json(route('user.cart.updateQty')),
        cartAdd: @json(route('user.cart.add')),
        cartMini: @json(route('user.cart.mini')),
        wishlistToggle: @json(route('user.wishlist.toggle')),
    };
</script>

<!-- jQuery and Plugin Scripts -->
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "showDuration": "30000",
        "hideDuration": "10000",
        "timeOut": "50000",
        "extendedTimeOut": "10000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "closeButton": true,
        "progressBar": true
    }

    @if (Session::has('success'))

        toastr.success("{{ session('success') }}");
    @endif

    @if (!empty($errors->all()))
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}")
        @endforeach
    @endif

    @if (Session::has('error'))

        toastr.error("{{ session('error') }}");
    @endif

    @if (Session::has('info'))

        toastr.info("{{ session('info') }}");
    @endif

    @if (Session::has('warning'))

        toastr.warning("{{ session('warning') }}");
    @endif
</script>
<!-- Global AJAX Loader -->
<script>
    $(document).ajaxSend(function() {
        $('#ajax-loader').fadeIn();
    }).ajaxComplete(function() {
        $('#ajax-loader').fadeOut();
    });
</script>
@php
    $isUserAuthenticated = auth()->check();
@endphp
<!-- Quantity + Wishlist + Cart AJAX -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.btn-wishlist').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();

                var isUserAuthenticated = {{ json_encode($isUserAuthenticated) }};

                if (!isUserAuthenticated) {
                    localStorage.setItem('error',
                        'Please login first to add items to your wishlist.');
                    window.location.href = "{{ route('login') }}";
                    return;
                }
                const productId = this.dataset.productId;

                fetch(window.routes.wishlistToggle, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            product_id: productId
                        })
                    })
                    .then(async response => {
                        const data = await response.json();

                        if (response.status === 401 && data.redirect) {
                            // User not logged in, redirect to login page
                            window.location.href = data.redirect;
                        } else {
                            alert(data.message || 'Added to wishlist!');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        });
        // Quantity +/-
        document.querySelectorAll('.quantity-plus').forEach(button => {
            button.addEventListener('click', function() {
                const form = this.closest('form');
                const input = form.querySelector('input[name="qty"]');
                const itemId = form.dataset.cartId;
                const newQty = parseInt(input.value) + 1;
                updateQuantity(itemId, newQty);
            });
        });

        document.querySelectorAll('.quantity-minus').forEach(btn => {
            btn.addEventListener('click', function() {
                const form = this.closest('form');
                const input = form.querySelector('input[name="qty"]');
                const itemId = form.dataset.cartId;
                let newQty = parseInt(input.value);
                if (newQty > 1) {
                    newQty -= 1;
                    updateQuantity(itemId, newQty);
                }
            });
        });

        // Update Cart Qty
        function updateQuantity(itemId, qty) {
            $('#ajax-loader').fadeIn();
            fetch(window.routes.cartUpdateQty, {
                    method: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        cart_id: itemId,
                        qty: qty
                    })
                })
                .then(res => res.json())
                .then(data => {
                    $('#ajax-loader').fadeOut();

                    if (data.success) {
                        const form = document.querySelector(`form[data-cart-id="${itemId}"]`);
                        const input = form.querySelector('input[name="qty"]');
                        input.value = qty;

                        const row = form.closest('tr');
                        row.querySelector('.product-subtotal .amount').textContent = data.item_subtotal;
                        // ✅ Update cart total row
                        const totalEl = document.querySelector(' .cart-total .amount');
                        if (totalEl) totalEl.textContent = data.total;
                        row.classList.add('flash');
                        setTimeout(() => row.classList.remove('flash'), 300);

                        updateMiniCart();
                    } else {
                        alert(data.message || 'Update failed.');
                    }
                }).catch(err => {
                    $('#ajax-loader').fadeOut();
                    console.error(err);
                    alert('Something went wrong.');
                });
        }

        // Add to Cart
        document.querySelectorAll('.btn-cart').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const productId = this.dataset.productId;
                const qtyInput = document.querySelector(
                    `.quantity[data-product-id="${productId}"]`);
                const qty = qtyInput ? parseInt(qtyInput.value) || 1 : 1;
                const variantInput = document.getElementById('selected_variant_id');
                const variantId = variantInput ? variantInput.value : null;
                let price;
                if (variantId && $('.variant-price').length) {
                    // Get variant price (remove currency symbol if present)
                    price = $('.variant-price').text().replace(/[^0-9.]/g, '');
                } else {
                    // Get regular product price (remove currency symbol if present)
                    price = $('.product-price .new-price').text().replace(/[^0-9.]/g, '');
                }
                fetch(window.routes.cartAdd, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            product_id: productId,
                            qty: qty,
                            price: price, // Added price parameter
                            variant_id: variantId
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            updateMiniCart();
                        } else {
                            alert(data.message || 'Could not add to cart.');
                        }
                    });
            });
        });

        // Mini Cart Refresh
        function updateMiniCart() {
            fetch(window.routes.cartMini)
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('header-cart').innerHTML = data.html;
                    }
                });
        }
    });
</script>
