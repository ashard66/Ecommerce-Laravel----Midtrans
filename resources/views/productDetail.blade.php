@extends('layouts.master')
@section('title')
    Produk Detail
@endsection
@section('content')
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Shop</h4>
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}">Home</a>
                        <a href="{{ route('shop') }}">Shop</a>
                        <span>Product Details</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- Shop Details Section Begin -->
<section class="shop-details">
    <div class="product__details__pic product_data">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__pic__item">
                                <img class="shadow" src="{{ asset('file/'.$product->gambar) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <h4>{{ $product->nama }} - {{ $product->category->nama }}</h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <span> - 5 Reviews</span>
                        </div>
                        <h3>Rp. {{ number_format($product->harga) }} </h3>
                        <p>{{ $product->keterangan }} Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas error libero, optio natus aut dolores id harum nobis perferendis neque asperiores temporibus nam iusto sunt aperiam in ullam accusamus iure. </p>
                        @if ($product->stok > 0)
                            <label class="badge bg-success">Stok : <span>{{ $product->stok }}</span></label>
                        @else
                            <label class="badge bg-danger">Out of Stok</label>
                        @endif
                        <div class="product__details__cart__option">
                            <input type="hidden" value="{{ $product->id }}" class="product_id">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input class="jumlah_product" type="text" value="1">
                                </div>
                            </div>
                            <button type="button" class="primary-btn addCartBtn" @if ($product->stok == 0) disabled @endif><i class="fa fa-cart-plus"></i> add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Details Section End -->

@include('layouts.footer')
@endsection
@push('js')
<script>
    $(document).ready(function () {
        $('.addCartBtn').click(function (e) { 
            e.preventDefault();

            var product_id = $(this).closest('.product_data').find('.product_id').val();
            var jumlah_product = $(this).closest('.product_data').find('.jumlah_product').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "{{ route('add.cart') }}",
                data: {
                    'product_id' : product_id,
                    'jumlah_product' : jumlah_product
                },
                success: function (response) {
                    alert(response.status);
                }
            });
        });
    });
</script>
@endpush
    

