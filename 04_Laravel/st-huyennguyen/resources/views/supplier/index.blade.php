@extends('layout.app')
@section('title', 'List Suppliers')
@section('PageName', 'List Suppliers')
@section('Modal', 'Supplier')
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
            <span class="alert-text"><strong>Success!</strong> {{ Session::get('message') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-icon"><i class="ni ni-notification-70"></i></span>
            <span class="alert-text"><strong>Error!</strong> {{ Session::get('error') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>List Suppliers</h6>
                    <div class="col-12 text-end">
                        <a class="btn bg-gradient-dark mb-0" href="{{ route('suppliers.create') }}"><i
                                class="fas fa-plus"></i>&nbsp;&nbsp;Add New</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        No.</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Company ID</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Company Name</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Transection Name</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Address</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Email</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Edit</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Delete
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($suppliers as $key => $supplier)
                                    <tr>
                                        <td class="text-center">{{ $key + 1 }}</td>
                                        <td class="text-center">
                                            <h6 class="mb-0 text-sm">{{ $supplier['company_id'] }}</h6>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="{{ asset('assets/img/team-2.jpg') }}"
                                                        class="avatar avatar-sm me-3" alt="user1">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <a
                                                        href="{{ route('suppliers.show', ['supplier' => $supplier['id']]) }}">
                                                        <h6 class="mb-0 text-sm">{{ $supplier['company_name'] }}</h6>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <span
                                                class="badge badge-sm bg-gradient-success">{{ $supplier['transaction_name'] }}</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-xs font-weight-bold mb-0">{{ $supplier['address'] }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-xs font-weight-bold mb-0">{{ $supplier['email'] }}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="{{ route('suppliers.edit', ['supplier' => $supplier['id']]) }}"
                                                type="button" class="btn bg-gradient-info">
                                                <i class="fas fa-pencil-alt ms-auto cursor-pointer"></i>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <form id="destroy{{ $supplier['id'] }}"
                                                action="{{ route('suppliers.destroy', ['supplier' => $supplier['id']]) }}"
                                                method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $supplier['id'] }}">
                                                <button type="button" class="btn bg-gradient-danger btn-block mb-3"
                                                    onclick="destroyCategory({{ $supplier['id'] }})">
                                                    <i class="far fa-trash-alt ms-auto"></i>
                                                </button>
                                            </form>
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
@endsection
