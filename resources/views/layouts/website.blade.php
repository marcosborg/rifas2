<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@lang('panel.site_title')</title>
    <meta content="Campanhas de angariação de fundos realizadas através da venda de rifas" name="description">

    <!-- Favicons -->
    <link href="/website/assets/img/favicon.png" rel="icon">
    <link href="/website/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/website/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/website/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/website/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="/website/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/website/assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS Files -->
    <link href="/website/assets/css/variables.css" rel="stylesheet">
    <link href="/website/assets/css/main.css" rel="stylesheet">

    @yield('head')

    @yield('styles')

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="/" class="logo d-flex align-items-center">
                <img src="{{ url('assets/logo7-horizontal.svg') }}" width="200">
            </a>

            <x-navbar />

            <i class="bi bi-list mobile-nav-toggle"></i>

        </div>

    </header><!-- End Header -->

    <main id="main">

        @yield('content')

    </main><!-- End #main -->

    <x-footer />

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="/website/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/website/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/website/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/website/assets/vendor/aos/aos.js"></script>
    <script src="/website/assets/vendor/php-email-form/validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Template Main JS File -->
    <script src="/website/assets/js/main.js"></script>

    @yield('scripts')

</body>

</html>