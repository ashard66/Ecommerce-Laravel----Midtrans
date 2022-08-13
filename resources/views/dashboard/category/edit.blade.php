@extends('layouts.dashboard.master')
@section('title')
    Dashboard Kategori
@endsection
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('layouts.dashboard.navbar')
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4 col-md-6 mx-auto">
                        <div class="card-header pb-0">
                            <h6>Edit Kategori</h6>
                        </div>

                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <div class="card-body mx-auto">
                                    <form action="{{ url('/dashboard/category/edit/'.$category->id) }}" method="POSt" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <label>Nama</label>
                                        <div class="mb-3">
                                            <input name="nama" id="nama" label="nama" type="text" class="form-control"
                                            placeholder="Nama" aria-label="text" value="{{ $category->nama }}">
                                        </div>
                                        <div class="text-center">
                                            <button type="update" class="btn bg-gradient-info w-100 mt-4 mb-0">Update</button>
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
