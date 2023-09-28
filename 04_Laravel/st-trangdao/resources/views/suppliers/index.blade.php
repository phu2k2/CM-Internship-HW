@extends('home')
@section('title', 'List Suppliers')
@section('PageName', 'List Suppliers')
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
                                            href="{{ route('suppliers.edit', ['supplier' => $supplier['id']]) }}">
                                            <i class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a class="dropdown-item">
                                            <a class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#modalCenter{{ $supplier['id'] }}">
                                            <i class="bx bx-trash me-1"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <div class="mt-3">
                            <!-- Modal -->
                            <div class="modal fade" id="modalCenter{{ $supplier['id'] }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel1">Delete database
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <span id="basic-icon-default-supplierid2"
                                                class="fab fa-angular fa-lg text-danger me-1">
                                                Bạn chắc chắn sẽ xóa dữ liệu này chứ
                                            </span>
                                        </div>
                                        <form action="{{ route('suppliers.destroy', ['supplier' => $supplier['id']]) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            {{-- @error('id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror --}}
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="button" class="btn btn-primary">Save
                                                    changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
