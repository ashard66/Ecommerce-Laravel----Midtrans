@extends('layouts.master')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
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
                                    <th>Products</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-primary btn-icon icon-left" id="pay-button"><i
                            class="fa fa-credit-card"></i>Process Payment</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

