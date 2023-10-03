@extends('layouts.auth')

@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Customer Information</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Customer Table</h6>
                    <div style="position: absolute; top: 10px; right: 0 ">
                        <button type="button" class="btn btn-primary"
                            onclick="window.location.href = '{{ route('customers.create') }}';">Add</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Company Name</th>
                                    <th>Transaction Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Fax</th>
                                    <th>Button</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $customer)
                                    <tr>
                                        <td>{{ $customer['customers_id'] }}</td>
                                        <td>{{ $customer['company_name'] }}</td>
                                        <td>{{ $customer['transaction_name'] }}</td>
                                        <td>{{ $customer['address'] }}</td>
                                        <td>{{ $customer['email'] }}</td>
                                        <td>{{ $customer['phone'] }}</td>
                                        <td>{{ $customer['fax'] }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary"
                                                onclick="window.location.href = '{{ route('customers.edit', ['customer' => $customer['customers_id']]) }}';">Edit</button>
                                            <button type="button" class="btn btn-primary">Delete</button>
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    </html>
@endsection