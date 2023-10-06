@extends('layouts.auth')

@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Edit Function</h1>
            <div class="p-5">
                <form class="user" method="POST" action="{{ route('customers.update', ['customer' => $customer['id']]) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <h6>Customer Id</h6>
                        <input type="text" class="form-control form-control-user" placeholder="Id"
                            value="{{ $customer['customers_id'] }}">
                    </div>
                    <div class="form-group">
                        <h6>Company Name at</h6>
                        <input type="text" class="form-control form-control-user" placeholder="Company Name"
                            value="{{ $customer['company_name'] }}">
                    </div>
                    <div class="form-group">
                        <h6>Transaction Name</h6>
                        <input type="text" class="form-control form-control-user" placeholder="Transaction Name"
                            value="{{ $customer['transaction_name'] }}">
                    </div>
                    <div class="form-group">
                        <h6>Address</h6>
                        <input type="text" class="form-control form-control-user" placeholder="Address"
                            value="{{ $customer['address'] }}">
                    </div>
                    <div class="form-group">
                        <h6>Email</h6>
                        <input type="text" class="form-control form-control-user" placeholder="Email"
                            value="{{ $customer['email'] }}">
                    </div>
                    <div class="form-group">
                        <h6>Phone</h6>
                        <input type="text" class="form-control form-control-user" placeholder="Phone"
                            value="{{ $customer['phone'] }}">
                    </div>
                    <div class="form-group">
                        <h6>Fax</h6>
                        <input type="text" class="form-control form-control-user" placeholder="Fax"
                            value="{{ $customer['fax'] }}">
                    </div>
                    <div class="button-container">
                        <button type="button" class="btn btn-primary"
                            onclick="window.location.href = '{{ route('customers.index') }}';">
                            Update
                        </button>
                        <button type="button" class="btn btn-secondary"
                            onclick="window.location.href = '{{ route('customers.index') }}';">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    </html>
@endsection
