@extends('layouts.master')
@section('content')
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="{{ route('home') }}">Home</a>
                            <a href="{{ route('shop') }}">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr class="text center">
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $item)
                                    <tr class="product-data">
                                        <td class="product__cart__item">
                                            <div class="product__cart__item__pic">
                                                <img width="70px" src="{{ asset('file/'.$item->products->gambar) }}" alt="">
                                            </div>
                                            <div class="product__cart__item__text">
                                                <h5>{{ $item->products->nama }}</h5>
                                            </div>
                                        </td>
                                        <td class="cart__price">Rp.{{ number_format($item->products->harga) }}</td>
                                        <input type="hidden" value="{{ $item->product_id }}" class="product_id">
                                        <td class="quantity__item">
                                            <div class="quantity">
                                                <div class="pro-qty-2">
                                                    <input type="text" value="{{ $item->jumlah_product }}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart__price">$ 30.00</td>
                                        <td class="cart__close"><button class="btn delete-cart"><i class="fa fa-trash"></i></button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="#">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a href="#"><i class="fa fa-spinner"></i> Update cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>$ 169.50</span></li>
                            <li>Total <span>$ 169.50</span></li>
                        </ul>
                        <a href="#" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
@include('layouts.footer')
@endsection
@push('js')
    <script>
        $('.delete-cart').click(function (e) { 
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var product_id = $(this).closest('.product-data').find('.product_id').val();
            $.ajax({
                method: "POST",
                url: "{{ route('delete.cart') }}",
                data: {
                    'product_id' : product_id,
                },
                success: function (response) {
                    window.location.reload()
                    alert(response.status)
                }
            });
        });
    </script>
@endpush
