@extends('layouts.master')
@section('title')
    Order Detail
@endsection
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                        <a href="{{ route('order') }}"> Order</a>
                        <span>{{ $orderDetail->invoice }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice" style="border-top: 2px solid #6777ef;">
                        <div class="invoice-print">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="invoice-title">
                                        <h2>Invoice</h2>
                                        <div class="invoice-number">Order {{ $orderDetail->invoice }}</div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <address>
                                                <strong>Dibayar Oleh :</strong><br>
                                                {{ $orderDetail->User->name }}<br>
                                                {{ $orderDetail->User->email }}<br>
                                            </address>
                                        </div>
                                        <div class="col-md-6 text-md-right">
                                            <address>
                                                <strong>Dikirim Ke :</strong><br>
                                                {{ $orderDetail->name }}<br>
                                                {{ $orderDetail->alamat }}<br>
                                                {{ $orderDetail->destination }}
                                            </address>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <address>
                                                <strong>Status Pesanan :</strong>
                                                <div class="mt-2">
                                                    {!! $orderDetail->status_name !!}
                                                </div>
                                            </address>
                                        </div>
                                        <div class="col-md-6 text-md-right">
                                            <address>
                                                <strong>Tanggal Order :</strong><br>
                                                {{ $orderDetail->created_at }}<br><br>
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="section-title font-weight-bold text-left">Rincian Order</div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-md">
                                            <tbody>
                                                <tr>
                                                    <th data-width="40" style="width: 40px;">#</th>
                                                    <th>Nama</th>
                                                    <th class="text-center">Harga</th>
                                                    <th class="text-center">Jumlah</th>
                                                </tr>
                                                @foreach ($orderDetail->Order()->get() as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->Product->nama }}</td>
                                                        <td class="text-center">{{ number_format($item->Product->harga) }}
                                                        </td>
                                                        <td class="text-center">{{ $item->jumlah_pesanan }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-lg-8">
                                            <address>
                                                <strong>Metode Pengiriman :</strong>
                                                <div class="mt-2">
                                                    <p class="section-lead text-uppercase">{{ $orderDetail->kurir }}
                                                        {{ $orderDetail->layanan }}</p>
                                                </div>
                                            </address>
                                            @if ($orderDetail->resi != null)
                                                <address>
                                                    <strong>Nomor Resi : </strong>
                                                    <div class="mt-2">
                                                        <p class="section-lead text-uppercase">
                                                            {{ $orderDetail->resi }}</p>
                                                    </div>
                                                </address>
                                            @endif
                                        </div>
                                        <div class="col-lg-4 text-right">
                                            <div class="invoice-detail-item">
                                                <strong>Subtotal :</strong>
                                                <div class="invoice-detail-value">Rp.{{ number_format($orderDetail->subtotal) }}
                                                </div>
                                            </div>
                                            <div class="invoice-detail-item">
                                                <strong>Biaya Pengiriman :</strong>
                                                <div class="invoice-detail-value">Rp.{{ number_format($orderDetail->shipping_cost) }}</div>
                                            </div>
                                            <hr class="mt-2 mb-2">
                                            <div class="invoice-detail-item">
                                                <strong>Total :</strong>
                                                <div class="invoice-detail-value invoice-detail-value-lg">Rp.{{ number_format($orderDetail->total_harga) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="text-md-right">
                            <div class="float-lg-left mb-lg-0 mb-3">
                                @if ($orderDetail->status == 0)
                                    <button class="btn btn-primary btn-icon icon-left" id="pay-button"><i
                                            class="fa fa-credit-card"></i>
                                        Metode Pembayaran</button>
                                    <a href="{{ route('transaction.canceled',$orderDetail->invoice) }}" class="btn btn-danger btn-icon icon-left"><i class="fa fa-times"></i>
                                        Cancel</a>
                                @elseif ($orderDetail->status == 2)
                                    <a href="{{ route('transaction.received', $orderDetail->invoice) }}"
                                        class="btn btn-primary text-white btn-icon icon-left"><i
                                            class="fa fa-credit-card"></i>
                                        Pesanan Selesai</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    <script>
        const payButton = document.querySelector('#pay-button');
        payButton.addEventListener('click', function(e) {
            e.preventDefault();

            snap.pay('{{ $snapToken }}', {
                // Optional
                onSuccess: function(result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result)
                },
                // Optional
                onPending: function(result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result)
                },
                // Optional
                onError: function(result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result)
                }
            });
        });
    </script>
@endpush
