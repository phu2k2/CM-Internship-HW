@extends('layouts.auth')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <h1 class="h3 mb-2 text-gray-800">Edit Function</h1>
                <div class="p-5">
                    <form class="user">
                        <div class="form-group">
                            <h6>Company Id</h6>
                            <input type="text" class="form-control form-control-user" placeholder="Company Id"
                                value="{{ $supplier['company_id'] }}" readonly>
                        </div>
                        <div class="form-group">
                            <h6>Company Name</h6>
                            <input type="text" class="form-control form-control-user" placeholder="Company Name"
                                value="{{ $supplier['company_name'] }}}">
                        </div>
                        <div class="form-group">
                            <h6>Transaction Name</h6>
                            <input type="text" class="form-control form-control-user" placeholder="Transaction Name"
                                value="{{ $supplier['transaction_name'] }}">
                        </div>
                        <div class="form-group">
                            <h6>Address</h6>
                            <input type="text" class="form-control form-control-user" placeholder="Address"
                                value="{{ $supplier['address'] }}">
                        </div>
                        <div class="form-group">
                            <h6>Phone</h6>
                            <input type="text" class="form-control form-control-user" placeholder="Phone"
                                value="{{ $supplier['phone'] }}">
                        </div>
                        <div class="form-group">
                            <h6>Fax</h6>
                            <input type="text" class="form-control form-control-user" placeholder="Fax"
                                value="{{ $supplier['fax'] }}">
                        </div>
                        <div class="form-group">
                            <h6>Email</h6>
                            <input type="text" class="form-control form-control-user" placeholder="Email"
                                value="{{ $supplier['email'] }}">
                        </div>
                        <div class="button-container">
                            <button type="button" class="btn btn-primary"
                                onclick="window.location.href = '{{ route('suppliers.index') }}';">
                                Update
                            </button>
                            <button type="button" class="btn btn-secondary"
                                onclick="window.location.href = '{{ route('suppliers.index') }}';">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
@endsection
