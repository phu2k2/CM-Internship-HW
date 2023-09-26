@extends('admin.layouts.layout1')

@section('modal')
<div class="modal fade" id="addSupplierModal" tabindex="-1" aria-labelledby="addSupplierModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addSupplierModal">Thêm nhà cung cấp</h1>
        </div>
        <div class="modal-body">
            @if ($errors->any())
            @section('modalTrigger')document.querySelector('[data-bs-target="#addSupplierModal"]').click();@endsection
            @endif
            <form method="POST" action="{{ route('suppliers.store') }}" id="addSupplierForm">
                @csrf
                <label>Tên công ty</label>
                <input class="form-control @error('company_name') is-invalid @enderror" placeholder="Tên công ty" name="company_name"/>
                @error('company_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <label>Tên giao dịch</label>
                <input class="form-control @error('transaction_name') is-invalid @enderror" placeholder="Tên giao dịch" name="transaction_name"/>
                @error('transaction_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <label>Địa chỉ</label>
                <input class="form-control @error('address') is-invalid @enderror" placeholder="Địa chỉ" name="address"/>
                @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <label>Số điện thoại</label>
                <input class="form-control @error('phone') is-invalid @enderror" placeholder="Số điện thoại" name="phone"/>
                @error('phone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <label>Số fax</label>
                <input class="form-control @error('fax') is-invalid @enderror" placeholder="Số fax" name="fax">
                @error('fax')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <label>Địa chỉ email</label>
                <input class="form-control @error('email') is-invalid @enderror" placeholder="Địa chỉ email" name="email" />
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="type" class="btn btn-primary" form="addSupplierForm">Thêm nhà cung cấp</button>
        </div>
      </div>
    </div>
</div>
@endsection


@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Nhà cung cấp</h6>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSupplierModal">Thêm nhà cung cấp</button>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        STT
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tên công ty
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tên giao dịch
                                    </th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Địa chỉ</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Số điện thoại</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Số fax</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Hành động</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($suppliers as $index => $supplier)
                                <tr>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0 text-center">{{$index + 1}}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$supplier->company_name}}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$supplier->transaction_name}}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$supplier->address}}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$supplier->phone}}</p>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">{{$supplier->fax}}</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('suppliers.edit', ['supplier'=>$supplier->id]) }}" class="btn btn-success">Edit</a>
                                        <button class="btn btn-danger">Xóa</button>
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
@endsection