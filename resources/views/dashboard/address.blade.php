@extends('layouts.dashboard.master')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('layouts.dashboard.navbar')
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4 col-md-6 mx-auto">
                        <div class="card-header pb-0">
                            <h6>Alamat Pengiriman</h6>
                        </div>

                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <div class="card-body mx-auto">
                                    <form action="" enctype="multipart/form-data">
                                        @csrf
                                        <label>Provinsi</label>
                                        <div class="input-group">
                                            <select class="form-select" name="provinsi_id" id="province_id">
                                                @foreach ($data['provinsi'] as $province)
                                                    <option value="{{ $province['province_id'] }}" {{ $data['shipping']->provinsi_id == $province['province_id'] ? 'selected' : '' }}>{{ $province['province'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <label>Kota</label>
                                        <div class="input-group">
                                            <select class="form-select" name="kota_id" id="city_id">
                                                {{-- @foreach ($data['kota'] as $city)
                                                    <option value="{{ $city['city_id'] }}" {{ $data['shipping']->kota_id == $city['city_id'] ? 'selected' : '' }}>{{ $city['type'] }} {{ $city['city_name'] }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('layouts.dashboard.footer')
            </div>
    </main>
@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('#province_id').on('change', function() {
    var provinceId = $('#province_id option:selected').val();
    $('#city_id').empty();
    $('#city_id').append('<option value="">-- Loading Data --</option>');
    $.ajax({
        url: '/kota/' + provinceId,
        type: "GET",
        dataType: "json",
        success: function(data) {
            if (data) {
                $('#city_id').empty();
                $('#city_id').removeAttr('disabled');
                $('select[name="city_id"]').append(
                    'option value="" selected>-- Select City --</option>');
                $.each(data, function(key, city) {
                    $('select[name="city_id"]').append('<option value="'+city.city_id+'">' + city.type + ' ' + city.city_name +
                        '</option>');
                });
            } else {
                $('#city_id').empty();
            }
        }
    });
});
</script>
@endpush