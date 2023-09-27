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
            <h1 class="h3 mb-2 text-gray-800">Add Function</h1>

            <div class="p-5">
                <form class="user" method = "POST" action = "{{route('employees.store')}}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="id" class="form-control form-control-user" placeholder="Id" value = "{{old('id')}}">
                        @error('id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="first_name" class="form-control form-control-user" placeholder="First Name" value [= "{{old('first_name')}}"]>
                        @error('first_name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="last_name"  class="form-control form-control-user" placeholder="Last Name" value [= "{{old('last_name')}}">
                        @error('last_name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="birthday" class="form-control form-control-user" placeholder="Birthday" value [= "{{old('birthday')}}">
                        @error('birthday')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="start_date" class="form-control form-control-user" placeholder="Start Date" value [= "{{old('start_date')}}">
                        @error('start_date')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="address" class="form-control form-control-user" placeholder="Address" value [= "{{old('address')}}">
                        @error('address')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name ="phone" class="form-control form-control-user" placeholder="Phone" value [= "{{old('phone')}}">
                        @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="base_salary" class="form-control form-control-user" placeholder="Base Salary" value [= "{{old('base_salary')}}">
                        @error('base_salary')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name = "allowance" class="form-control form-control-user" placeholder="Allowance" value [= "{{old('allowance')}}">
                        @error('allowance')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class ="button-container">
                            <button type="submit" class="btn btn-primary" >
                                Add
                            </button>
                            <button type="button" class="btn btn-secondry" onclick= "window.location.href = '{{route('employees.index')}}';">
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
