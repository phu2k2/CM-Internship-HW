@extends('default')

@section('content')

    <h4 class="py-3 mb-4"><span class="text-muted fw-light"><a
                href="{{ route('supplier.index') }}">Suppliers</a> / </span>Create</h4>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">New supplier</h5>
            <a href="{{ route('supplier.index') }}"><i class='bx bx-arrow-back'></i></a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('supplier.store')}}">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="company_id">Company ID</label>
                    <input name="company_id" type="text" class="form-control" id="company_id"
                           placeholder="STE"/>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="company_name">Company Name</label>
                    <input name="company_name" type="text" class="form-control" id="company_name"
                           placeholder="Công ty SupremeTech"/>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="transaction_name">Transaction Name</label>
                    <input name="transaction_name" type="text" class="form-control" id="transaction_name"
                           placeholder="STECH"/>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="address">Address</label>
                    <textarea
                        name="address"
                        style="resize: none"
                        id="address"
                        class="form-control"
                        placeholder="363 Nguyễn Hữu Thọ, Khuê Trung, Cẩm Lệ, Đà Nẵng"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <div class="input-group input-group-merge">
                        <input
                            name="email"
                            type="text"
                            id="email"
                            class="form-control"
                            placeholder="hr@supremetech.vn"/>
                    </div>
                    <div class="form-text">You can use letters, numbers & periods</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="phone">Phone No</label>
                    <input
                        name="phone"
                        type="text"
                        id="phone"
                        class="form-control phone-mask"
                        placeholder="0236 3626 989"/>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="fax">Fax</label>
                    <input
                        name="fax"
                        type="text"
                        class="form-control phone-mask"
                        id="fax"
                        placeholder="0236 3626 989"/>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@stop
