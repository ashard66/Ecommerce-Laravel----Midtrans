@push('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@extends('layouts.master')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Check Out</h4>
                        <div class="breadcrumb__links">
                            <a href="{{ route('home') }}">Home</a>
                            <a href="{{ route('shop') }}">Shop</a>
                            <span>Check Out</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="{{ route('order') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="checkout__title">Billing Details</h6>
                                    <input type="hidden" value="6" class="form-control" name="province_origin">
                                    <input type="hidden" value="40" class="form-control" id="city_origin" name="city_origin">
                                <div class="checkout__input">
                                    <p>Name<span>*</span></p>
                                    <input type="text" value="{{ Auth()->user()->name }}" name="nama">
                                </div>
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="text" name="phone">
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label for="provinsi">Provinsi</label>
                                        <div class="input-group">
                                            <select name="provinsi_id" id="provinsi_id" class="form-control scroll-select">
                                                <option value="0">Pilih Provinsi</option>
                                                @foreach ($provinsi as $item)
                                                    <option value="{{ $item['province'] }}" data-id="{{ $item['province_id'] }}">{{ $item['province'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" nama="nama_provinsi" id="nama_provinsi"
                                                placeholder="ini untuk menangkap nama provinsi ">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="kabupaten">Kabupaten</label>
                                        <div class="input-group">
                                            <select name="kota_id" id="kota_id" class="form-control scroll-select">
                                                <option value="0">Pilih Kabupaten</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" nama="nama_kota" id="nama_kota"
                                                placeholder="ini untuk menangkap nama kota ">
                                        </div>
                                    </div>
                                </div>
                                <label for="alamat">Alamat</label>
                                <div class="checkout__input">
                                    <input type="text" name="alamat" class="checkout__input__add">
                                </div>
                                <label>Pilih Ekspedisi</label>
                                <div class="input-group mb-3">
                                    <select name="kurir" id="kurir" class="form-control">
                                        <option value="">Pilih kurir</option>
                                        <option value="jne">JNE</option>
                                        <option value="tiki">TIKI</option>
                                        <option value="pos">POS INDONESIA</option>
                                    </select>
                                </div>
                                <label>Pilih Layanan</label>
                                <div class="input-group">
                                    <select name="layanan" id="layanan" class="form-control scroll-select">
                                        <option value="">Pilih layanan</option>
                                    </select>
                                </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Your order</h4>
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th class="text-left">Product</th>
                                            <th class="text-center">Qty</th>
                                            <th class="text-right">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total = 0;
                                            $totalberat = 0;
                                        @endphp
                                        @foreach ($cart as $item)
                                            <tr>
                                                <td class="text-left">{{ $item->products->nama }}</td>
                                                <td class="text-center">{{ $item->jumlah_product }}</td>
                                                <td class="text-right">Rp.{{ number_format($item->products->harga) }}</td>
                                            </tr>
                                            @php
                                                $total += $item->products->harga * $item->jumlah_product;
                                                $totalberat += $item->products->berat * $item->jumlah_product;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th class="text-left">Total Berat</th>
                                            <th></th>
                                            <th class="text-right">{{ $totalberat }} gram</th>
                                        </tr>
                                    </thead>
                                </table>
                                    <input type="hidden" name="berat" id="berat" value="{{ $totalberat }}">
                                    <input type="hidden" name="totalbelanja" id="totalbelanja" value="{{ $total }}">
                                    <ul class="checkout__total__all">
                                        <li>Subtotal <span>Rp.{{ number_format($total) }}</span></li>
                                        <li>Ongkos Kirim <span id="ongkoskirim">Rp.0</span></li>
                                        <li>Total <span id="total">Rp.{{ number_format($total) }}</span></li>
                                        <input type="hidden" name="shipping_cost" id="shipping_cost">
                                    </ul>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
    @include('layouts.footer')

@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
    integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.scroll-select').select2();

            $('select[name="provinsi_id"]').on('change', function() {
                // let provinsiid = $(this).data('id');
                var provinsiid = $('#provinsi_id option:selected').data('id');
                var getnamaprovinsi = $("#provinsi_id option:selected").attr("nama_provinsi");
                $("#nama_provinsi").val(getnamaprovinsi);


                
                    $.ajax({
                        url: "/kota/" + provinsiid,
                        method: "GET",
                        dataType: "json",
                        success: function(data) {
                            if (data) {
                                $('select[name="kota_id"]').empty();
                                $.each(data, function(key, value) {
                                    $('select[name="kota_id"]').append('<option value="' +value.city_name + '" data-id="' + value.city_id + '">' + value.type +' ' + value.city_name + '</option>');
                                });
                                cekCost();
                            } else {
                                $('select[name="kota_id"]').empty();
                            }

                        }
                    });
            });

            $('select[name="kota_id"').on('change', function () {
                var getnamakota = $("#kota_id option:selected").attr("namakota");
                $("#nama_kota").val(getnamakota);
            });

            function cekCost() {
                let origin = $("input[name=city_origin]").val();
                let destination = $('#kota_id option:selected').data('id');
                let courier = $("select[name=kurir]").val();
                let weight = $("input[name=berat]").val();

                if(courier){
                    $.ajax({
                        url:"/origin="+origin+"&destination="+destination+"&weight="+weight+"&courier="+courier,
                        method:"GET",
                        dataType:"json",
                        success:function(data){
                            $('#layanan').empty();
                            $.each(data[0].costs, function(key, cost) {
                                $('select[name="layanan"]').append('<option value="' + cost.service + ' Rp.' + cost.cost[0].value + ' Estimasi ' +
                                    cost.cost[0].etd +
                                    '" data-ongkir="'+cost.cost[0].value+'">' + cost.service + ' Rp.' + cost.cost[0].value + ' Estimasi ' +
                                    cost.cost[0].etd +
                                    '</option>');
                                if (key == 0) {
                                    countCost(cost.cost[0].value)
                                }
                            });
                        },
                    });
                } else {
                    $('#layanan').empty();
                }
            };

            $('#kota_id').on('change', function () {
                cekCost();
            });

            $('#kurir').on('change', function () {
                cekCost();
            });

            $('select[name="layanan"').on('change', function () {
                var ongkir = parseInt($('#layanan option:selected').data('ongkir'));
                countCost(ongkir);
                
            });

            function countCost(ongkir) {
                var totalbelanja = `{{ $total }}`;
                var total = parseInt(totalbelanja) + ongkir;

                $("#ongkoskirim").text(rupiah(ongkir));
                $('#shipping_cost').val(ongkir);
                $("#total").text(rupiah(total));
            }

            function rupiah(angka) {

                var number_string = angka.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join(',');
                }

                return 'Rp.' + rupiah;
            }

        });
    </script>
@endpush