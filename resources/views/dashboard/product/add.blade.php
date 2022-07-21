@extends('layouts.dashboard.master')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('layouts.dashboard.navbar')
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4 col-md-6 mx-auto">
                        <div class="card-header pb-0">
                            <h6>Add Product</h6>
                        </div>

                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <div class="card-body mx-auto">
                                    <form action="{{ route('store.product') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <label>Category</label>
                                        <div class="input-group">
                                            <select class="form-select" name="id_categories" label="id_categories" id="id_categories">
                                                <option value="">Select Category</option>
                                                @foreach ($category as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <label>Nama</label>
                                        <div class="mb-3">
                                            <input name="nama" id="nama" label="nama" type="text" class="form-control" placeholder="Nama" aria-label="text">
                                        </div>
                                        <label>Harga</label>
                                        <div class="mb-3">
                                            <input name="harga" id="harga" label="harga" type="number" class="form-control" placeholder="Rp." aria-label="text">
                                        </div>
                                        <label>Keterangan</label>
                                        <div class="mb-3">
                                            <input name="keterangan" id="keterangan" label="keterangan" type="text" class="form-control" placeholder="keterangan" aria-label="text">
                                        </div>
                                        <label>Stok</label>
                                        <div class="mb-3">
                                            <input name="stok" id="stok" label="stok" type="number" class="form-control" placeholder="stok" aria-label="text">
                                        </div>
                                        <label>Gambar</label>
                                        <div class="mb-3">
                                            <input name="gambar" id="gambar" label="gambar" type="file" class="form-control" placeholder="gambar" aria-label="text">
                                        </div>
                                        <label>Berat (gram)</label>
                                        <div class="mb-3">
                                            <input name="berat" id="berat" label="berat" type="number" class="form-control" placeholder="berat" aria-label="text">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="footer pt-3  ">
                    <div class="container-fluid">
                        <div class="row align-items-center justify-content-lg-between">
                            <div class="col-lg-6 mb-lg-0 mb-4">
                                <div class="copyright text-center text-sm text-muted text-lg-start">
                                    ©
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script>,
                                    made with <i class="fa fa-heart"></i> by
                                    <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative
                                        Tim</a>
                                    for a better web.
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                    <li class="nav-item">
                                        <a href="https://www.creative-tim.com" class="nav-link text-muted"
                                            target="_blank">Creative Tim</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                            target="_blank">About Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                                            target="_blank">Blog</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                                            target="_blank">License</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
    </main>
@endsection
