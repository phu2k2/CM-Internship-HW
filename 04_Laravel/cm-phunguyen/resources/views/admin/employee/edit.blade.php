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
                            <h6>Employee Id</h6>
                            <input type="text" class="form-control form-control-user" placeholder="Id"
                                value="{{ $employee['employee_id'] }}" readonly>
                        </div>
                        <div class="form-group">
                            <h6>First Name</h6>
                            <input type="text" class="form-control form-control-user" placeholder="First Name"
                                value="{{ $employee['first_name'] }}}">
                        </div>
                        <div class="form-group">
                            <h6>Last Name</h6>
                            <input type="text" class="form-control form-control-user" placeholder="Last Name"
                                value="{{ $employee['last_name'] }}">
                        </div>
                        <div class="form-group">
                            <h6>Birthday</h6>
                            <input type="text" class="form-control form-control-user" placeholder="Birthday"
                                value="{{ $employee['birthday'] }}">
                        </div>
                        <div class="form-group">
                            <h6>Start Date</h6>
                            <input type="text" class="form-control form-control-user" placeholder="Start Date"
                                value="{{ $employee['start_date'] }}">
                        </div>
                        <div class="form-group">
                            <h6>Address</h6>
                            <input type="text" class="form-control form-control-user" placeholder="Address"
                                value="{{ $employee['address'] }}">
                        </div>
                        <div class="form-group">
                            <h6>Phone</h6>
                            <input type="text" class="form-control form-control-user" placeholder="Phone"
                                value="{{ $employee['phone'] }}">
                        </div>
                        <div class="form-group">
                            <h6>Base Salary</h6>
                            <input type="text" class="form-control form-control-user" placeholder="Base Salary"
                                value="{{ $employee['base_salary'] }}">
                        </div>
                        <div class="form-group">
                            <h6>Allowance</h6>
                            <input type="text" class="form-control form-control-user" placeholder="Allowance"
                                value="{{ $employee['allowance'] }}">
                        </div>
                        <div class="button-container">
                            <button type="button" class="btn btn-primary"
                                onclick="window.location.href = '{{ route('employees.index') }}';">
                                Update
                            </button>
                            <button type="button" class="btn btn-secondary"
                                onclick="window.location.href = '{{ route('employees.index') }}';">
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
