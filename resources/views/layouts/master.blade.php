<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('malefashion/css/custom.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('malefashion/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('malefashion/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('malefashion/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('malefashion/css/magnific-popup.css') }}" type="text/css">
    {{-- <link rel="stylesheet" href="{{ asset('malefashion/css/nice-select.css') }}" type="text/css"> --}}
    <link rel="stylesheet" href="{{ asset('malefashion/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('malefashion/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('malefashion/css/style.css') }}" type="text/css">
    @stack('style')
</head>

<body>
     <!-- Offcanvas Menu Begin -->
     <div class="offcanvas-menu-overlay"></div>
     <div class="offcanvas-menu-wrapper">
         <div class="offcanvas__option">
             <div class="offcanvas__links">
                 <a href="{{ route('login') }}">Login</a>
             </div>
         </div>
         <div id="mobile-menu-wrap"></div>
     </div>
     @include('layouts.navbar')
    <main>
        @yield('content')
    </main>

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    {{-- <script src="{{ asset('malefashion/js/jquery-3.3.1.min.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('malefashion/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('malefashion/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('malefashion/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('malefashion/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('malefashion/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('malefashion/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('malefashion/js/owl.carousel.min.js') }}"></script>
    {{-- <script src="{{ asset('malefashion/js/jquery.nice-select.min.js') }}"></script> --}}
    <script src="{{ asset('malefashion/js/main.js') }}"></script>
    @stack('js')
</body>
</html>