@extends('admin.layouts.admin')
@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">

                        <div class="card-body">
                            <form method="POST" action="{{ URL::to('customer/update', ['id' => $customer['id']]) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="companyId"> Company ID </label>
                                    <input type="text" class="form-control" id="companyId" name="companyId"
                                        placeholder="Company Name" value="{{ old('companyId', $customer['companyId']) }}">
                                    @error('companyId')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="transactionName">Transaction Name</label>
                                    <input type="text" class="form-control" id="transactionName" name="transactionName"
                                        placeholder="Transaction Name"
                                        value="{{ old('transactionName', $customer['transactionName']) }}">
                                    @error('transactionName')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        placeholder="Email" value="{{ old('email', $customer['email']) }}">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Address" value="{{ old('address', $customer['address']) }}">
                                    @error('address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phoneNumber">Phone</label>
                                    <input type="text" class="form-control" id="phoneNumber" name="phoneNumber"
                                        placeholder="Phone" value="{{ old('phoneNumber', $customer['phoneNumber']) }}">
                                    @error('phoneNumber')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="fax">Fax</label>
                                    <input type="text" class="form-control" id="fax" name="fax"
                                        placeholder="Fax" value="{{ old('fax', $customer['fax']) }}">
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
        @stop

        @section('scripts')
            <script src="{{ asset('admin/assets/vendors/js/vendor.bundle.base.js') }} "></script>
            <script src="{{ asset('admin/assets/vendors/chart.js/Chart.min.js') }}"></script>
            <script src="{{ asset('admin/assets/js/jquery.cookie.js') }}"></script>
            <script src="{{ asset('admin/assets/js/off-canvas.js') }}"></script>
            <script src="{{ asset('admin/assets/js/hoverable-collapse.js') }}"></script>

            <script src="{{ asset('admin/assets/js/misc.js') }}"></script>

            <script src="{{ asset('admin/assets/js/dashboard.js') }}"></script>
            <script src="{{ asset('admin/assets/js/todolist.js') }}"></script>

        @stop
