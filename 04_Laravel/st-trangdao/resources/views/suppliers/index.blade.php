@extends('home')
@section('title', 'List Suppliers')
@section('pageName', 'List Suppliers')
@section('content')
<div class="card">
    <h5 class="card-header">List Suppliers</h5>
    <div class="col-12 text-end">
        <a class="btn bg-gradient-dark mb-0" href="{{ route('suppliers.create') }}"><i
                class="btn rounded-pill btn-outline-info">&nbsp;&nbsp;Add New</i></a>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Company ID</th>
                    <th>Company Name</th>
                    <th>Transaction Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($suppliers as $key => $supplier)
                    <tr>
                        <td class="fab fa-angular fa-lg text-danger me-3">{{ $key + 1 }}</td>
                        <td><a class="badge bg-label-primary me-1"
                                href="{{ route('suppliers.show', ['supplier' => $supplier['id']]) }}">{{ $supplier['company_id'] }}</a>
                        </td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                            <strong>{{ $supplier['company_name'] }}</strong></td>
                        <td><span class="badge bg-label-primary me-1">{{ $supplier['transaction_name'] }}</span></td>
                        <td>{{ $supplier['address'] }}</td>
                        <td>{{ $supplier['email'] }}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item"
                                        href="{{ route('suppliers.edit', ['supplier' => $supplier['id']]) }}"><i
                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <form action="{{ route('suppliers.destroy', ['supplier' => $supplier['id']]) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</a>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
