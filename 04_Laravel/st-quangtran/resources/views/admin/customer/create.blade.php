@extends('admin.layouts.admin')
@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">

                        <div class="card-body">
                            <form method="post" action="{{ URL::to('customer/store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="companyId"> Company ID </label>
                                    <input type="text" id="companyId" name="companyId" class="form-control"
                                        placeholder="Company ID" value="{{ old('companyId') }}">
                                    @error('companyId')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="transactionName">Transaction Name</label>
                                    <input type="text" id="transactionName" name="transactionName" class="form-control"
                                        placeholder="Transaction Name" value="{{ old('transactionName') }}">
                                    @error('transactionName')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" name="email" class="form-control"
                                        placeholder="Email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" id="address" name="address" class="form-control"
                                        placeholder="Address" value="{{ old('address') }}">
                                    @error('address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phoneNumber">Phone Number</label>
                                    <input type="text" id="phoneNumber" name="phoneNumber" class="form-control"
                                        placeholder="Phone Number" value="{{ old('phoneNumber') }}">
                                    @error('phoneNumber')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="fax">Fax</label>
                                    <input type="text" id="fax" name="fax" class="form-control"
                                        placeholder="Fax" value="{{ old('fax') }}">
                                    @error('fax')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script src="{{ asset('admin/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('admin/assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admin/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin/assets/js/misc.js') }}"></script>
    <script src="{{ asset('admin/assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('admin/assets/js/todolist.js') }}"></script>
@stop
