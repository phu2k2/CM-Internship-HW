@extends('layouts.auth')

@section('content')

<!DOCTYPE html>
<html lang="en">

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Add Function</h1>

            <div class="p-5">
                <form class="user">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" placeholder="Id">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" placeholder="Company Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" placeholder="Transaction Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" placeholder="Transaction Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" placeholder="Fax">
                    </div>
                    <div class ="button-container">
                            <button type="button" class="btn btn-primary" onclick= "window.location.href = '{{route('customers.index')}}';">
                                Add
                            </button>
                            <button type="button" class="btn btn-secondary" onclick= "window.location.href = '{{route('customers.index')}}';">
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
