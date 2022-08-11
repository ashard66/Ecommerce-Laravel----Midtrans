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
                                    <form action="{{ route('store.product') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <label>Provinsi</label>
                                        <div class="input-group">
                                            <select class="form-select" name="id_categories" label="id_categories" id="id_categories">
                                                <option value="">Pilih Provinsi</option>
                                            </select>
                                        </div>
                                        <label>Kota</label>
                                        <div class="input-group">
                                            <select class="form-select" name="id_categories" label="id_categories" id="id_categories">
                                                <option value="">Pilih Kota</option>
                                            </select>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Tambah</button>
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