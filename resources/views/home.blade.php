@extends('layouts.master')
@section('title')
    Home
@endsection
@section('content')
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__items set-bg" data-setbg="malefashion/img/hero/hero-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>Welcome to</h6>
                                <h2>Majestic Store</h2>
                                <p>A specialist label creating luxury essentials. Ethically crafted with an unwavering
                                    commitment to exceptional quality.</p>
                                <a href="{{ route('shop') }}" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__items set-bg" data-setbg="malefashion/img/hero/hero-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>Welcome to</h6>
                                <h2>Majestic Store</h2>
                                <p>A specialist label creating luxury essentials. Ethically crafted with an unwavering
                                    commitment to exceptional quality.</p>
                                <a href="#" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
    <section class="shop spad">
        <div class="container">
            <div class="col-lg-12">
                <div class="shop__product__option__left">
                    <h2 class="card-heading-shop">Latest Product</h2>
                </div>
                <div class="row mt-5">
                    @foreach ($data['latest_product'] as $item)
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg">
                                    <a href="{{ route('product.detail',$item->id) }}">
                                        <img src="{{ asset('file/'.$item->gambar) }}" class="img-thumbnail" alt="Responsive image">
                                    </a>
                                </div>
                                <div class="product__item__text">
                                    <h6>{{ $item->nama }} - {{ $item->category->nama }}</h6>
                                    <a href="{{ route('product.detail',$item->id) }}" class="add-cart"><i class="fa fa-eye"></i> Lihat Detail</a>
                                    <h5>Rp.{{ number_format($item->harga) }}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Instagram Section Begin -->
    <section class="instagram">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5">
                    <div class="instagram__pic">
                        <div class="instagram__pic__item set-bg" data-setbg="malefashion/img/instagram/instagram-1.jpeg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="malefashion/img/instagram/instagram-2.jpeg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="malefashion/img/instagram/instagram-3.jpeg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="malefashion/img/instagram/instagram-4.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="malefashion/img/instagram/instagram-5.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="malefashion/img/instagram/instagram-6.jpg"></div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="instagram__text">
                        <h2>Instagram</h2>
                        <a href="https://www.instagram.com/persadamajestic.store/">
                            <h3><i class="fa fa-instagram"></i> persadamajestic.store</h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Instagram Section End -->
@include('layouts.footer')

    <!-- Product Section End -->
@endsection