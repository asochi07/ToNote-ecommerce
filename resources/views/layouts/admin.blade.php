<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ToNote-ecommerce') }}</title>

    <!-- Styles -->
    <link href="{{ asset('admin/vendor/owl-carousel/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/owl-carousel/css/owl.theme.default.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('admin/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
</head>
<body>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->
    
    <div id="main-wrapper">
        @include('layouts.inc.navbar')
        @include('layouts.inc.sidebar')
        <div class="content-body">
            @yield('content-body')
        </div>
        @include('layouts.inc.footer')
    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('admin/vendor/global/global.min.js') }}" defer></script>
    <script src="{{ asset('admin/js/quixnav-init.js') }}" defer></script>
    <script src="{{ asset('admin/js/custom.min.js') }}" defer></script>


    <!-- Vectormap -->
    {{-- <script src="{{ asset('admin/vendor/raphael/raphael.min.js') }}" defer></script> --}}
    <script src="{{ asset('admin/vendor/morris/morris.min.js') }}" defer></script>


    {{-- <script src="./vendor/circle-progress/circle-progress.min.js"></script>
    <script src="./vendor/chart.js/Chart.bundle.min.js"></script> --}}

    <!-- <script src="./vendor/gaugeJS/dist/gauge.min.js"></script> -->

    <!--  flot-chart js -->
    {{-- <script src="./vendor/flot/jquery.flot.js"></script>
    <script src="./vendor/flot/jquery.flot.resize.js"></script> --}}

    <!-- Owl Carousel -->
    <script src="{{ asset('admin/vendor/owl-carousel/js/owl.carousel.min.js') }}" defer></script>

    <!-- Counter Up -->
    {{-- <script src="./vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="./vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="./vendor/jquery.counterup/jquery.counterup.min.js"></script> --}}

    <script src="{{ asset('admin/js/dashboard/dashboard-1.js') }}" defer></script>

    @yield('script')
</body>
</html>
