@extends('layouts.dashboard.master')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('layouts.dashboard.navbar')
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Category</h6>
                            <div class="text-end">
                                <a href="{{ route('add.category') }}" class="btn bg-gradient-dark mb-2"
                                    href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add Category</a>
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
