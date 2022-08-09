@extends('layouts.dashboard.master')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        @include('layouts.dashboard.navbar')
        <div class="container-fluid py-4">
            <div class="row my-4">
                <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                    <div class="card">
                        <div class="invoice" style="border-top: 2px solid #6777ef;">
                            <div class="invoice-print">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="text-md-right">
                                            <div class="mb-lg-0 mb-3">
                                                <button class="btn btn-success btn-icon icon-left" data-toggle="modal"
                                                    data-target="#resiModal" data-id="{{ $orderDetail->invoice }}"><i
                                                        class="fa fa-truck"></i>
                                                    Input Resi</button>
                                                <a href="{{ route('order.transaction') }}"
                                                    class="btn btn-primary btn-icon icon-left"><i class="fa fa-arrow-left"></i>
                                                    Kembali</a>
                                            </div>
                                        </div>
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
                                                        {!! $orderDetail->status_name_text !!}
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
                                                        <strong>Nomor Resi :</strong>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('modal')
    <div class="modal fade" id="resiModal" tabindex="-1" role="dialog" aria-labelledby="resiModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('input.resi') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="resiModalLabel">Input Resi Pengiriman</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Nomor Pesanan</label>
                            <input type="text" class="form-control" name="invoice" id="invoice"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Resi</label>
                            <input type="text" class="form-control" name="resi" id="resi"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endpush
@push('js')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $('#resiModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            $('#invoice').val(id);
        });
    </script>
@endpush