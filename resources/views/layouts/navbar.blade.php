<!-- Header Section Begin -->
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('malefashion/img/logo.png') }}" alt="">
                        <span class="mobile-menu font-weight-bold text-dark"> Majestic Store</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                        <li class="{{ Request::is('shop') ? 'active' : '' }}"> <a href="{{ route('shop') }}">Shop</a></li>
                        <li class="{{ Request::is('cart') ? 'active' : '' }}"><a href="{{ route('cart') }}">Cart</a></li>
                        @auth
                            <li><a href=""><i class="fa fa-angle-down"></i> {{ auth()->user()->name }}</a>
                                <ul class="dropdown">
                                    <li><a href="{{ route('order') }}">Riwayat Belanja</a></li>
                                    <li><a href="#">Pengaturan Akun</a></li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                      this.closest('form').submit();">
                                                Logout
                                            </a>
                                        </li>
                                    </form>
                                </ul>
                            </li>
                        @else
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @endauth
                    </ul>
                </nav>
            </div>
            {{-- <div class="col-lg-3 col-md-3">
                <div class="header__menu ">
                    <a href="#"><img src="malefashion/img/icon/cart.png" alt=""> <span class="text-dark"></span></a>
                </div>
            </div> --}}
        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</header>
<!-- Header Section End -->
