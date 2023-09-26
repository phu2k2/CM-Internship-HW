@extends('layouts.auth')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css" rel="stylesheet')}}" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">


</head>

<body id="page-top">

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
                                <button type="button" class="btn btn-primary" onclick= "window.location.href = '{{route('customers.create')}}';">Add</button>
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
                                                    <button type="button" class="btn btn-primary" onclick= "window.location.href = '{{route('customers.edit', ['customer'=> $customer['customers_id']])}}';">Edit</button>
                                                    <button type="button" class="btn btn-primary" >Delete</button>
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

</body>

</html>
@endsection
