@extends('layouts.master')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                        <a href="{{ url('checkout') }}"><i class="fa fa-home"></i> Checkout</a>
                        <span>Transaction</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive table-invoice">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th>Invoice ID</th>
                                    {{-- <th>Products</th> --}}
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($dataOrder as $order)
                                <tr>
                                    <td><a href="{{ route('transaction',$order->invoice) }}">{{ $order->invoice }}</a></td>
                                    {{-- <td class="font-weight-600">{{ $order->one_product }}</td> --}}
                                    <td>{!! $order->status_name !!}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>
                                    <a href="{{ route('transaction',$order->invoice) }}" class="btn btn-danger">Detail</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
