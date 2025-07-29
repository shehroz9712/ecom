<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>{{ $settings->title }}</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="{{ $settings->description }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/uploads/logo/' . $settings->favicon) }}">

    <!-- WebFont.js') }} -->
    <script>
        WebFontConfig = {
            google: {
                families: ['Poppins:400,500,600,700,800']
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = '{{ asset('assets/user/js/webfont.js') }}';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <link rel="preload" href="{{ asset('assets/user/vendor/fontawesome-free/webfonts/fa-regular-400.woff2') }}"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="{{ asset('assets/user/vendor/fontawesome-free/webfonts/fa-solid-900.woff2') }}"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="{{ asset('assets/user/vendor/fontawesome-free/webfonts/fa-brands-400.woff2') }}"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="{{ asset('assets/user/fonts/wolmart.ttf?png09e') }}" as="font" type="font/ttf"
        crossorigin="anonymous">

    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/user/vendor/fontawesome-free/css/all.min.css') }}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/user/vendor/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/user/vendor/animate/animate.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/user/vendor/magnific-popup/magnific-popup.min.css') }}">

    <!-- Default CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/user/css/style.min.css') }}">
    {!! $settings->header_script !!}
    @yield('css')

    <style>
        .main {
            margin-top: 3rem !important;
        }

        .btn {
            border-radius: 10px !important;
        }

        .invalid-feedback {
            color: red !important;
        }

        a.added.btn-product-icon.btn-wishlist.w-icon-heart-full {
            color: red;
        }

        /* Hide scrollbar but keep scrolling */
        body::-webkit-scrollbar {
            width: 8px;
        }

        body::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        body::-webkit-scrollbar-thumb {
            background-color: #bb4345;
            border-radius: 4px;
        }

        body::-webkit-scrollbar-thumb:hover {
            background: #9d1619;
        }

        .show a.category-toggle.text-dark {
            background-color: #9d1619;
        }

        .social-icons-colored .social-icon {
            background: white !important;
            border-color: #9d1619 !important;
            color: #9d1619 !important;
        }

        .social-icons-colored .social-icon:hover {
            background: #9d1619 !important;
            border-color: #9d1619 !important;
            color: white !important;
        }

        .whatsapp-float {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 999;
            background-color: #25D366;
            border-radius: 50%;
            padding: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s;
        }

        .whatsapp-float:hover {
            transform: scale(1.1);
        }

        .whatsapp-float img {
            width: 40px;
            height: 40px;
        }

        a.social-icon,
        .social-icons-colored .social-icon {
            background: white !important;
            border-color: #9d1619 !important;
            color: #9d1619 !important;
        }

        a.social-icon:hover,
        .social-icons-colored .social-icon:hover {
            background: #9d1619 !important;
            border-color: #9d1619 !important;
            color: white !important;
        }
    </style>
</head>
