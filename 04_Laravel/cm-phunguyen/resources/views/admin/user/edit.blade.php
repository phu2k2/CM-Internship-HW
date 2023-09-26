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
    <link href="{{asset('css/custom-admin.css')}}" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">


</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Edit Function</h1>

            <div class="p-5">
                <form class="user">
                    <div class="form-group">
                        <h6>User Name</h6>
                        <input type="name" class="form-control form-control-user" value= "{{$user['name']}}"
                            placeholder="Name" readonly>
                    </div>
                    <div class="form-group">
                        <h6>Email Address</h6>
                        <input type="email" class="form-control form-control-user" value= "{{$user['email']}}"
                            placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <h6>Password</h6>
                        <input type="password" class="form-control form-control-user"
                            value= "{{$user['password']}}" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <h6>Remember Token</h6>
                        <input type="text" class="form-control form-control-user"
                            value= "{{$user['remember_token']}}" placeholder="Remember Token">
                    </div>
                    <div class ="button-container">
                            <button type="button" class="btn btn-primary" onclick= "window.location.href = '{{route('user.index')}}';">
                                Update
                            </button>
                            <button type="button" class="btn btn-secondary" onclick= "window.location.href = '{{route('user.index')}}';">
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
