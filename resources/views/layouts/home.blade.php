<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>

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
    <link rel="stylesheet" href="{{ asset('malefashion/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('malefashion/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('malefashion/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('malefashion/css/style.css') }}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="malefashion/img/logo.png" alt="">
                            <span class="mobile-menu font-weight-bold text-dark"> Majestic Store</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="./shop.html">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="./about.html">About Us</a></li>
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shopping-cart.html">Shopping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="./contact.html">Contacts</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__menu ">
                        {{-- <a href="#"><img src="malefashion/img/icon/cart.png" alt=""> <span>0</span></a> --}}
                            <ul class="navbar-nav">
                                <!-- Authentication Links -->
                                @guest
                                    @if (Route::has('login'))
                                        <li class="navbar_auth">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{-- {{ Auth::user()->name }} --}}
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                              </svg>
                                        </a>
        
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
        
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->

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
    <script src="{{ asset('malefashion/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('malefashion/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('malefashion/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('malefashion/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('malefashion/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('malefashion/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('malefashion/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('malefashion/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('malefashion/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('malefashion/js/main.js') }}"></script>
</body>

</html>