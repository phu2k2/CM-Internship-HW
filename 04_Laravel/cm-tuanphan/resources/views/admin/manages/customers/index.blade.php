@extends('admin.layouts.layout1')

@section('modal')
<div class="modal fade" id="addCustomerModal" tabindex="-1" aria-labelledby="addCustomerModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addCustomerModal">Thêm khách hàng</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if ($errors->any())
            @section('modalTrigger')document.querySelector('[data-bs-target="#addCustomerModal"]').click();@endsection
            @endif
            <form method="post" action="{{ route('customers.store') }}" id="addCustomerForm">
                @csrf
                <label>Tên công ty</label>
                <input class="form-control" placeholder="Tên công ty" name="company_name"/>
                <label>Tên giao dịch</label>
                <input class="form-control" placeholder="Tên giao dịch" name="transaction_name"/>
                <label>Địa chỉ</label>
                <input class="form-control" placeholder="Địa chỉ" name="address"/>
                <label>Số điện thoại</label>
                <input class="form-control" placeholder="Số điện thoại" name="phone_number"/>
                <label>Số fax</label>
                <input class="form-control" placeholder="Số fax" name="fax"/>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" form="addCustomerForm">Thêm khách hàng</button>
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
                    <h6>Danh sách khách hàng</h6>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCustomerModal">Thêm khách hàng</button>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
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


                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach ($customers as $index => $customer)
                                <tr>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0 text-center">{{$index + 1}}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$customer->company_name}}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$customer->transaction_name}}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$customer->address}}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$customer->phone_number}}</p>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">{{$customer->fax}}</span>
                                    </td>
                                    <td class="align-middle">
                                        <button class="btn btn-success">Edit</button>
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