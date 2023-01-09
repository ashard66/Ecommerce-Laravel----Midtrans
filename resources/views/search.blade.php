@extends('layouts.master')
@section('title')
    Search
@endsection
@section('content')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Shop</h4>
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}">Home</a>
                        <a href="{{ route('shop') }}">Shop</a>
                        <span>Search</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shop Section Begin -->
<section class="shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop__product__option">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__left">
                                <h4 class="card-heading-shop">Hasil Pencarian : </h4>
                                <span>{{ $data['product']->count() }} Produk</span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__sidebar__search">
                                <form action="{{ route('search') }}">
                                    <input type="text" name="cari" placeholder="Search...">
                                    <button type="submit"><span class="icon_search"></span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($data['product'] as $item)
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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            {{ $data['product']->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Section End -->
@include('layouts.footer')

@endsection