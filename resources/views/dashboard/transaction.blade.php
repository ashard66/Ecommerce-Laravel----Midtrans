@extends('layouts.dashboard.master')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        @include('layouts.dashboard.navbar')
        <div class="container-fluid py-4">
            <div class="row my-4">
                <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-lg-6 col-7">
                                    <h6>New Order</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Invoice ID</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Product</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Status</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Created At</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order as $item)
                                            <tr>
                                                <td
                                                    class="align-middle text-center text-secondary font-weight-bold text-xs">
                                                    {{ $item->invoice }}
                                                </td>
                                                <td
                                                    class="align-middle text-center text-secondary font-weight-bold text-xs">
                                                    {{ $item->one_product }}
                                                </td>
                                                <td
                                                    class="align-middle text-center text-secondary font-weight-bold text-xs">
                                                    {!! $item->status_name_text !!}
                                                </td>
                                                <td
                                                    class="align-middle text-center text-secondary font-weight-bold text-xs">
                                                    {{ $item->created_at }}
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a href="{{ route('detail.transaction',$item->id) }}" class="btn btn-link text-dark px-3 mb-0"
                                                        data-toggle="tooltip" data-original-title="Edit user"><i
                                                            class="fas fa-eye text-dark me-2" aria-hidden="true"></i>
                                                        Detail
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
        </div>
    </main>
@endsection