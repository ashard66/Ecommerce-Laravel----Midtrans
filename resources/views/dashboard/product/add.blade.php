@extends('layouts.dashboard.master')
@section('title')
    Dashboard Produk
@endsection
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('layouts.dashboard.navbar')
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4 col-md-6 mx-auto">
                        <div class="card-header pb-0">
                            <h6>Tambah Produk</h6>
                        </div>

                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <div class="card-body mx-auto">
                                    <form action="{{ route('store.product') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <label>Kategori</label>
                                        <div class="input-group">
                                            <select class="form-select" name="id_categories" label="id_categories" id="id_categories" required>
                                                <option value="">Pilih Kategori</option>
                                                @foreach ($category as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <label>Nama</label>
                                        <div class="mb-3">
                                            <input name="nama" id="nama" label="nama" type="text" class="form-control" placeholder="Nama" aria-label="text" required>
                                        </div>
                                        <label>Harga</label>
                                        <div class="mb-3">
                                            <input name="harga" id="harga" label="harga" type="number" class="form-control" placeholder="Rp." aria-label="text" required>
                                        </div>
                                        <label>Keterangan</label>
                                        <div class="mb-3">
                                            <input name="keterangan" id="keterangan" label="keterangan" type="text" class="form-control" placeholder="keterangan" aria-label="text" required>
                                        </div>
                                        <label>Stok</label>
                                        <div class="mb-3">
                                            <input name="stok" id="stok" label="stok" type="number" class="form-control" placeholder="stok" aria-label="text" required>
                                        </div>
                                        <label>Gambar</label>
                                        <div class="mb-3">
                                            <input name="gambar" id="gambar" label="gambar" type="file" class="form-control" placeholder="gambar" aria-label="text" required>
                                        </div>
                                        <label>Berat (gram)</label>
                                        <div class="mb-3">
                                            <input name="berat" id="berat" label="berat" type="number" class="form-control" placeholder="berat" aria-label="text" required>
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
