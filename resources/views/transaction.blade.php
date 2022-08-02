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
@push('js')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script>
        
    </script>
@endpush
{{-- // const payButton = document.querySelector('#pay-button');
        // payButton.addEventListener('click', function(e) {
        //     e.preventDefault();

        //     snap.pay('{{ $snap }}', {
        //         // Optional
        //         onSuccess: function(result) {
        //             /* You may add your own js here, this is just example */
        //             // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
        //             console.log(result)
        //         },
        //         // Optional
        //         onPending: function(result) {
        //             /* You may add your own js here, this is just example */
        //             // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
        //             console.log(result)
        //         },
        //         // Optional
        //         onError: function(result) {
        //             /* You may add your own js here, this is just example */
        //             // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
        //             console.log(result)
        //         }
        //     });
        // }); --}}