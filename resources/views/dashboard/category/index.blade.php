@extends('layouts.dashboard.master')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('layouts.dashboard.navbar')
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Kategori</h6>
                            <div class="text-end">
                                <a href="{{ route('add.category') }}" class="btn bg-gradient-dark mb-2"
                                    href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Kategori</a>
                            </div>
                        </div>

                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                No</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nama</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no =1;
                                        @endphp
                                        @foreach ($category as $item)
                                            <tr>
                                                <td
                                                    class="align-middle text-center text-secondary font-weight-bold text-xs">
                                                    {{ $no++ }}
                                                </td>
                                                <td
                                                    class="align-middle text-center text-secondary font-weight-bold text-xs">
                                                    {{ $item->nama }}
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a href="{{ url('/dashboard/category/edit/'.$item->id) }}" class="btn btn-link text-dark px-3 mb-0"
                                                        data-toggle="tooltip" data-original-title="Edit user"><i
                                                            class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>
                                                        Edit
                                                    </a>
                                                    <a href="{{ url('/dashboard/category/delete/'.$item->id) }}"
                                                        class="btn btn-link text-danger text-gradient px-3 mb-0"
                                                        data-toggle="tooltip" data-original-title="Delete user"><i
                                                            class="far fa-trash-alt me-2"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.dashboard.footer')
        </div>
    </main>
@endsection
